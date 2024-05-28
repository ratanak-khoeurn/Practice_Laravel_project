<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductListResource;
use App\Http\Resources\ShowProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::list();
        $products = ProductListResource::collection($products);
        return response(['sucess' => true, 'data' =>$products], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        Product::store($request);
        return response()->json([
            'success' => true,
            'data' => true,
            'message' => 'Product created successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if (!$product){
            return response()->json([
               'success' => false,
               'message' => 'Product not found'
            ], 404);
        }
        $product= new ShowProductResource($product);
        return ["success" => true, "data" =>$product];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $product = Product::find($id);
        if (!$product){
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }
        Product::store($request,$id);
        return ["success" => true, "Message" =>"Product updated successfully"];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product =Product::find($id);
        if (!$product){
            return response()->json([
               'success' => false,
               'message' => 'Product not found'
            ], 404);
        }
        $product->delete();
        return response()->json([
            'success' => true,
            'data' => true,
            'message' => 'product deleted successfully'
        ], 200);
    }
}
