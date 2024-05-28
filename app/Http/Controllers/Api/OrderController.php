<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderListResource;
use App\Http\Resources\ShowOrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::list();
        $orders = OrderListResource::collection($orders);
        return response(['sucess' => true, 'data' =>$orders], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Order::store($request);
        return response()->json([
            'success' => true,
            'data' => true,
            'message' => 'Order created successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orders = Order::find($id);
        if (!$orders){
            return response()->json([
               'success' => false,
               'message' => 'Order not found'
            ], 404);
        }
        $orders= new ShowOrderResource($orders);
        return ["success" => true, "data" =>$orders];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $orders = Order::find($id);
        if (!$orders){
            return response()->json([
                'success' => false,
                'message' => 'Order not found'
            ], 404);
        }
        Order::store($request,$id);
        return ["success" => true, "Message" =>"Order updated successfully"];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orders =Order::find($id);
        if (!$orders){
            return response()->json([
               'success' => false,
               'message' => 'Order not found'
            ], 404);
        }
        $orders->delete();
        return response()->json([
            'success' => true,
            'data' => true,
            'message' => 'Order deleted successfully'
        ], 200);
    }
}
