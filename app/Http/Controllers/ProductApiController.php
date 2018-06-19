<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Product::all();
        return $produtos;
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
        $this->validate($request, [
            'name' => "bail|required",
            'photo' => "bail|image",
            'weight' => "bail|required|numeric",
            'price' => "bail|numeric",
            'amount' => "bail|numeric"
        ]);
        $product = Product::create($request->all());
        
        return redirect('produtos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product,$id)
    {   
        $produto = Product::find($id);
        return $produto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product,$id)
    {
        $this->validate($request, [
            'name' => "bail|required",
            'photo' => "bail|image",
            'weight' => "bail|required|numeric",
            'price' => "bail|numeric",
            'amount' => "bail|numeric"
        ]);
        
        $produto = Product::find($id);
        $produto->name = $request->name;
        $produto->photo = $request->photo;
        $produto->weight = $request->weight;
        $produto->price = $request->price;
        $produto->amount = $request->amount;
        $produto->save();

        return redirect('produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
