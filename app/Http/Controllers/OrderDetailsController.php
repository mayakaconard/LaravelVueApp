<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderDetails;

class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderdet = OrderDetails::with(['products', 'orders'])->get();
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => $orderdet
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
        $orderdet = new OrderDetails();
        $orderdet->order_id = $request->order_id;
        $orderdet->product_id = $request->product_id;
        if ($orderdet->save()) {

            return response()->json([
                'status' => 'success',
                'status_code' => 200,
                'message' => 'Order Details Saved Successfully'
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
        $orderdet = OrderDetails::with(['products', 'orders'])->find($id);
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => $orderdet
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
        $orderdet = OrderDetails::with(['products', 'orders'])->find($id);
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => $orderdet
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
        $orderdet = OrderDetails::with(['products', 'orders'])->find($id);
        $orderdet->order_id = $request->order_id;
        $orderdet->product_id = $request->product_id;
        if ($orderdet->update()) {

            return response()->json([
                'status' => 'success',
                'status_code' => 200,
                'message' => 'Order Details updated Successfully'
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orderdet = OrderDetails::with(['products', 'orders'])->find($id);
        if (!$orderdet) {

            return response()->json([
                'status' => 'fail',
                'status_code' => 404,
                'message' => 'Supplier not found'
            ]);
        }

        if ($orderdet->delete()) {
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
