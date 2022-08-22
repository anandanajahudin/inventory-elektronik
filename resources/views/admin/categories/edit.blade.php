<!-- Edit Category Modal-->
<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalabel">Edit Category</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('category.update', $category->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" id="category_name" value="{{ $category->category_name }}" placeholder="Nama kategori" required>
                    </div>
                    <div class="mb-3">
                        <label for="category_slug" class="form-label">Slug</label>
                        <input type="text" class="form-control @error('category_slug') is-invalid @enderror" name="category_slug" id="category_slug" value="{{ $category->category_slug }}" placeholder="Slug kategori" required>
                    </div>
                    <div class="mb-3">
                        <label for="asset" class="form-label">Pilih Asset</label>
                        <select class="form-control" name="asset" id="asset">
                            <option value="{{ $category->asset_id }}">{{ $category->asset->name }}</option>
                            @foreach ( $assets as $asset )
                                <option value="{{ $asset->id }}">{{ $asset->name }}</option>
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
