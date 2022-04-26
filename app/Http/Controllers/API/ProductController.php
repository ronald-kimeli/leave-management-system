<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use League\CommonMark\Extension\SmartPunct\EllipsesParser;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return response()->json(['products'=>$products],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|max:191',
            'description' => 'required|max:191',
            'price' => 'required|max:191',
            'quantity' => 'required|max:191'
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->save();

        return response()->json(['message'=>'Product Added Successfully'],200);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        if($products)
        {
            return response()->json(['products'=>$products],200);  
        }
        else
        {
            return response()->json(['message'=>'No Product Found'],404);
        }
        
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
        $request->validate([
            'name'=> 'required|max:191',
            'description' => 'required|max:191',
            'price' => 'required|max:191',
            'quantity' => 'required|max:191'
        ]);

        $product = Product::find($id);
        if($product)
        {
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->update();
    
            return response()->json(['message'=>'Product updated Successfully'],200);
        }
        else
        {
          
            return response()->json(['message'=>'No Product Found'],404);  
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
        $product = Product::find($id);
        if($product)
        {
            $product->delete();
            return response()->json(['message'=>'Product Deleted Successfully'],200);
        }
        else
        {
            return response()->json(['message'=>'No Product Found'],404); 
        }
    }
}
