<!doctype html>
<html data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body style="background-color: rgba(0, 12, 27, 1)">

    <header>
        {{-- navbar --}}
        <nav class="navbar navbar-expand-lg text-light navbar-dark" style="background-color: rgba(0, 46, 107, 0.60);">
            <div class="container-fluid ps-lg-5">
                <a class="navbar-brand fw-bold" href="/dashboard"><i class="bi bi-speedometer"> Dashboard</i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/produk"><i class="bi bi-box-seam"></i>
                                Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/pelanggan"><i
                                    class="bi bi-person-heart"></i> Pelanggan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/penjualan"><i class="bi bi-cash-stack"></i> Penjualan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/detailpenjualan"><i class="bi bi-receipt"></i> Detail
                                Penjualan</a>
                        </li>
                    </ul>
                    <br>
                    <li class="nav-item dropdown d-flex pe-4">

                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="true">
                            <i class="bi bi-person-circle pe-1"></i>
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item disabled text-light" href="#"><i
                                        class="bi bi-person-vcard"></i> Role: {{ auth()->user()->role }}</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> My Profile</a></li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                        Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <br>
                    <form class="d-flex pe-4" role="search">
                        <input class="form-control me-2" style="background-color: rgba(0, 12, 27, 1)" type="search"
                            name="keyword" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success d-flex" type="submit"><i class="bi bi-search me-1"></i>
                            Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main class="mb-5">
        {{-- Main --}}
        <div class="col-lg-15 d-flex justify-content-center">
            @if (session('success-add'))
                <div class="alert alert-success alert-dismissible d-flex align-items-center fade show mt-3"
                    role="alert">
                    <div><i class="bi bi-emoji-sunglasses me-2"></i>{{ session('success-add') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('success-edit'))
                <div class="alert alert-success alert-dismissible d-flex align-items-center fade show mt-3"
                    role="alert">
                    <div><i class="bi bi-emoji-sunglasses me-2"></i>{{ session('success-edit') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('success-delete'))
                <div class="alert alert-success alert-dismissible d-flex align-items-center fade show mt-3"
                    role="alert">
                    <div><i class="bi bi-emoji-sunglasses me-2"></i>{{ session('success-delete') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="container py-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-plus-lg"></i> Tambah Data
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-light" style="background-color: rgba(0, 12, 27, 1)">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pelanggan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/pelanggan/simpan" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="PelangganID" class="form-label">PelangganID</label>
                                    <input type="number" style="background-color: rgba(0, 46, 107, 0.60)"
                                        class="form-control" placeholder="Masukkan ID Pelanggan" name="PelangganID"
                                        required autofocus id="PelangganID">
                                </div>
                                <div class="mb-3">
                                    <label for="NamaPelanggan" class="form-label">NamaPelanggan</label>
                                    <input type="text" style="background-color: rgba(0, 46, 107, 0.60)"
                                        class="form-control" placeholder="Masukkan Nama Pelanggan"
                                        name="NamaPelanggan" required id="NamaPelanggan">
                                </div>
                                <div class="mb-3">
                                    <label for="Alamat" class="form-label">Alamat</label>
                                    <input type="text" style="background-color: rgba(0, 46, 107, 0.60)"
                                        class="form-control" placeholder="Masukkan Alamat Pelanggan" name="Alamat"
                                        required id="Alamat">
                                </div>
                                <div class="mb-3">
                                    <label for="NomorTelepon" class="form-label">NomorTelepon</label>
                                    <input type="number" style="background-color: rgba(0, 46, 107, 0.60)"
                                        class="form-control" placeholder="Masukkan Nomor Telepon Pelanggan"
                                        name="NomorTelepon" required id="NomorTelepon">
                                </div>
                                <button type="submit" class="px-5 mt-4 py-2 btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Table --}}
        <div class="container text-light pb-4">
            <form class="form-inline">
                <div class="form-group">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label><small>Show :</small></label>
                        </div>
                        <div class="col-auto">
                            <select class="form-control text-light" id="pagination" style="width: 3rem;">
                                <option value="5" @if ($perPage == 5) selected @endif>5</option>
                                <option value="10" @if ($perPage == 10) selected @endif>10</option>
                                <option value="15" @if ($perPage == 15) selected @endif>15</option>
                                <option value="20" @if ($perPage == 20) selected @endif>20</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <span class="form-text">
                                Entries
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="container table-responsive d-flex text-center" style="height: 30rem;">
            {{-- Table Buat Tablet / Display Sedang --}}
            <div class="d-flex d-md-none">
                <center>
                    <table class="table text-center table-sm table-hover table-bordered table-striped-columns"
                        style="height: 25rem; width: max-content">
                        <thead>
                            <tr>
                                <th style="background-color: rgba(0, 102, 98, 0.748)"><i class="bi bi-key"
                                        style="background-color: rgba(0, 102, 98, 0.1)"></i> PelangganID</th>
                                <th style="background-color: rgba(0, 102, 98, 0.748)"><i class="bi bi-file-text"
                                        style="background-color: rgba(0, 102, 98, 0.1)"></i> NamaPelanggan
                                </th>
                                <th style="background-color: rgba(0, 102, 98, 0.748)"><i class="bi bi-house"
                                        style="background-color: rgba(0, 102, 98, 0.1)"></i> Alamat</th>
                                <th style="background-color: rgba(0, 102, 98, 0.748)"><i class="bi bi-telephone"
                                        style="background-color: rgba(0, 102, 98, 0.1)"></i> NomorTelepon</th>
                                <th colspan="3" style="background-color: rgba(0, 102, 98, 0.748)"><i
                                        class="bi bi-code-slash" style="background-color: rgba(0, 102, 98, 0.1)"></i>
                                    Aksi</th>
                            </tr>
                        </thead>
                        @foreach ($pelanggan as $item)
                            <tr>
                                <th style="background-color: rgba(2, 36, 78, 0.2)">{{ $item->PelangganID }}</th>
                                <td style="background-color: rgba(2, 36, 78, 0.2)">{{ $item->NamaPelanggan }}</td>
                                <td style="background-color: rgba(2, 36, 78, 0.2)">{{ $item->Alamat }}</td>
                                <td style="background-color: rgba(2, 36, 78, 0.2)">{{ $item->NomorTelepon }}</td>
                                <td style="background-color: rgba(2, 36, 78, 0.2)">
                                    <center><a href="/pelanggan/{{ $item->PelangganID }}/edit"
                                            class="btn btn-warning my-1 mx-2"><i class="bi bi-pencil-square"></i>
                                            Edit</a></center>
                                </td>
                                <td style="background-color: rgba(2, 36, 78, 0.2)">
                                    <center>
                                        <form action="/pelanggan/{{ $item->PelangganID }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure want to delete {{ $item->NamaPelanggan }} with ID {{ $item->PelangganID }}?')"
                                                class="btn btn-danger my-1 mx-2" value="DELETE"><i
                                                    class="bi bi-trash"></i>
                                                Delete</button>
                                        </form>
                                    </center>
                                </td>
                                <td style="background-color: rgba(2, 36, 78, 0.2)">
                                    <center>
                                        <a href="#" class="btn btn-info my-1 mx-2"><i class="bi bi-eye"></i>
                                            Info</a>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </center>
            </div>
            {{-- Penutup Table Buat Tablet / Display Sedang --}}
            {{--  --}}
            {{-- Table Buat Desktop / Display besar --}}
            <div class="d-none d-md-flex">
                <center>
                    <table class="table text-center table-sm table-hover table-bordered table-striped"
                        style="height: 25rem; width: 80rem">
                        <thead>
                            <tr>
                                <th style="background-color: rgba(0, 102, 98, 0.748)"><i class="bi bi-key"
                                        style="background-color: rgba(0, 102, 98, 0.1)"></i> PelangganID</th>
                                <th style="background-color: rgba(0, 102, 98, 0.748)"><i class="bi bi-file-text"
                                        style="background-color: rgba(0, 102, 98, 0.1)"></i> NamaPelanggan
                                </th>
                                <th style="background-color: rgba(0, 102, 98, 0.748)"><i class="bi bi-house"
                                        style="background-color: rgba(0, 102, 98, 0.1)"></i> Alamat</th>
                                <th style="background-color: rgba(0, 102, 98, 0.748)"><i class="bi bi-telephone"
                                        style="background-color: rgba(0, 102, 98, 0.1)"></i> NomorTelepon</th>
                                <th colspan="3" style="background-color: rgba(0, 102, 98, 0.748)"><i
                                        class="bi bi-code-slash" style="background-color: rgba(0, 102, 98, 0.1)"></i>
                                    Aksi</th>
                            </tr>
                        </thead>
                        @foreach ($pelanggan as $item)
                            <tr>
                                <th style="background-color: rgba(2, 36, 78, 0.2)">{{ $item->PelangganID }}</th>
                                <td style="background-color: rgba(2, 36, 78, 0.2)">{{ $item->NamaPelanggan }}</td>
                                <td style="background-color: rgba(2, 36, 78, 0.2)">{{ $item->Alamat }}</td>
                                <td style="background-color: rgba(2, 36, 78, 0.2)">{{ $item->NomorTelepon }}</td>
                                <td style="background-color: rgba(2, 36, 78, 0.2)">
                                    <center><a href="/pelanggan/{{ $item->PelangganID }}/edit"
                                            class="btn btn-warning my-1 mx-2"><i class="bi bi-pencil-square"></i>
                                            Edit</a></center>
                                </td>
                                <td style="background-color: rgba(2, 36, 78, 0.2)">
                                    <center>
                                        <form action="/pelanggan/{{ $item->PelangganID }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure want to delete {{ $item->NamaPelanggan }} with ID {{ $item->PelangganID }}?')"
                                                class="btn btn-danger my-1 mx-2" value="DELETE"><i
                                                    class="bi bi-trash"></i>
                                                Delete</button>
                                        </form>
                                    </center>
                                </td>
                                <td style="background-color: rgba(2, 36, 78, 0.2)">
                                    <center>
                                        <a href="#" class="btn btn-info my-1 mx-2"><i class="bi bi-eye"></i>
                                            Info</a>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </center>
            </div>
            {{-- Penutup Table Buat Desktop / Display Besar --}}
        </div>
        <div class="container pt-4">
            {{ $pelanggan->appends(compact('perPage'))->links() }}
        </div>
    </main>
    <footer class="fixed-bottom py-1 d-block small text-center" style="background-color: rgba(0, 12, 27, 1)">
        <!-- Grid container -->
        <div class="container"></div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center">
            © 2024 Copyright:
            <a class="text-body text-decoration-none link-danger"
                href="https://kasir-zakaria.test/"><i>kasir-zakaria.test</i></a>
        </div>
        <!-- Copyright -->
    </footer>
    <script>
        document.getElementById('pagination').onchange = function() {
            window.location = "{!! $pelanggan->url(1) !!}&perPage=" + this.value;
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
