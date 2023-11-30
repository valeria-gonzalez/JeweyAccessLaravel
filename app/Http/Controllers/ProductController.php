<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('user')->get();

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
        $response = Gate::inspect('is-admin');
        if($response->denied()){
            Alert::warning('Access Denied', $response->message());
            return redirect()->route('product.index');
        }

        $req = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'stock' => 'required|integer',
            'price' => 'required|decimal:2',
            'description' => 'nullable|string|max:255',
            'imge' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $request->merge(['user_id' => Auth::id(), 'updated_by' => Auth::user()->name]);

        if ($request->hasFile('imge')) {
            $imagePath = $request->file('imge')->store('product_images', 'public');
            
            $request->merge(['image' => $imagePath]);
        }
        
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
        return view('product.product_edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $response = Gate::inspect('update', $product);
        if($response->denied()){
            Alert::warning('Access Denied', $response->message());
            return redirect()->route('product.index');
        }

        $req = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'stock' => 'required|integer',
            'price' => 'required|decimal:2',
            'description' => 'nullable|string|max:255',
            'imge' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $request->merge([
            'name' => strtoupper($request->name),
            'category' => strtoupper($request->category),
            'description' => strtoupper($request->description),
            'updated_by' => Auth::user()->name,
        ]);

        if ($request->hasFile('imge')) {
            Storage::disk('public')->delete($product->image);
            //Storage::delete($product->image);

            $path = $request->file('imge')->store('product_images', 'public');
            
            $product->update(['image' => $path]);
        }
        
        Product::where('id', $product->id)
            ->update($request->except('_token', '_method', 'imge'));

        Alert::success('Product Updated Successfully', 'We have updated the product successfully');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $response = Gate::inspect('delete', $product);
        if($response->denied()){
            Alert::warning('Access Denied', $response->message());
            return redirect()->route('product.index');
        }

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        
        $product->delete();
        
        Alert::warning('Product Deleted', 'The product has been deleted');
        return redirect()->route('product.index');
    }
}
