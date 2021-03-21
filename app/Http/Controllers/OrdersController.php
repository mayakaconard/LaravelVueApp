<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Orders::all();
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => $order
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Orders();
        $order->order_number = $request->order_number;
        if ($order->save()) {

            return response()->json([
                'status' => 'success',
                'status_code' => 200,
                'message' => 'Order created Successfully'
            ]);
        } else {
            return response()->json([
                'status' => 'fail',
                'status_code' => 500,
                'message' => 'Error Occured'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Orders::find($id);
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Orders::find($id);
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Orders::find($id);
        $order->order_number = $request->order_number;
        if ($order->update()) {

            return response()->json([
                'status' => 'success',
                'status_code' => 200,
                'message' => 'Order Updated Successfully'
            ]);
        } else {
            return response()->json([
                'status' => 'fail',
                'status_code' => 424,
                'message' => 'Error Occured'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Orders::find($id);
        if (!$order) {

            return response()->json([
                'status' => 'fail',
                'status_code' => 404,
                'message' => 'Order not found'
            ]);
        }

        if ($order->delete()) {
            return response()->json([
                'status' => 'success',
                'status_code' => 200,
                'message' => 'Deleted Successfully!'
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'status_code' => 500,
                'message' => 'Error Occured'
            ]);
        }
    }
}
