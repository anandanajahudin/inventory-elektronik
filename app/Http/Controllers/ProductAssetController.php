<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Asset;
use App\Models\Product;
use App\Models\ProductAsset;

class ProductAssetController extends Controller
{
    public function index() {
        $assets = Asset::all();
        $products = Product::all();
        $product_assets = ProductAsset::with('asset', 'product')->get();

        return view('admin.product_assets.index', [
            'assets' => $assets,
            'products' => $products,
            'product_assets' => $product_assets,
        ]);
    }

    public function store(Request $request)
    {
        $values = $request->validate([
            'asset' => 'required',
            'product' => 'required'
        ]);

        $product_asset = new ProductAsset;

        $product_asset->asset_id = $values['asset'];
        $product_asset->product_id = $values['product'];
        $product_asset->save();

        return redirect()->route('product_asset.index')->with('status', 'Data Berhasil Disimpan');
    }

    public function show(ProductAsset $product_asset)
    {
        $assets = Asset::all();
        $products = Product::all();
        $product_assets = ProductAsset::with('asset', 'product')->get();

        return view('admin.product_assets.show', [
            'assets' => $assets,
            'products' => $products,
            'product_assets' => $product_assets,
        ], compact('product_asset'));
    }

    public function update(Request $request, ProductAsset $product_asset)
    {
        $values = $request->validate([
            'asset' => 'required',
            'product' => 'required'
        ]);

        ProductAsset::where('id', $product_asset->id)->update([
            'asset_id' => $values['asset'],
            'product_id' => $values['product']
        ]);

        return redirect()->route('product_asset.index')->with('status', 'Data Berhasil Diubah');
    }

    public function destroy(ProductAsset $product_asset)
    {
        ProductAsset::destroy($product_asset->id);
        return redirect()->route('product_asset.index')->with('status', 'Data Berhasil Dihapus');
    }
}