<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     $products = Product::paginate(10);
    //     return response()->json($products);
    // }
    public function index(Request $request)
    {
        $products = Product::with(['subcategory.category'])
            ->orderBy('ProductName')
            ->paginate(10);

        $products->transform(function ($product) {
            return [
                'ProductKey' => $product->ProductKey,
                'CategoryName' => $product->subcategory->category->CategoryName ?? null,
                'SubcategoryName' => $product->subcategory->SubcategoryName ?? null,
                'ProductSubcategoryKey' => $product->ProductSubcategoryKey,
                'ProductSKU' => $product->ProductSKU,
                'ProductName' => $product->ProductName,
                'ModelName' => $product->ModelName,
                'ProductDescription' => $product->ProductDescription,
                'ProductColor' => $product->ProductColor,
                'ProductSize' => $product->ProductSize,
                'ProductStyle' => $product->ProductStyle,
                'ProductCost' => $product->ProductCost,
                'ProductPrice' => $product->ProductPrice,
            ];
        });

        return response()->json($products);
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
        $data = $request->all();
        $product = Product::create($data);
        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $product = Product::find($id);
        if ($product) {
            return response()->json($product);
        }
        return response()->json(['message' => 'Produto não encontrado'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $data = $request->all();
        $product->update($data);
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $product->delete();
        return response()->json(['message' => 'Produto excluído com sucesso']);
    }
}