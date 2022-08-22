<!-- Edit ProductAsset Modal-->
<div class="modal fade" id="editProductAssetModal" tabindex="-1" role="dialog" aria-labelledby="editProductAssetModalabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductAssetModalabel">Edit Product Asset</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('product_asset.update', $product_asset->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="asset" class="form-label">Pilih Asset</label>
                        <select class="form-control" name="asset" id="asset">
                            <option value="{{ $product_asset->asset_id }}">{{ $product_asset->asset->name }}</option>
                            @foreach ( $assets as $asset )
                                <option value="{{ $asset->id }}">{{ $asset->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="product" class="form-label">Pilih Product</label>
                        <select class="form-control" name="product" id="product">
                            <option value="{{ $product_asset->product_id }}">{{ $product_asset->product->product_name }}</option>
                            @foreach ( $products as $product )
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
