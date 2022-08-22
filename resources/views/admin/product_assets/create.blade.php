<!-- Tambah ProductAsset Modal-->
<div class="modal fade" id="addProductAssetModal" tabindex="-1" role="dialog" aria-labelledby="addProductAssetModalabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductAssetModalabel">Tambah Product Asset</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('product_asset.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="asset" class="form-label">Pilih Asset</label>
                        <select class="form-control" name="asset" id="asset">
                            <option>Pilih asset...</option>
                            @foreach ( $assets as $asset )
                                <option value="{{ $asset->id }}">{{ $asset->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="product" class="form-label">Pilih Product</label>
                        <select class="form-control" name="product" id="product">
                            <option>Pilih product...</option>
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
