@extends('main')
@section('title', 'Admin | Detail Pengguna')

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
                <a class="collapse-item" href="{{ route('product.index') }}">Data Product</a>
                <a class="collapse-item" href="{{ route('product_asset.index') }}">Data Product Asset</a>
                <a class="collapse-item active" href="{{ route('user.index') }}">Data Pengguna</a>
            </div>
        </div>
    </li>
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pengguna</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addPenggunaModal">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
    </div>

    @if (session()->has('status'))
        <div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
            <div class="alert-message">
                <h5 class="text-center"><strong style="margin-right:10px;">{{ session('status') }}</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" autofocus></button>
            </div>
        </div>
    @endif

    <!-- Tabel Pengguna -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengguna</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="name"><b>Username</b></label>
                </div>
                <div class="col-sm-10">
                    {{ $user->name }}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="email"><b>Email</b></label>
                </div>
                <div class="col-sm-10">
                    {{ $user->email }}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="password"><b>Password</b></label>
                </div>
                <div class="col-sm-10">
                    {{ $user->password }}
                </div>
            </div>
            <div class="row mb-3">
                <div class="text-center">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <a class="btn btn-warning" data-toggle="modal" data-target="#editPenggunaModal">
                        <i class="fas fa-edit"></i> Ubah
                    </a>
                    <form action="{{ $user->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="deleteFunction()">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('admin.users.create')
    @include('admin.users.edit')
@endsection

<script>
    function deleteFunction() {
        event.preventDefault();
        var form = event.target.form;
            swal({
                title: "Anda yakin ingin menghapus?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya!",
                cancelButtonText: "Tidak!",
                closeOnConfirm: false,
                closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                form.submit();
            } else {
                swal("Dibatalkan", "", "error");
            }
        });
    }
</script>
