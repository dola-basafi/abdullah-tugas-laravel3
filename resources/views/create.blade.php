@extends('template')
@section('title','Tambah Barang')

@section('content')




<form action="{{route('produk.create')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama">
    @error('nama')
    <div class="alert alert-danger" role="alert">
      {{$message}}
    </div>        
    @enderror
    <label for="harga" class="form-label">Harga</label>
    <input type="number" class="form-control" id="price" name="harga">
    @error('harga')
    <div class="alert alert-danger" role="alert">
      {{$message}}
    </div>        
    @enderror
    <label for="stok" class="form-label">Stock</label>
    <input type="number" class="form-control" id="stok" name="stok">
    @error('stok')
    <div class="alert alert-danger" role="alert">
      {{$message}}
    </div>        
    @enderror
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10"></textarea>    
    @error('deskripsi')
    <div class="alert alert-danger" role="alert">
      {{$message}}
    </div>        
    @enderror
    <label for="file" class="form-label">Gambar</label>
    <input type="file" class="form-control" id="file" name="file" accept="image/*">
    @error('gambar')
    <div class="alert alert-danger" role="alert">
      {{$message}}
    </div>        
    @enderror

  </div>
  
  <button type="submit" class="btn btn-primary">Tambah</button>
</form>
@endsection