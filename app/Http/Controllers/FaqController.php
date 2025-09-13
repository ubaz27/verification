<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Http\JsonResponse;

class FaqController extends Controller
{
    /**
     * Display a listing of FAQs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::active()->ordered()->get();
        $categories = Faq::getCategories();

        return view('public.faqs', [
            'faqs' => $faqs,
            'categories' => $categories
        ]);
    }

    /**
     * Display FAQs filtered by category.
     *
     * @param string $category
     * @return \Illuminate\Http\Response
     */
    public function getByCategory($category)
    {
        $faqs = Faq::active()->byCategory($category)->ordered()->get();
        $categories = Faq::getCategories();

        return response()->view('public.faqs', [
            'faqs' => $faqs,
            'categories' => $categories,
            'selectedCategory' => $category
        ]);
    }

    /**
     * Search FAQs based on query.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        
        if (empty($query)) {
            return response()->json([
                'faqs' => [],
                'message' => 'Please enter a search term'
            ]);
        }

        $faqs = Faq::active()
            ->where(function($q) use ($query) {
                $q->where('question', 'like', "%{$query}%")
                  ->orWhere('answer', 'like', "%{$query}%")
                  ->orWhere('category', 'like', "%{$query}%");
            })
            ->ordered()
            ->get();

        return response()->json([
            'faqs' => $faqs,
            'count' => $faqs->count()
        ]);
    }

    /**
     * Store a newly created FAQ in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
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
            'is_active' => $request->is_active ?? true
        ]);

        return response()->json([
            'message' => 'FAQ created successfully',
            'faq' => $faq
        ], 201);
    }

    /**
     * Display the specified FAQ.
     *
     * @param Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        return response()->json($faq);
    }

    /**
     * Update the specified FAQ in storage.
     *
     * @param Request $request
     * @param Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
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
            'is_active' => $request->has('is_active') ? $request->is_active : $faq->is_active
        ]);

        return response()->json([
            'message' => 'FAQ updated successfully',
            'faq' => $faq
        ]);
    }

    /**
     * Remove the specified FAQ from storage.
     *
     * @param Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return response()->json([
            'message' => 'FAQ deleted successfully'
        ]);
    }

    /**
     * Toggle the active status of an FAQ.
     *
     * @param Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function toggleStatus(Faq $faq)
    {
        $faq->update([
            'is_active' => !$faq->is_active
        ]);

        return response()->json([
            'message' => 'FAQ status updated successfully',
            'faq' => $faq
        ]);
    }
}
