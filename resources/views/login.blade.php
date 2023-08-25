@extends('template')
@section('title','Login')
@section('content')
<h1 class="mt-3">LOGIN</h1>
<form method="POST" action="{{route('login')}}" class="container mt-5" >
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control"  name="email">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection