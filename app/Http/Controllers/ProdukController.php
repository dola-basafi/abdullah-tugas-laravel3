<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    function index()
    {
        $produk = Produk::all();
        return view('dashboard', ['products' => $produk]);
    }
    function show($id)
    {
        $produk = Produk::find($id);
        return view('show', ['produk' => $produk]);
    }
    function edit(Request $request, $id)
    {
        $product = Produk::with('user')-> find($id);
        if(!$product){
            return redirect()
            ->back()
            ->withErrors([
                'errors' => 'data produk tidak di temukan'
            ]);
        }
        if(!($product->user_id == session()->get('idPengguna'))){
            return redirect()
            ->back()
            ->withErrors([
                'errors' => 'anda bukan pembuat produk ini, jadi anda tidak bisa meng-edit maupun meng-hapus produk ini'
            ]);
        }
        return view('edit', compact('product'));
    }
    function store(Request $request)
    {

        $validate =  [
            'nama' => 'required|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        if ($request->harga < 1) {
            return view('create', ['error' => "harga tidak boleh lebih kecil dari 1"]);
        }
        if ($request->stok < 1) {
            return view('create', ['error' => 'stok tidak boleh lebih kecil dari 1']);
        }

        $validate = $request->validate($validate);

        $file = $request->file('file');

        $filename = $file->hashName();
        $file->move('file', $filename);
        $path = $request->getSchemeAndHttpHost() . '/file/' . $filename;

        $validate['file'] = $path;
        $validate['user_id'] = session()->get('idPengguna');
        Produk::create($validate);

        return redirect()->route('produk.index');
    }
    function update(Request $request, $id)
    {

        $produk = Produk::find($id);
        if(!$produk){
            return redirect()
            ->back()
            ->withErrors([
                'errors' => 'data produk tidak di temukan'
            ]);
        }
        if(!$produk->user_id == session()->get('idPengguna')){
            return redirect()
            ->back()
            ->withErrors([
                'errors' => 'anda bukan pembuat produk ini, jadi anda tidak bisa meng-edit maupun meng-hapus produk ini'
            ]);
        }
        $validate =  [
            'nama' => 'required|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'required',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        if ($request->harga < 1) {
            return redirect()->back()->withErrors([
                'msg' => "harga tidak boleh lebih kecil dari 1"
            ]);
        }
        if ($request->stok < 1) {
            return redirect()
                ->back()
                ->withErrors([
                    'msg' => 'stok tidak boleh lebih kecil dari 1'
                ]);
        }

        $validate = $request->validate($validate);

        if ($request->file('file')) {
            $path = str_replace($request->getSchemeAndHttpHost(), "", $produk->file);
            $path = public_path() . $path; 
            unlink($path);
            $path = parse_url($request->file);
            $file = $request->file('file');
            $filename = $file->hashName();
            $file->move('file', $filename);
            $validate['file'] = $request->getSchemeAndHttpHost() . '/file/' . $filename;
        }

        $produk->update($validate);

        return redirect()->route('produk.index');
    }
    function destroy($id, Request $request)
    {
        $produk = Produk::find($id);
        if(!$produk){
            return redirect()
            ->back()
            ->withErrors([
                'errors' => 'data produk tidak di temukan'
            ]);
        }
        if(!$produk->user_id == session()->get('idPengguna')){
            return redirect()
            ->back()
            ->withErrors([
                'errors' => 'anda bukan pembuat produk ini, jadi anda tidak bisa meng-edit maupun meng-hapus produk ini'
            ]);
        }
        $path = str_replace($request->getSchemeAndHttpHost(), "", $produk->file);
        $path = public_path() . $path;
        unlink($path);
        $produk->delete();
        return redirect()->route('produk.index');
    }
}
