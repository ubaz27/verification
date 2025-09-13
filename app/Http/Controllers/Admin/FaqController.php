<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of FAQs for admin
     */
    public function index()
    {
        $faqs = Faq::orderBy('sort_order', 'asc')->orderBy('id', 'desc')->get();
        
        // FAQ statistics
        $total_faqs = Faq::count();
        $active_faqs = Faq::active()->count();
        $inactive_faqs = Faq::where('is_active', false)->count();
        $categories = Faq::getCategories();
        $total_categories = count($categories);
        
        return view('admin.faq.index', compact('faqs', 'total_faqs', 'active_faqs', 'inactive_faqs', 'total_categories', 'categories'));
    }

    /**
     * Show the form for creating a new FAQ.
     */
    public function create()
    {
        return view('admin.faq.create');
    }

    /**
     * Store a newly created FAQ in storage.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'question' => 'required|string',
            'answer' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $faq = Faq::create([
            'category' => $request->category,
            'question' => $request->question,
            'answer' => $request->answer,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active') ? 1 : 0
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'FAQ created successfully!',
                'faq' => $faq
            ]);
        }

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully!');
    }

    /**
     * Display the specified FAQ.
     *
     * @param Faq $faq
     */
    public function show($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.faq.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified FAQ.
     */
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.faq.edit', compact('faq'));
    }

    /**
     * Update the specified FAQ in storage.
     *
     * @param Request $request
     * @param Faq $faq
     */
    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);

        $request->validate([
            'category' => 'required|string|max:255',
            'question' => 'required|string',
            'answer' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $faq->update([
            'category' => $request->category,
            'question' => $request->question,
            'answer' => $request->answer,
            'sort_order' => $request->sort_order ?? $faq->sort_order,
            'is_active' => $request->has('is_active') ? 1 : 0
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'FAQ updated successfully!',
                'faq' => $faq
            ]);
        }

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully!');
    }

    /**
     * Remove the specified FAQ from storage.
     *
     * @param Faq $faq
     */
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully!');
    }

    /**
     * Toggle the active status of an FAQ.
     *
     * @param Faq $faq
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggleStatus(Faq $faq)
    {
        $faq->update([
            'is_active' => !$faq->is_active
        ]);

        return response()->json([
            'success' => true,
            'message' => 'FAQ status updated successfully!',
            'faq' => $faq
        ]);
    }
}
