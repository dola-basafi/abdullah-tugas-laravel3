@extends('template')
@section('title','Tambah Barang')

@section('content')
@if (session()->get('logged'))
<a class="btn btn-primary" href="{{route('produk.create')}}" role="button">Tambah</a>    
@endif
<div class="row row-cols-1 row-cols-md-2 g-4">
    @foreach ($products as $item)
        <div class="col">
            
            <div class="card">
                <img src="{{$item->file}}" class="card-img-top" alt="..." height="200">
                <div class="card-body">
                    <h5 class="card-title">{{$item->name}}</h5>
                    <p class="card-text">{{$item->description}}</p>
                    <form action="/produk/{{$item->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-primary" href="{{route('editForm',['id' =>$item->id]) }}" role="button">Edit</a>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection