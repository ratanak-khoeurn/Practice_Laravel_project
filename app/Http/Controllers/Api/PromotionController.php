<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PromotionListResource;
use App\Http\Resources\ShowPromotionResource;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $promotion = Promotion::list();
            $promotion = PromotionListResource::collection($promotion);
            return response(['sucess' => true, 'data' =>$promotion], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Promotion::store($request);
        return response()->json([
            'success' => true,
            'data' => true,
            'message' => 'Promotion created successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $promotion = Promotion::find($id);
        if (!$promotion){
            return response()->json([
               'success' => false,
               'message' => 'Promotion not found with id ' . $id
            ], 404);
        }
        $promotion= new ShowPromotionResource($promotion);
        return ["success" => true, "data" =>$promotion];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $promotion = Promotion::find($id);
        if(!$promotion){
            return response()->json([
               'success' => false,
                'data' => false,
               'message' => 'Promotion not found with id' .$id
            ], 404);
        }
        Promotion::store($request,$id);
        return response()->json([
            'success' => true,
            'data' => true,
            'message' => 'Promotion updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $promotion =Promotion::find($id);
        if (!$promotion){
            return response()->json([
               'success' => false,
               'message' => 'Promotion not found with id' .$id
            ], 404);
        }
        $promotion->delete();
        return response()->json([
            'success' => true,
            'data' => true,
            'message' => 'Promotion deleted successfully'
        ], 200);
    }
}
