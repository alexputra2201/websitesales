@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Transaksi</h1>
</div>
@if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            @if (auth()->check() && auth()->user()->is_admin)
            <a href="/transaksi/create" class="btn btn-primary mb-3">Tambah Transaksi</a>
            @endif
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Sales</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Outlet</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Tunai</th>
                        <th scope="col">Status</th>
                        @if (auth()->check() && auth()->user()->is_sales)
                        <th scope="col">Action</th>
                        @endif
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $transaksi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaksi->tanggal_transaksi }}</td>
                            <td>{{ $transaksi->user->username }}</td>
                            <td>{{ $transaksi->alamat }}</td>
                            <td>{{ $transaksi->outlet }}</td>
                            <td>{{ $transaksi->qty }}</td>
                            <td>{{ $transaksi->satuan }}</td>
                            <td>{{ $transaksi->tunai }}</td>
                            @if($transaksi->status == "BelumTerantar")
                            <td><span class="badge bg-warning">{{ $transaksi->status }}</span></td>
                            @elseif ($transaksi->status == "Terantar")
                            <td><span class="badge bg-success">{{ $transaksi->status }}</span></td>
                            @else
                            <td></td>
                            @endif
                            
                            @if (auth()->check() && auth()->user()->is_sales)
                            <td>
                                <a href="/transaksi/{{ $transaksi->id }}/edit" class="badge bg-warning"> Edit</a>
                            </td>
                            @endif
                        </tr>
                    @endforeach

                   
                </tbody>

            </table>
        </div>
    </div>
</div>

@endsection