<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaksi.index',[
            'transaksis' => Transaksi::with('user')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $salesUsers = User::where('is_sales', true)->get();
        return view('transaksi.create', [
            'users' => $salesUsers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransaksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaksiRequest $request)
    {
        // 
        $validatedData = $request->validate([
            'tanggal' => ['required'],
            'user_id' => ['required'],
            'alamat' => ['required'],
            'outlet' => ['required'],
            'qty' => ['required'],
            'satuan' => ['required'],
            'tunai' => ['required'],
            'status' => ['required'],
        ]);

        Transaksi::create($validatedData);

        return redirect('/transaksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {

         // Mengecek apakah session edit sudah diset sebelumnya
    if(session('is_edit')){
        return redirect('/transaksi')->with('error', 'Anda tidak diizinkan untuk mengedit catatan ini lagi.');
    }

    // Menyimpan data session edit
    session(['is_edit' => true]);
        $salesUsers = User::where('is_sales', true)->get();
        return view('transaksi.edit',[
            'transaksi' => $transaksi,
            'users' => $salesUsers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransaksiRequest  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {

        $validatedData = $request->validate([
            'user_id' => ['required'],
            'alamat' => ['required'],
            'outlet' => ['required'],
            'qty' => ['required'],
            'satuan' => ['required'],
            'tunai' => ['required'],
            'status' => ['required'],
        ]);
        $validatedData['tanggal_transaksi'] = Carbon::parse($request->input('tanggal_transaksi'))->format('Y-m-d H:i:s');
        

        Transaksi::where('id', $transaksi->id)
            ->update($validatedData);

        return redirect('/transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
