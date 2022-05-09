<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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
        $products = Product::all();
        return response()->view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return response()->view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//         $request->dd();
        $validated = $request->validate([
            'name'         => 'required|max:100',
            'price'        => 'required|numeric',
            'tax_rate'     => 'required|numeric',
            'cost'         => 'required|numeric',
            'category_id'  => 'required|integer',
            'prepare_time' => 'required|numeric',
            'calories'     => 'required|numeric',
        ]);

        if(!$validated){
            return back()->withInput();
        }

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->tax_rate = $request->tax_rate;
        $product->cost = $request->cost;
        $product->category_id = $request->category_id;
        $product->prepare_time = $request->prepare_time;
        $product->calories = $request->calories;
        $product->stock_product = $request->is_stock ?? 0;
        $product->save();

        return redirect()->route('product.index')->with([
            'title' => 'Success',
            'msg' => 'Product added successfully.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $product = Product::query()->findOrFail($id);
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'         => 'required|max:100',
            'price'        => 'required|numeric',
            'tax_rate'     => 'required|numeric',
            'cost'         => 'required|numeric',
            'category_id'  => 'required|integer',
            'prepare_time' => 'required|numeric',
            'calories'     => 'required|numeric',
        ]);

        if(!$validated){
            return back()->withInput();
        }

        $product = Product::query()->findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->tax_rate = $request->tax_rate;
        $product->cost = $request->cost;
        $product->category_id = $request->category_id;
        $product->prepare_time = $request->prepare_time;
        $product->calories = $request->calories;
        $product->stock_product = $request->is_stock ?? 0;
        $product->save();

        return redirect()->route('product.index')->with([
            'title' => 'Success',
            'msg' => 'Product updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Product::query()->where('id', $id)->delete();
        return back()->with([
            'title' => 'Success',
            'msg' => "Product has been deleted."
        ]);
    }
}
