<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Asset;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAsset;
use App\Models\User;

class DataController extends Controller
{
    public function index() {
        $jml_asset = Asset::count();
        $jml_category = Category::count();
        $jml_product = Product::count();
        $jml_product_asset = ProductAsset::count();
        $jml_user = User::count();

        return view('index', [
            'jml_asset' => $jml_asset,
            'jml_category' => $jml_category,
            'jml_product' => $jml_product,
            'jml_product_asset' => $jml_product_asset,
            'jml_user' => $jml_user,
        ]);
    }

    public function dashboard() {
        $jml_asset = Asset::count();
        $jml_category = Category::count();
        $jml_product = Product::count();
        $jml_product_asset = ProductAsset::count();
        $jml_user = User::count();

        return view('admin.index', [
            'jml_asset' => $jml_asset,
            'jml_category' => $jml_category,
            'jml_product' => $jml_product,
            'jml_product_asset' => $jml_product_asset,
            'jml_user' => $jml_user,
        ]);
    }

}