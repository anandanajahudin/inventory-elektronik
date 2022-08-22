<!-- Tambah Category Modal-->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalabel">Tambah Kategori</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" id="category_name" value="{{ old('category_name') }}" placeholder="Nama kategori" required>
                    </div>
                    <div class="mb-3">
                        <label for="category_slug" class="form-label">Slug Kategori</label>
                        <input type="text" class="form-control @error('category_slug') is-invalid @enderror" name="category_slug" id="category_slug" value="{{ old('category_slug') }}" placeholder="Jenis kategori" required>
                    </div>
                    <div class="mb-3">
                        <label for="asset" class="form-label">Pilih Asset</label>
                        <select class="form-control" name="asset" id="asset">
                            <option>Pilih asset...</option>
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
