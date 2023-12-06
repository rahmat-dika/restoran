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
                            <li class="breadcrumb-item active">Riwayat Pesanan</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Riwayat Pesanan</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-9">
                                <h4 class="header-title">Riwayat Pesanan Restoran</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Transaksi</th>
                                            <th>Nama Pemesan</th>
                                            <th>Table</th>
                                            <th>Total Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $no = 1;
                                    @endphp
                                    <tbody>
                                        @foreach ($data['order'] as $item)
                                            <tr>
                                                <td>{{ $no++ }}.</td>
                                                <td>{{ $item->id_order }}</td>
                                                <td>{{ $item->order_name }}</td>
                                                <td>{{ $item->table }}</td>
                                                <td>{{ $item->total_payment }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                                        data-bs-toggle="modal" data-bs-target="#detail{{ $item->id_order }}">
                                                        Detail
                                                    </button>
                                                </td>
                                            </tr>
                                            {{-- Detail Pesanan --}}
                                            {{-- <div class="modal fade" id="detail{{ $item->id_order }}" tabindex="-1"
                                                aria-labelledby="myLargeModalLabel" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myLargeModalLabel">Edit Menu Makanan
                                                                & Minuman</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="mb-3">
                                                                        <label for="nameMenu" class="form-label">Nama
                                                                            Menu</label>
                                                                        <div class="form-control"></div>
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
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div> --}}
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- end page title -->

    </div> <!-- container -->
@endsection
