<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*   public function __construct()
    {
        $this->middleware('auth');
    } */
    public function index()
    {
        $product = Products::all();
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => $product
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
        $product = new Products();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;

        if ($product->save()) {

            return response()->json([
                'status' => 'success',
                'status_code' => 200,
                'message' => 'Product created Successfully'
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::find($id);
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => $product
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
        $product = Products::find($id);
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => $product
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
        $product = Products::find($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;

        if ($product->save()) {

            return response()->json([
                'status' => 'success',
                'status_code' => 200,
                'message' => 'Product created Successfully'
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
        $product = Products::find($id);
        if (!$product) {

            return response()->json([
                'status' => 'fail',
                'status_code' => 404,
                'message' => 'Product not found'
            ]);
        }

        if ($product->delete()) {
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
