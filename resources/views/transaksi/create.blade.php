@extends('layouts.main')

@section('container')

<h1>Inputan Transaksi</h1>

<div class="col-lg-8">
    <form action="/transaksi" method="post">
        @csrf

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="text" class="form-control" id="tanggal" 
            aria-describedby="tanggal" name="tanggal" required autofocus value="{{ old('tanggal') }}">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Sales</label>
            <select class="form-select" aria-label="Default select example" name="user_id">
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->username }}</option>
                    
                @endforeach
                
              </select>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" 
            aria-describedby="alamat" name="alamat" required autofocus value="{{ old('alamat') }}">
        </div>
        <div class="mb-3">
            <label for="outlet" class="form-label">Outlet</label>
            <input type="text" class="form-control" id="outlet" 
            aria-describedby="outlet" name="outlet" required autofocus value="{{ old('outlet') }}">
        </div>
        <div class="mb-3">
            <label for="qty" class="form-label">Qty</label>
            <input type="number" class="form-control" id="qty" 
            aria-describedby="qty" name="qty" required autofocus value="{{ old('qty') }}">
        </div>
        <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <input type="text" class="form-control" id="satuan" 
            aria-describedby="satuan" name="satuan" required autofocus value="{{ old('satuan') }}">
        </div>
        <div class="mb-3">
            <label for="tunai" class="form-label">Tunai</label>
            <input type="number" class="form-control" id="tunai" 
            aria-describedby="tunai" name="tunai" required autofocus value="{{ old('tunai') }}">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" aria-label="Default select example" name="status">
                <option value="Terantar">Terantar</option>
                <option value="BelumTerantar">Belum Terantar</option>
              </select>
        </div>

        
        
        
            <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
    </form>
</div>

@endsection