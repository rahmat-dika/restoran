@extends('layout.master')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Menu</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Menu</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-9">
                                <h4 class="header-title">Data Menu</h4>
                            </div>
                            <div class="col-md-3">
                                <button type="button"
                                    class="btn btn-primary rounded-pill waves-effect waves-light position-absolute end-0 mx-3"
                                    data-bs-toggle="modal" data-bs-target="#add-menu">
                                    + Add Menu
                                </button>
                            </div>
                        </div>

                        <div class="modal fade" id="add-menu" tabindex="-1" aria-labelledby="myLargeModalLabel"
                            role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myLargeModalLabel">Tambahkan Menu Makanan & Minuman</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ url('store-menu') }}" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                @csrf
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="nameMenu" class="form-label">Nama Menu</label>
                                                        <input type="text" id="nameMenu" name="food_name"
                                                            class="form-control" placeholder="nama menu" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="menuCategory" class="form-label">Kategori</label>
                                                        <select class="form-select" id="menuCategory" name="category"
                                                            required>
                                                            <option value="">-- Pilih --</option>
                                                            <option value="Makanan">Makanan</option>
                                                            <option value="Minuman">Minuman</option>
                                                            <option value="Cemilan">Cemilan</option>
                                                            <option value="Dessert">Dessert</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="priceMenu" class="form-label">Harga</label>
                                                        <input type="number" id="priceMenu" name="price"
                                                            class="form-control" placeholder="Harga" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="desc" class="form-label">Deskripsi</label>
                                                        <textarea class="form-control" id="desc" rows="5" name="description" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="pict" class="form-label">Foto Makanan</label>
                                                        <input type="file" id="pict" name="pict_food" required
                                                            class="form-control" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody>
                                @foreach ($data['menu'] as $item)
                                    <tr>
                                        <td>{{ $no++ }}.</td>
                                        <td>{{ $item->food_name }}</td>
                                        <td>{{ $item->category }}</td>
                                        <td>{{ number_format($item->price, 0, ',', '.') }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary waves-effect waves-light"
                                                data-bs-toggle="modal" data-bs-target="#show-menu{{ $item->id_menu }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-warning waves-effect waves-light"
                                                data-bs-toggle="modal" data-bs-target="#edit-menu{{ $item->id_menu }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger waves-effect waves-light"
                                                data-bs-toggle="modal" data-bs-target="#delete-menu{{ $item->id_menu }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    {{-- show menu --}}
                                    <div class="modal fade" id="show-menu{{ $item->id_menu }}" tabindex="-1"
                                        aria-labelledby="myLargeModalLabel" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myLargeModalLabel">{{ $item->food_name }}
                                                    </h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="mb-2">
                                                                <img class="img-thumbnail w-70 mx-auto d-block" src="{{ asset('assets/pict_food') }}/{{ $item->pict_food }}" alt="{{ $item->food_name }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="mb-3">
                                                                <label for="nameMenu" class="form-label">Nama Menu</label>
                                                                <div class="form-control">{{ $item->food_name }}</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="mb-3">
                                                                <label for="menuCategory" class="form-label">Kategori</label>
                                                                <div class="form-control">{{ $item->category }}</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="mb-3">
                                                                <label for="priceMenu" class="form-label">Harga</label>
                                                                <div class="form-control">{{ $item->price }}</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="mb-3">
                                                                <label for="desc" class="form-label">Deskripsi</label>
                                                                <div class="form-control">{{ $item->description }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                </div>

                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>

                                    {{-- edit menu --}}
                                    <div class="modal fade" id="edit-menu{{ $item->id_menu }}" tabindex="-1"
                                        aria-labelledby="myLargeModalLabel" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myLargeModalLabel">Edit Menu Makanan
                                                        & Minuman</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ url('update-menu') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            @csrf
                                                            <input type="hidden" name="id_menu"
                                                                value="{{ $item->id_menu }}">
                                                            <div class="col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for="nameMenu" class="form-label">Nama
                                                                        Menu</label>
                                                                    <input type="text" id="nameMenu" name="food_name"
                                                                        value="{{ $item->food_name }}"
                                                                        class="form-control" placeholder="nama menu"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for="menuCategory"
                                                                        class="form-label">Kategori</label>
                                                                    <select class="form-select" id="menuCategory"
                                                                        name="category" required>
                                                                        <option value="">-- Pilih --</option>
                                                                        <option value="Makanan" {{ $item->category == "Makanan" ? 'selected' : ''}}>Makanan</option>
                                                                        <option value="Minuman" {{ $item->category == "Minuman" ? 'selected' : ''}}>Minuman</option>
                                                                        <option value="Cemilan" {{ $item->category == "Cemilan" ? 'selected' : ''}}>Cemilan</option>
                                                                        <option value="Dessert" {{ $item->category == "Dessert" ? 'selected' : ''}}>Dessert</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for="priceMenu"
                                                                        class="form-label">Harga</label>
                                                                    <input type="number" id="priceMenu" name="price"
                                                                        value="{{ $item->price }}" class="form-control"
                                                                        placeholder="Harga" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for="desc"
                                                                        class="form-label">Deskripsi</label>
                                                                    <textarea class="form-control" id="desc" rows="5" required name="description">{{ $item->description }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="mb-3">
                                                                    <label for="pict" class="form-label">Foto
                                                                        Makanan <span class="text-pink">(Jika tidak berubah
                                                                            lewati saja)</span></label>
                                                                    <input type="file" id="pict" name="pict_food"
                                                                        class="form-control" accept="image/*">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>

                                    {{-- Hapus Menu --}}
                                    <div class="modal fade" id="delete-menu{{ $item->id_menu }}" tabindex="-1"
                                        aria-labelledby="myLargeModalLabel" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myLargeModalLabel">Hapus Menu Makanan
                                                        & Minuman</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ url('delete-menu') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        @csrf
                                                        <input type="hidden" name="id_menu"
                                                            value="{{ $item->id_menu }}">
                                                        <h4>Apakah Anda Yakin Untuk Menghapusnya??</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

    </div> <!-- container -->
@endsection
