@extends('admin.template')
@section('sub-judul', 'User')
@section('content')

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session('success')}}
    </div>
    @endif
    <a href="{{route('user.create')}}" class="btn btn-info px-2 mb-4">Tambah User</a>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Email</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($user as $item => $hasil)
            <tr>
                <td>{{$item + $user->firstItem()}}</td>
                <td>{{$hasil->name}}</td>
                <td>{{$hasil->email}}</td>
                <td>
                    @if($hasil->type)
                       <span class="badge badge-info"> Admin</span>
                        @else 
                        <span class="badge badge-warning">Author</span>
                    @endif
                </td>
                <td>
                    <form action="{{route('user.destroy', $hasil->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                    <a href="{{route('user.edit', $hasil->id)}}" class="btn btn-primary">Edit</a>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
    @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
    {{$user->links()}}
    </div>
@endsection