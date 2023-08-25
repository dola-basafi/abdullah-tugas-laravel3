@extends('template')
@section('title', 'Edit')
@section('content')
    @error('msg')
        {{ $message }}
    @enderror
    
    <form action="{{ route('editForm', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data" class="container mt-5">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="nama" value="{{ $product->nama }}">

            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="name" name="harga" value="{{ $product->harga }}">

            <label for="stok" class="form-label">Stok</label>
            <input type="text" class="form-control" id="name" name="stok" value="{{ $product->stok }}">

            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10"> {{ $product->deskripsi }} </textarea>

            <label for="file" class="form-label">Gambar</label>
            <div>
                <img src="{{ $product->file }}" class="img-fluid img-thumbnail" height="200" width="200" alt="..."  id="gambar">
                <label for="file" class="btn btn-primary">Ubah</label>
            </div>
            <input onchange="document.getElementById('gambar').src = window.URL.createObjectURL(this.files[0])" type="file" id="file" style="display:none" name="file" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>

    </form>
    
   

@endsection
