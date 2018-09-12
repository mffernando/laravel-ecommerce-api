<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
  /**
   * Constructor
   *
   */
   public function __construct()
   {
     $this->middleware('auth:api')->except('index', 'show');
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductCollection::collection(Product::all());
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
    public function store(ProductRequest $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->detail = $request->detail;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->save();

          return response([
            'data' => new ProductResource($product)
          ], 201); //201 return created
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
