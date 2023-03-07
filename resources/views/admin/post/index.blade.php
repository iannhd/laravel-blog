@extends('admin.template')

@section('sub-judul', 'Post')
@section('content')

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session('success')}}
    </div>
    @endif
    <a href="{{route('post.create')}}" class="btn btn-info px-2 mb-4">Tambah Post</a>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Post</th>
                <th>Kategori Post</th>
                <th>Users</th>
                <th>Tags</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($post as $item => $hasil)
            <tr>
                <td>{{$item + $post->firstItem()}}</td>
                <td>{{$hasil->judul}}</td>
                <td>{{$hasil->category->name}}</td>
                <td>{{$hasil->users->name}}</td>
                <td>
                    @foreach($hasil->tags as $tag)
                        <span class="my-2 badge badge-info">{{$tag->name}}</span>
                    @endforeach
                </td>
                <td class=""><img src="{{Storage::url("$hasil->gambar")}}"  alt="" class="img-fluid" style="width:200px"> </td>
                <td>
                    <form action="{{route('post.destroy', $hasil->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                    <a href="{{route('post.edit', $hasil->id)}}" class="btn btn-primary">Edit</a>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
    @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
    {{$post->links()}}
    </div>
@endsection