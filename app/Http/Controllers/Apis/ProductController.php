<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
    @OA\Info(
        version="1.0",
        title="Example API",
        description="Example info",
        @OA\Contact(name="Swagger API Team")
    )
*/
class ProductController extends Controller
{
    /**
     * @OA\Get(
     *      path="/docs/api/products",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *     @OA\PathItem (
     *     ),
     * )
     */
    public function index()
    {
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA',
        ]);
    }

    // public function create()
    // {
    //     //
    // }

    // public function store(Request $request)
    // {
    //     //
    // }

    // public function show(string $id)
    // {
    //     //
    // }

    // public function edit(string $id)
    // {
    //     //
    // }

    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    // public function destroy(string $id)
    // {
    //     //
    // }
}
