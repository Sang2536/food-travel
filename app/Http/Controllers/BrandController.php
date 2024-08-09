<?php

namespace App\Http\Controllers;

use App\Services\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct(protected BrandService $brandService)
    {
        //  code
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = $this->brandService->get();

        if (request()->ajax()) {
            return $this->brandService->getDatatables($brands);
        }

        return view('brands/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brands/create');
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
        if(request()->ajax()) {
            $brand = $this->brandService->get($id);

            return view('brands/show', ['brand' => $brand]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('brands/edit');
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
