@extends('template_admin.home')
@section('sub-judul','Tambah User')
@section('content')
   @if(count($errors)>0)
      @foreach($errors->all() as $error)
         <div class="alert alert-danger" role="alert">
            {{ $error }}
         </div>
      @endforeach
   @endif

   @if(Session::has('success'))
      <div class="alert alert-success" role="alert">
         {{ Session('success') }}
      </div>
   @endif

   <form action="{{ route('user.store') }}" method="POST">
      @csrf  
      <div class="form-group">
         <label>User</label>
         <input type="text" name="name" class="form-control">
      </div>
      <div class="form-group">
         <label>Email</label>
         <input type="email" name="email" class="form-control">
      </div>
      <div class="form-group">
         <label>Tipe</label>
         <select name="tipe">
            <option value="" holder>-- Pilih Tipe User --</option>
            <option value="1" holder>Administrator</option>
            <option value="0" holder>Author</option>
         </select>
      </div>
      <div class="form-group">
         <label>Password</label>
         <input type="password" name="password" class="form-control">
      </div>
      <div class="form-group">
         <button type="submit" class="btn btn-primary btn-block">Simpan</button>
      </div>   
   </form>
@endsection