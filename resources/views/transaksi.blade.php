@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Transaksi</h1>
</div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="/dashboard/kursi/create" class="btn btn-primary mb-3">Tambah Transaksi</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">APA</th>
                        <th scope="col">APA</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                   
                </tbody>

            </table>
        </div>
    </div>
</div>

@endsection