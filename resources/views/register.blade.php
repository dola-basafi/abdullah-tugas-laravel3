@extends('template')
@section('title','Register')
@section('content')


<h1 class="mt-3">REGISTER</h1>

<form method="POST" action="{{route('register_form')}}" class="container mt-5" >
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control"  name="email">
    @error('email')
    <div class="alert alert-danger" role="alert">
      {{$message}}
    </div>        
    @enderror
  </div>
  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control"  name="nama">
    @error('nama')
    <div class="alert alert-danger" role="alert">
      {{$message}}
    </div>        
    @enderror
  </div> 
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  @error('password')
    <div class="alert alert-danger" role="alert">
      {{$message}}
    </div>        
    @enderror
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection