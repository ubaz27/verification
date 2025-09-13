<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ScholarshipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of scholarships for admin
     */
    public function index()
    {
        $scholarships = Scholarship::with('postedBy')->orderBy('id', 'desc')->get();

        // Scholarship statistics
        $total_scholarships = Scholarship::count();
        $active_scholarships = Scholarship::active()->count();
        $expired_scholarships = Scholarship::expired()->count();

        return view('admin.scholarship.index', compact('scholarships', 'total_scholarships', 'active_scholarships', 'expired_scholarships'));
    }

    /**
     * Show the form for creating a new scholarship.
     */
    public function create()
    {
        return view('admin.scholarship.create');
    }

    /**
     * Store a newly created scholarship in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'scholarship_type' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'organisation' => 'required|string|max:255',
            'deadline' => 'required|date|after:today',
            'amount' => 'required|numeric|min:0',
            'eligibility' => 'required|string',
            'description' => 'nullable|string',
            'duration' => 'nullable|string|max:255',
            'application_link' => 'nullable|url'
        ]);

        $scholarship = Scholarship::create([
            'scholarship_type' => $request->scholarship_type,
            'title' => $request->title,
            'organisation' => $request->organisation,
            'date_posted' => now(),
            'deadline' => $request->deadline,
            'amount' => $request->amount,
            'eligibility' => $request->eligibility,
            'description' => $request->description,
            'duration' => $request->duration,
            'application_link' => $request->application_link,
            'posted_by' => Auth::guard('admin')->id() ?? 1,
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Scholarship created successfully!',
                'scholarship' => $scholarship
            ]);
        }

        return redirect()->route('admin.scholarships.index')->with('success', 'Scholarship created successfully!');
    }

    /**
     * Display the specified scholarship.
     */
    public function show($id)
    {
        $scholarship = Scholarship::with('postedBy')->findOrFail($id);
        return view('admin.scholarship.show', compact('scholarship'));
    }

    /**
     * Show the form for editing the specified scholarship.
     */
    public function edit($id)
    {
        $scholarship = Scholarship::findOrFail($id);
        return view('admin.scholarship.edit', compact('scholarship'));
    }

    /**
     * Update the specified scholarship in storage.
     */
    public function update(Request $request, $id)
    {
        $scholarship = Scholarship::findOrFail($id);

        $request->validate([
            'scholarship_type' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'organisation' => 'required|string|max:255',
            'deadline' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'eligibility' => 'required|string',
            'description' => 'nullable|string',
            'duration' => 'nullable|string|max:255',
            'application_link' => 'nullable|url'
        ]);

        $scholarship->update([
            'scholarship_type' => $request->scholarship_type,
            'title' => $request->title,
            'organisation' => $request->organisation,
            'deadline' => $request->deadline,
            'amount' => $request->amount,
            'eligibility' => $request->eligibility,
            'description' => $request->description,
            'duration' => $request->duration,
            'application_link' => $request->application_link,
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Scholarship updated successfully!',
                'scholarship' => $scholarship
            ]);
        }

        return redirect()->route('admin.scholarships.index')->with('success', 'Scholarship updated successfully!');
    }

    /**
     * Remove the specified scholarship from storage.
     */
    public function destroy($id)
    {
        $scholarship = Scholarship::findOrFail($id);
        $scholarship->delete();

        return redirect()->route('admin.scholarships.index')->with('success', 'Scholarship deleted successfully!');
    }

    /**
     * Get scholarships data for DataTables
     */
    public function getData()
    {
        $scholarships = Scholarship::with('postedBy')->select('scholarships.*');

        return DataTables::of($scholarships)
            ->addIndexColumn()
            ->addColumn('status', function ($scholarship) {
                $status = $scholarship->deadline < now() ? 'expired' : 'active';
                $badgeClass = $status === 'active' ? 'success' : 'danger';
                return '<span class="badge bg-' . $badgeClass . '">' . ucfirst($status) . '</span>';
            })
            ->addColumn('formatted_amount', function ($scholarship) {
                return '₦' . number_format((float)$scholarship->amount, 2);
            })
            ->addColumn('days_remaining', function ($scholarship) {
                if ($scholarship->deadline < now()) {
                    return '<span class="text-danger">Expired</span>';
                }
                $days = now()->diffInDays($scholarship->deadline);
                return $days . ' days';
            })
            ->addColumn('action', function ($scholarship) {
                $actions = '<div class="btn-group" role="group">';
                $actions .= '<a href="' . route('admin.scholarships.show', $scholarship->id) . '" class="btn btn-info btn-sm me-1" title="View"><i class="fas fa-eye"></i></a>';
                $actions .= '<a href="' . route('admin.scholarships.edit', $scholarship->id) . '" class="btn btn-warning btn-sm me-1" title="Edit"><i class="fas fa-edit"></i></a>';
                $actions .= '<form action="' . route('admin.scholarships.destroy', $scholarship->id) . '" method="POST" style="display: inline;" onsubmit="return confirm(\'Are you sure you want to delete this scholarship?\')">';
                $actions .= csrf_field();
                $actions .= method_field('DELETE');
                $actions .= '<button type="submit" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></button>';
                $actions .= '</form>';
                $actions .= '</div>';
                return $actions;
            })
            ->rawColumns(['status', 'days_remaining', 'action'])
            ->make(true);
    }
}
