@extends('template_admin.home')
@section('sub-judul','Edit kategori')
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

   <form action="{{ route('category.update',$category->id) }}" method="POST">
      @csrf
      @method('patch')
      <div class="form-group">
         <label>Kategori</label>
         <input type="text" name="name" class="form-control" value="{{ $category->name }}">
      </div>
      <div class="form-group">
         
      </div><button type="submit" class="btn btn-primary btn-block">Simpan</button>
   </form>
@endsection