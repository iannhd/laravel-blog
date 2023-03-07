@extends('admin.template')
@section('sub-judul', 'Kategori')
@section('content')

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session('success')}}
    </div>
    @endif
    <a href="{{route('category.create')}}" class="btn btn-info px-2 mb-4">Tambah Kategori</a>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($category as $item => $hasil)
            <tr>
                <td>{{$item + $category->firstItem()}}</td>
                <td>{{$hasil->name}}</td>
                <td>
                    <form action="{{route('category.destroy', $hasil->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                    <a href="{{route('category.edit', $hasil->id)}}" class="btn btn-primary">Edit</a>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
    @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
    {{$category->links()}}
    </div>
@endsection