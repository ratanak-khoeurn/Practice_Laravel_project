<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryListResource;
use App\Http\Resources\CategoryShowResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::list();
        $categories = CategoryListResource::collection($categories);
        return response(['sucess' => true, 'data' =>$categories], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        Category::store( $request);
        return ["success" => true, "Message" =>"Category created successfully"];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        if(!$category){
            return response()->json([
               'success' => false,
                'data' => false,
               'message' => 'Category not found'
            ], 404);
        }
        $category= new CategoryShowResource($category);
        return ["success" => true, "data" =>$category];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category = Category::find($id);
        if(!$category){
            return response()->json([
               'success' => false,
                'data' => false,
               'message' => 'Category not found'
            ], 404);
        }
        Category::store($request,$id);
        return ["success" => true, "Message" =>"Category updated successfully"];

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        $category = Category::find($id);
        if(!$category){
            return response()->json([
               'success' => false,
                'data' => false,
               'message' => 'Category not found'
            ], 404);
        }
        $category->delete();
        return ["success" => true, "Message" =>"Category deleted successfully"];
    }
}
