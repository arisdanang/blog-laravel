@extends('template_admin.home')

@section('sub-judul','Edit Post')
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

   <form action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('patch')
      <div class="form-group">
         <label>Judul</label>
         <input type="text" name="judul" class="form-control" value="{{ $post->judul }}">
      </div>
      <div class="form-group">
         <label>Kategori</label>
         <select name="category_id" class="form-control">
         <option value="" holder>--Pilih Kategori--</option>
         @foreach($category as $result)
            <option value="{{ $result->id }}"
            @if($result->id == $post->category_id)
               selected
            @endif
            >{{ $result->name }}</option>
         @endforeach
         </select>
      </div>
      <div class="form-group">
         <label for="">Pilih Tag</label>
         <select name="tags[]" class="form-control select2" multiple="">
            @foreach($tags as $tag)
               <option value="{{ $tag->id }}"
               @foreach($post->tags as $value)
                  @if($tag->id == $value->id)
                     selected
                  @endif
               @endforeach
               >{{ $tag->name }}</option>
            @endforeach
         </select>
      </div>
      <div class="form-group">
         <label>Konten</label>
         <textarea name="content" class="form-control">{{ $post->content }}</textarea>
      </div>
      <div class="form-group">
         <label>Thumbnail</label>
         <input type="file" name="gambar" class="form-control" value="{{ $post->gambar }}">
      </div>
      <div class="form-group">
         
      </div><button type="submit" class="btn btn-primary btn-block">Simpan</button>
   </form>
@endsection