<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Asset;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $assets = Asset::all();
        $categories = Category::with('asset')->get();

        return view('admin.categories.index', [
            'assets' => $assets,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $values = $request->validate([
            'category_name' => 'required|max:30',
            'category_slug' => 'required|max:30',
            'asset' => 'required'
        ]);

        $category = new Category;

        $category->category_name = $values['category_name'];
        $category->category_slug = $values['category_slug'];
        $category->asset_id = $values['asset'];
        $category->save();

        return redirect()->route('category.index')->with('status', 'Data Berhasil Disimpan');
    }

    public function show(Category $category)
    {
        $assets = Asset::all();
        $categories = Category::with('asset')->get();

        return view('admin.categories.show', [
            'assets' => $assets,
            'categories' => $categories,
        ], compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $values = $request->validate([
            'category_name' => 'required|max:30',
            'category_slug' => 'required|max:30',
            'asset' => 'required'
        ]);

        Category::where('id', $category->id)->update([
            'category_name' => $values['category_name'],
            'category_slug' => $values['category_slug'],
            'asset_id' => $values['asset'],
        ]);

        return redirect()->route('category.index')->with('status', 'Data Berhasil Diubah');
    }

    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect()->route('category.index')->with('status', 'Data Berhasil Dihapus');
    }
}