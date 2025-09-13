<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Executive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\URL;

class ExecutiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $executives = Executive::orderBy('created_at', 'asc')->paginate(10);

        // Executive statistics
        $total_executives = Executive::count();
        $active_executives = Executive::active()->count();
        $inactive_executives = Executive::where('status', false)->count();

        // Get unique designations
        $designations = Executive::select('designation')
            ->distinct()
            ->whereNotNull('designation')
            ->where('designation', '!=', '')
            ->pluck('designation')
            ->toArray();
        $total_designations = count($designations);

        return view('admin.executives.index', compact('executives', 'total_executives', 'active_executives', 'inactive_executives', 'total_designations', 'designations'));
    }

    /**
     * Get executives data for DataTables
     */
    public function getExecutives(Request $request)
    {
        if ($request->ajax()) {
            $data = Executive::select(['id', 'name', 'designation', 'avatar', 'profession', 'status', 'created_at']);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('avatar', function ($row) {
                    return '<img src="' . asset($row->avatar) . '" alt="' . $row->name . '" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">';
                })
                ->addColumn('status', function ($row) {
                    $badgeClass = $row->status ? 'badge-success' : 'badge-danger';
                    $text = $row->status ? 'Active' : 'Inactive';
                    return '<span class="badge ' . $badgeClass . '">' . $text . '</span>';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group" role="group">';
                    $btn .= '<a href="' . route('admin.executives.show', $row->id) . '" class="btn btn-info btn-sm" title="View"><i class="fas fa-eye"></i></a>';
                    $btn .= '<a href="' . route('admin.executives.edit', $row->id) . '" class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-edit"></i></a>';
                    $btn .= '<button type="button" class="btn btn-danger btn-sm delete-executive" data-id="' . $row->id . '" title="Delete"><i class="fas fa-trash"></i></button>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('M d, Y');
                })
                ->rawColumns(['avatar', 'status', 'action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.executives.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'bio' => 'required|string',
            'education' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'achievements' => 'nullable|array',
            'achievements.*' => 'string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'nullable|boolean'
        ]);

        $data = $request->except(['avatar', 'achievements']);

        // Handle status - convert to boolean
        $data['status'] = $request->has('status') && $request->status == '1';

        // Handle achievements
        if ($request->has('achievements')) {
            $data['achievements'] = array_filter($request->achievements);
        }

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $fileName);
            $data['avatar'] = 'img/' . $fileName;
        }

        Executive::create($data);

        return redirect()->route('admin.executives.index')
            ->with('success', 'Executive created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $executive = Executive::findOrFail($id);
        return view('admin.executives.show', compact('executive'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $executive = Executive::findOrFail($id);
        return view('admin.executives.edit', compact('executive'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $executive = Executive::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'bio' => 'required|string',
            'education' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'achievements' => 'nullable|array',
            'achievements.*' => 'string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'nullable|boolean'
        ]);

        $data = $request->except(['avatar', 'achievements']);

        // Handle status - convert to boolean
        $data['status'] = $request->has('status') && $request->status == '1';

        // Handle achievements
        if ($request->has('achievements')) {
            $data['achievements'] = array_filter($request->achievements);
        }

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if it exists and is not the default
            if ($executive->avatar && $executive->avatar !== 'img/default-avatar.jpg') {
                $oldAvatarPath = public_path($executive->avatar);
                if (file_exists($oldAvatarPath)) {
                    unlink($oldAvatarPath);
                }
            }

            $file = $request->file('avatar');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $fileName);
            $data['avatar'] = 'img/' . $fileName;
        }

        $executive->update($data);

        return redirect()->route('admin.executives.show', $executive->id)
            ->with('success', 'Executive updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $executive = Executive::findOrFail($id);

            // Delete avatar file if it exists and is not the default
            if ($executive->avatar && $executive->avatar !== 'img/default-avatar.jpg') {
                $avatarPath = public_path($executive->avatar);
                if (file_exists($avatarPath)) {
                    unlink($avatarPath);
                }
            }

            $executive->delete();

            // Check if request is AJAX
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Executive deleted successfully.'
                ]);
            }

            return redirect()->route('admin.executives.index')
                ->with('success', 'Executive deleted successfully.');
        } catch (\Exception $e) {
            // Check if request is AJAX
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting executive: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->route('admin.executives.index')
                ->with('error', 'Error deleting executive: ' . $e->getMessage());
        }
    }

    /**
     * Toggle executive status
     */
    public function toggleStatus($id)
    {
        $executive = Executive::findOrFail($id);
        $executive->update(['status' => !$executive->status]);

        return response()->json([
            'success' => true,
            'message' => 'Executive status updated successfully.',
            'status' => $executive->status
        ]);
    }
}
