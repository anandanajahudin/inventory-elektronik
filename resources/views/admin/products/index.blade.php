@extends('main')
@section('title', 'Admin | Data Product')

@section('topbar_navbar')
    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
            <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
        </div>
    </li>
@endsection

@section('navbar_menu')
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Master</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('asset.index') }}">Data Asset</a>
                <a class="collapse-item" href="{{ route('category.index') }}">Data Category</a>
                <a class="collapse-item active" href="{{ route('product.index') }}">Data Product</a>
                <a class="collapse-item" href="{{ route('product_asset.index') }}">Data Product Asset</a>
                <a class="collapse-item" href="{{ route('user.index') }}">Data Pengguna</a>
            </div>
        </div>
    </li>
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Product</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addProductModal">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
    </div>

    @if (session()->has('status'))
        <div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
            <div class="alert-message">
                <h5 class="text-center"><strong style="margin-right:10px;">{{ session('status') }}</strong></h5>
            </div>
        </div>
    @endif

    <!-- Tabel Product -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Product</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No.</th>
                            <th>Nama Product</th>
                            <th>Slug</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Tombol</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $products as $product )
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $product->product_name }}</td>
								<td>{{ $product->product_slug }}</td>
								<td>Rp {{ number_format($product->price) }}</td>
								<td>{{ $product->description }}</td>
								<td class="table-action text-center" width="5%">
									<a href="{{ route('product.index').'/'.$product->id }}" class="btn btn-primary mb-2">
										<i class="fas fa-arrow-right"></i>
									</a>
								</td>
							</tr>
						@endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="5%">No.</th>
                            <th>Nama Product</th>
                            <th>Slug</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Tombol</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    @include('admin.products.create')
@endsection
