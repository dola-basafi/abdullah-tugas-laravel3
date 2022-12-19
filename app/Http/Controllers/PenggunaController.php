<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:255',
            'email' => 'required|email|unique:pengguna',
            'password' => 'required'
        ]);        
        if ($validator->fails()) {
            return redirect()->route('register_form')->withErrors($validator->errors());            
        }    
        $pengguna = new Pengguna();
        $pengguna ->nama = $request->nama;
        $pengguna->email = $request->email;
        $pengguna->password = $request->password;
        $pengguna->save();
        return redirect()->route('produk.index');
    }
}
