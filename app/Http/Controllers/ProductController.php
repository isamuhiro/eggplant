<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Product::orderBy('name')->paginate(10);
        $amount = $this->retrieveAmount();
        return view('produtos.index',compact('produtos','amount'));
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

    public function uploadPhoto($photo) {

        $destinationPath = 'images/';
        $fileName = $photo->getClientOriginalName();
        // dd($fileName);

        //var_dump($file->move($destinationPath.DIRECTORY_SEPARATOR.'tmp'));
        $photo->move($destinationPath, $fileName);
        // $filepath = $destinationPath.$fileName.'.'.$photo->getClientOriginalExtension();
        
        // dd($fileUrl);
        $fileUrl = url('/'.$destinationPath.$fileName);
        return $fileUrl;
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
        $product = new Product();
        $product->name = $request->name;
        if ($request->photo){ 
                $product->photo = $this->uploadPhoto($request->photo);
        }

        $product->weight = $request->weight;
        $product->price = $request->price;
        $product->amount = $request->amount;
        $product->save();

        //$product = Product::create($request->all());
        
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
        // dd($produto->photo);
        if ($produto->photo == null)
            $produto->photo = "/images/default.png";

        return view('produtos.edit',compact('produto'));
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
        if($request->photo){ 
            $produto->photo = $this->uploadPhoto($request->photo);
        }
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
    public function destroy($product_id)
    {
        $os = Product::find($product_id);
        $os->delete();
        return redirect()->route('produtos.index')->with('alert-success','Deletado com sucesso');
    }

    public function retrieveAmount(){

        $products = \DB::table('products')
        ->select( 'products.name as label', \DB::raw('sum(orders.amount) as value'))
        ->join('orders', 'products.id', '=', 'orders.products_id')
        ->groupBy('orders.products_id')
        ->get();
        
    return $products;
    }
}
