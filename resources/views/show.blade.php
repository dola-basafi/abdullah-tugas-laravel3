@extends('template')
@section('title','Tambah Barang')
@section('content')
    
@endsection
<div class="mb-3">
  <label for="name" class="form-label">Nama</label>
  <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">

  <label for="price" class="form-label">Harga</label>
  <input type="text" class="form-control" id="name" name="price" value="{{$product->price}}">

  <label for="stock" class="form-label">Stokc</label>
  <input type="text" class="form-control" id="name" name="stock" value="{{$product->stock}}">

  <label for="description" class="form-label">Deskripsi</label>
  <textarea class="form-control" name="description" id="" cols="30" rows="10"> {{$product->description}} </textarea>    

  <label for="file" class="form-label">Gambar</label>
  <input type="file" class="form-control" id="file" name="file" accept="image/*"  ">

</div>