<?php

namespace App\Http\Controllers;

use App\SupplierProducts;
use Illuminate\Http\Request;
use App\Suppliers;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Suppliers::all();
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => $supplier
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
        $supplier = new Suppliers();
        $supplier->name = $request->name;
        if ($supplier->save()) {

            return response()->json([
                'status' => 'success',
                'status_code' => 200,
                'message' => 'Supplier created Successfully'
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
        $supplier = Suppliers::find($id);
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => $supplier
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
        $supplier = Suppliers::find($id);
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => $supplier
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
        $supplier = Suppliers::find($id);
        $supplier->name = $request->name;
        if ($supplier->update()) {

            return response()->json([
                'status' => 'success',
                'status_code' => 200,
                'message' => 'Supplier Updated Successfully'
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
        $supplier = Suppliers::find($id);
        if (!$supplier) {

            return response()->json([
                'status' => 'fail',
                'status_code' => 404,
                'message' => 'Supplier not found'
            ]);
        }

        if ($supplier->delete()) {
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
