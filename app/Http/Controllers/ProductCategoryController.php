<?php

namespace App\Http\Controllers;

use App\Services\ProductCategoryService;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function __construct(protected ProductCategoryService $productCategoryService)
    {
        //  code
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $productCategories = $this->productCategoryService->get();

        if ($request->ajax()) {
            return $this->productCategoryService->getDatatables($productCategories);
        }

        return view('product_categories/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product_categories/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('product_categories/show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('product_categories/edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
