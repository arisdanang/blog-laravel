@extends('template_admin.home')

@section('sub-judul','Post yang dihapus')
@section('content')

   @if(Session::has('success'))
      <div class="alert alert-success" role="alert">
         {{ Session('success') }}
      </div>
   @endif

   <table class="table table-striped table-hover table-bordered table-sm">
      <thead>
         <tr>
            <th>NO</th>
            <th>Nama Post</th>
            <th>Kategori</th>
            <th>Tags</th>
            <th>Thumbnail</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
      @foreach($post as $result => $hasil)
         <tr>
            <td>{{ $result + $post->firstitem() }}</td>
            <td>{{ $hasil->judul }}</td>
            <td>{{ $hasil->category->name }}</td>
            <td>@foreach($hasil->tags as $tag)
                  <ul>
                     <li>{{ $tag->name }}</li>
                  </ul>
               @endforeach
            </td>
            <td><img src="{{ asset( $hasil->gambar ) }}" width="100px" ></td>
            <td>
               <form action="{{ route('post.kill',$hasil->id) }}" method="post">
                  @csrf
                  @method('delete')
                  <a href="{{ route('post.restore',$hasil->id) }}" class="btn btn-info btn-sm">Restore</a> |
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
               </form>

            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
   {{ $post->links() }}
@endsection