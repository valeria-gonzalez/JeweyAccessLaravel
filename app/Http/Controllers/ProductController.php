<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::All();

        return view('product.product_index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.product_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $req = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'stock' => 'required|integer',
            'price' => 'required|decimal:2',
            'description' => 'nullable|string|max:255',
        ]);

        $request->merge(['user_id' => Auth::id()]);
        Product::create($request->all());

        Alert::success('Product Created Successfully', 'We have created the product successfully');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.product_show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product/product_edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $req = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'stock' => 'required|integer',
            'price' => 'required|decimal:2',
            'description' => 'nullable|string|max:255',
        ]);

        $request->merge([
            'name' => strtoupper($request->name),
            'category' => strtoupper($request->category),
            'description' => strtoupper($request->description),
        ]);
        
        Product::where('id', $product->id)
            ->update($request->except('_token', '_method'));

        Alert::success('Product Updated Successfully', 'We have updated the product successfully');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Alert::warning('Product Deleted', 'The product has been deleted');
        return redirect()->route('product.index');
    }
}
