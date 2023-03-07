@extends('admin.template')
@section('sub-judul', 'Tambah User')
@section('content')

    @if(count($errors)>0)
        @foreach($errors->all() as $error)
        <ul class="w-100 d-flex justify-content-center bg-danger py-4 px-5 rounded">
            <li class="text-white list-unstyled alert alert-warning" role="alert">{{$error}}</li>
        </ul>    
        @endforeach
    @endif

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session('success')}}
        </div>
    @endif
    <form action="{{route('user.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" name="password">
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="name" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label>Tipe User</label>
            <select name="type" id="" class="form-control">
                <option value="" holder>Pilih User</option>
                <option value="1" holder>Admin</option>
                <option value="0" holder>Author</option>
            </select>
        </div>
       
        <button type="submit" class="btn btn-primary btn-block">
            Simpan User
        </button>
    </form>
@endsection