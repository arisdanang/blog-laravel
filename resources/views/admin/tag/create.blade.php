@extends('template_admin.home')
@section('sub-judul','Tambah Tag')
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

   <form action="{{ route('tag.store') }}" method="POST">
      @csrf
      <div class="form-group">
         <label>Tag</label>
         <input type="text" name="name" class="form-control">
      </div>
      <div class="form-group">
         <button type="submit" class="btn btn-primary btn-block">Simpan</button>
      </div>
   </form>

@endsection