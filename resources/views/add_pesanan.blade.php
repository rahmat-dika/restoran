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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pesanan</a></li>
                            <li class="breadcrumb-item active">Tambah Pesanan</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Tambah Pesanan</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-9">
                                <h4 class="header-title">Pesanan Restoran</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" enctype="multipart/form-data" id="formPesanan">
                                    <div class="row">
                                        @csrf
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="nameMenu" class="form-label">Nama Pemesan</label>
                                                <input type="text" id="orderName" name="order_name" class="form-control"
                                                    placeholder="Nama Pemesan" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="mb-3">
                                                <label for="totalOrder" class="form-label">Nomor Meja</label>
                                                <input type="number" id="tableOrder" name="table" class="form-control"
                                                    placeholder="Nomor Meja" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="mb-3">
                                                <div id="idOrder" style="display: none">
                                                    <label class="form-label">Nomor transaksi</label>
                                                    <div id="nomorPesanan" class="form-control"></div>
                                                </div>
                                                <div id="btnStorePesanan">
                                                    <label for="totalOrder" class="form-label text-white">l</label>
                                                    <button type="submit" class="btn btn-primary w-100">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="detailPesanan" style="display: none;">
                                <div class="col-md-12 p-2">
                                    <form method="post" enctype="multipart/form-data" id="formDetail">
                                        @csrf
                                        <input type="hidden" name="id_order" id="idHidden">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    {{-- <input type="text" id="nameMenu" name="food_name" class="form-control"
                                                    placeholder="Nama Makanan" required> --}}
                                                    <label for="foodName" class="form-label">Nama Makanan</label>
                                                    <select class="form-select js-example-basic-single" name="id_food"
                                                        id="food">
                                                        <option value=""></option>
                                                        @foreach ($data['menu'] as $item)
                                                            <option value="{{ $item->id_menu }}">{{ $item->food_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="totalOrder" class="form-label">Jumlah</label>
                                                    <input type="number" id="totalOrder" name="total"
                                                        class="form-control" placeholder="Total Pesanan" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="totalOrder" class="form-label text-white">l</label>
                                                    <button type="submit" class="btn btn-primary w-100">Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <div class="table-responsive">
                                            <table id="table table-hover mb-0"
                                                class="table table-striped dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Menu</th>
                                                        <th>Harga</th>
                                                        <th>Jumlah</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="orderFood"></tbody>
                                            </table>

                                            {{-- modal edit --}}
                                            <div id="editPesanan" class="modal fade" tabindex="-1" role="dialog"
                                                aria-labelledby="standard-modalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="standard-modalLabel">Edit Pesanan
                                                            </h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form id="formEditPesanan" method="post"
                                                            enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <h4 id="foodEdit"></h4>
                                                                @csrf
                                                                <input type="hidden" id="inputIdEditPesanan" name="id_detail">
                                                                <div class="col-sm-6">
                                                                    <div class="mb-3">
                                                                        <label for="nameMenu" class="form-label">Total</label>
                                                                        <input type="number" id="inputEditPesanan" name="total" class="form-control" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->

                                            {{-- modal Hapus --}}
                                            <div id="hapusPesanan" class="modal fade" tabindex="-1" role="dialog"
                                                aria-labelledby="standard-modalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="standard-modalLabel">Hapus Pesanan</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form id="formHapusPesanan" method="post"
                                                            enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <h4>Apakah yakin untuk menghapusnya?</h4>
                                                                @csrf
                                                                <input type="text" id="inputIdHapusPesanan" name="id_detail">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- end page title -->

    </div> <!-- container -->
@endsection
