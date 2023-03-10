@extends('admin.template')

@section('sub-judul', 'Deleted Posts')
@section('content')

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session('success')}}
    </div>
    @endif
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Post</th>
                <th>Kategori Post</th>
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
                <td>
                    @foreach($hasil->tags as $tag)
                    <ul>
                        <li class="list-unstyled">{{$tag->name}}</li>
                    </ul>
                    @endforeach
                </td>
                <td class=""><img src="{{Storage::url("$hasil->gambar")}}"  alt="" class="img-fluid" style="width:200px"> </td>
                <td>
                    <form action="{{route('post.kill', $hasil->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                    <a href="{{route('post.restore', $hasil->id)}}" class="btn btn-primary">Restore</a>
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