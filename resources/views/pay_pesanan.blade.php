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
                            <li class="breadcrumb-item active">Pesanan</li>
                            <li class="breadcrumb-item active">Pembayaran</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Pembayaran</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Id Transaksi</label>
                                <div class="form-control">{{ $data_order['order']->id_order }}</div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Nama Pemesan</label>
                                <div class="form-control">{{ $data_order['order']->order_name }}</div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Nomor Meja</label>
                                <div class="form-control">{{ $data_order['order']->table }}</div>
                            </div>
                            <div class="col-md-9 my-2">
                                <h4 class="header-title">Daftar Pesanan</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Makanan</th>
                                                <th>Harga</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $no = 1;
                                        @endphp
                                        <tbody>
                                            @foreach ($data_order['detail'] as $item)
                                                <tr>
                                                    <td>{{ $no++ }}.</td>
                                                    <td>{{ $item->food_name }}</td>
                                                    <td>{{ $item->price }}</td>
                                                    <td>{{ $item->total }}</td>
                                                    <td>{{ $item->total_price }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="4" class="text-end">Jumlah yang Harus Dibayarkan : <br> Biaya Layanan dan Pajak : </td>
                                                <td>{{ $data_order['total'] }} <br> {{ ceil(($data_order['total'] * 10 / 100) / 1000) * 1000 }}</td>
                                            </tr>
                                            @php
                                                $total = $data_order['total'] + ceil(($data_order['total'] * 10 / 100) / 1000) * 1000
                                            @endphp
                                            <tr>
                                                <td colspan="3"></td>
                                                <td class="text-end fw-bold">Total</td>
                                                <td class="fw-bold" id="totalBayar" >{{ $total }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <a href="{{ url('pesanan') }}" class="btn btn-secondary waves-effect mx-2">Kembali</a>
                                <button type="button" id="btnBayarTunai" class="btn btn-primary waves-effect waves-light mx-2">Bayar Tunai</button>
                                <button type="button" class="btn btn-primary waves-effect waves-light mx-2">Dompet Digital</button>
                            </div>
                            <div class="col-md-4 text-center">
                                <form id="bayarTunai" method="post" enctype="multipart/form-data" style="display: none">
                                    <div class="row">
                                        @csrf
                                        <input type="hidden" name="id_order" value="{{ $data_order['order']->id_order }}">
                                        <input type="hidden" name="total_payment" id="totalWithPajak">
                                        <div class="col-sm-8">
                                            <input type="number" id="inputUang" name="uang" class="form-control w-100" required placeholder="Uang Yang Dibayarkan">
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-success waves-effect waves-light w-100">Bayar</button>
                                        </div>
                                    </div>
                                </form>

                                <div class="row" id="cetakStruk" style="display: none">
                                    <div class="col-sm-6">
                                        <p class="text-success mt-1" id="kembalian"></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="button" class="btn btn-success waves-effect waves-light w-100" id="btnStruk">Cetak Struk</button>
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
