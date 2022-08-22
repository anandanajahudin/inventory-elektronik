<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('admin.products.index', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $values = $request->validate([
            'product_name' => 'required|max:30',
            'product_slug' => 'required|max:30',
            'price' => 'required',
            'description' => 'required'
        ]);

        $product = new Product;

        $product->product_name = $values['product_name'];
        $product->product_slug = $values['product_slug'];
        $product->price = $values['price'];
        $product->description = $values['description'];
        $product->save();

        return redirect()->route('product.index')->with('status', 'Data Berhasil Disimpan');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $values = $request->validate([
            'product_name' => 'required|max:30',
            'product_slug' => 'required|max:30',
            'price' => 'required',
            'description' => 'required'
        ]);

        Product::where('id', $product->id)->update([
            'product_name' => $values['product_name'],
            'product_slug' => $values['product_slug'],
            'price' => $values['price'],
            'description' => $values['description']
        ]);

        return redirect()->route('product.index')->with('status', 'Data Berhasil Diubah');
    }

    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect()->route('product.index')->with('status', 'Data Berhasil Dihapus');
    }
}