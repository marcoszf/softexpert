<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productSales = ProductSale::all();
        return response()->json($productSales);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|integer|min:1',
            'total_amount' => 'required|numeric|min:0',
            'product_id' => 'required|exists:products,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $productSale = ProductSale::create([
            'quantity' => $request->input('quantity'),
            'total_amount' => $request->input('total_amount'),
            'product_id' => $request->input('product_id'),
        ]);

        return response()->json(['message' => 'Product sale created successfully', 'data' => $productSale], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productSale = ProductSale::find($id);

        if (!$productSale) {
            return response()->json(['message' => 'Product sale not found'], 404);
        }

        return response()->json($productSale);
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
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|integer|min:1',
            'total_amount' => 'required|numeric|min:0',
            'product_id' => 'required|exists:products,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $productSale = ProductSale::find($id);

        if (!$productSale) {
            return response()->json(['message' => 'Product sale not found'], 404);
        }

        $productSale->update([
            'quantity' => $request->input('quantity'),
            'total_amount' => $request->input('total_amount'),
            'product_id' => $request->input('product_id'),
        ]);

        return response()->json(['message' => 'Product sale updated successfully', 'data' => $productSale]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productSale = ProductSale::find($id);

        if (!$productSale) {
            return response()->json(['message' => 'Product sale not found'], 404);
        }

        $productSale->delete();

        return response()->json(['message' => 'Product sale deleted successfully']);
    }
}
