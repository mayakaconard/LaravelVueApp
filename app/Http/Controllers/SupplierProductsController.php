<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SupplierProducts;

class SupplierProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier_Product = SupplierProducts::with(['products', 'suppliers'])->get();
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => $supplier_Product
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
        $supplier_Product = new SupplierProducts();
        $supplier_Product->supply_id = $request->supply_id;
        $supplier_Product->product_id = $request->product_id;
        if ($supplier_Product->save()) {

            return response()->json([
                'status' => 'success',
                'status_code' => 200,
                'message' => 'Supplier Product Saved Successfully'
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
        $supplier_Product = SupplierProducts::with(['products', 'suppliers'])->find($id);
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => $supplier_Product
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
        $supplier_Product = SupplierProducts::with(['products', 'suppliers'])->find($id);
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => $supplier_Product
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
        $supplier_Product = SupplierProducts::with(['products', 'suppliers'])->find($id);
        $supplier_Product->supply_id = $request->supplier_id;
        $supplier_Product->product_id = $request->product_id;
        if ($supplier_Product->update()) {

            return response()->json([
                'status' => 'success',
                'status_code' => 200,
                'message' => 'Supplier Product details updated Successfully'
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
        $supplier_Product = SupplierProducts::with(['products', 'suppliers'])->find($id);
        if (!$supplier_Product) {

            return response()->json([
                'status' => 'fail',
                'status_code' => 404,
                'message' => 'Record not found'
            ]);
        }

        if ($supplier_Product->delete()) {
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
