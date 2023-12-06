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
                        </ol>
                    </div>
                    <h4 class="page-title">Pesanan</h4>
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
                            <div class="col-md-3">
                                <a href="{{ url('add-pesanan') }}" class="btn btn-primary rounded-pill waves-effect waves-light position-absolute end-0 mx-3">
                                    + Add Order
                                </a>
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
                                                    {{-- <button type="button" class="btn btn-primary waves-effect waves-light"
                                                        data-bs-toggle="modal" data-bs-target="#edit-menu{{ $item->id_menu }}">
                                                        Detail
                                                    </button> --}}
                                                    <a class="btn btn-success waves-effect waves-light" href="{{ url("pay-pesanan") }}/{{  $item->id_order }}">Bayar</a>
                                                </td>
                                            </tr>
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
