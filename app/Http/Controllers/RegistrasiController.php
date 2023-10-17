<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    public function index()
    {
        return view('layouts.registrasi');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'unique:users'],
            'username' => ['required', 'min:5', 'max:255', 'unique:users'],
            'password' => ['required', 'min:5', 'max:255'],
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/')->with('success', 'Registration successfull! Please login');
    }
}
