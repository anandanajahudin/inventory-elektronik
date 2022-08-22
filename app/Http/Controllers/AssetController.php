<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Asset;

class AssetController extends Controller
{
    public function index() {
        $assets = Asset::all();
        return view('admin.assets.index', ['assets' => $assets]);
    }

    public function store(Request $request)
    {
        $values = $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $asset = new Asset;

        $image = $request->file('file');
        $name = $image->getClientOriginalName();
        $path = $image->move('uploads/assets/', $name);
        $size = $path->getSize();

        $asset->name = $name;
        $asset->path = $path;
        $asset->size = $size;
        $asset->save();

        return redirect()->route('asset.index')->with('status', 'Data Berhasil Disimpan');
    }

    public function show(Asset $asset)
    {
        return view('admin.assets.show', compact('asset'));
    }

    public function update(Request $request, Asset $asset)
    {
        $values = $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $image = $request->file('file');
        $name = $image->getClientOriginalName();
        $path = $image->move('uploads/assets/', $name);
        $size = $path->getSize();

        Asset::where('id', $asset->id)->update([
            'name' => $name,
            'path' => $path,
            'size' => $size
        ]);

        return redirect()->route('asset.index')->with('status', 'Data Berhasil Diubah');
    }

    public function destroy(Asset $asset)
    {
        Asset::destroy($asset->id);
        return redirect()->route('asset.index')->with('status', 'Data Berhasil Dihapus');
    }
}