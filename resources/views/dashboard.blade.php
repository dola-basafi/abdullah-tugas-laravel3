@extends('template')
@section('title', 'Tambah Barang')

@section('content')
    @if (session()->get('logged'))
        <a class="btn btn-primary" href="{{ route('produk.create') }}" role="button">Tambah</a>
    @endif
    <div class="row row-cols-1 row-cols-md-2 g-4 mt-5">
      @if ($products->isEmpty() )
          belum ada data silahkan tekan tombol tambah untuk menambah data
      @endif
      
        @foreach ($products as $item)
            <div class="col">
                <div class="card">
                    <img src="{{ $item->file }}" class="card-img-top" alt="..." height="200">
                    <div class="card-body">
                        <h5 class="card-title">nama : {{ $item->nama }}sdfdsf</h5>
                        <p class="card-text">harga : {{ $item->harga }}</p>
                        <p class="card-text">stok : {{ $item->stok }}</p>
                        <p class="card-text">deskripsi : {{ $item->deskripsi }}</p>
                        <p class="card-text">dibuat oleh : {{ $item->user->nama }}</p>
                        @if (session()->get('logged'))
                            <form action="/produk/delete/{{ $item->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                @if ($item->user_id == session()->get('idPengguna'))
                                    <a class="btn btn-primary" href="{{ route('editForm', ['id' => $item->id]) }}"
                                        role="button">Edit</a>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                @endif
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
