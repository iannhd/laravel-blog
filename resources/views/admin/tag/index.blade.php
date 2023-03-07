@extends('admin.template')
@section('sub-judul', 'Tag')
@section('content')

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session('success')}}
    </div>
    @endif
    <a href="{{route('tag.create')}}" class="btn btn-info px-2 mb-4">Tambah Tag</a>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Tag</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($tag as $item => $hasil)
            <tr>
                <td>{{$item + $tag->firstItem()}}</td>
                <td>{{$hasil->name}}</td>
                <td>
                    <form action="{{route('tag.destroy', $hasil->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                    <a href="{{route('tag.edit', $hasil->id)}}" class="btn btn-primary">Edit</a>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
    @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
    {{$tag->links()}}
    </div>
@endsection