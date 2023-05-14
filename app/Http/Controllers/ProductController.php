<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Return with Pagination
        return ProductResource::collection(Product::paginate(10));

        // $data = [
        //     'data1' => 1,
        //     'data2' => 2,
        //     'data3' => 3,
        //     'data4' => 4,
        //     'data5' => 4
        // ];

        // return response($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // Product::create($request->validate());
        // return response()->json('Store Success');

        Product::create($request->only([
            'name',
            'category',
            'description',
            'price',
            'stock',
            'sold',
        ]));
        return response()->json('Store Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // return $product->all();
        return new ProductResource($product->all());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
