@extends('template_admin.home')
@section('sub-judul','Edit User')
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

   <form action="{{ route('user.update', $user->id) }}" method="POST">
      @csrf  
      @method('put')
      <div class="form-group">
         <label>User</label>
         <input type="text" name="name" class="form-control" value="{{ $user->name }}">
      </div>
      <div class="form-group">
         <label>Email</label>
         <input type="email" name="email" class="form-control" value="{{ $user->email }}" readonly>
      </div>
      <div class="form-group">
         <label>Tipe</label>
         <select name="tipe">
            <option value="" holder>-- Pilih Tipe User --</option>
            <option value="1" holder
            @if($user->tipe == 1)
               selected
            @endif
            >Administrator</option>
            <option value="0" holder
            @if($user->tipe == 0)
               selected
            @endif
            >Author</option>
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