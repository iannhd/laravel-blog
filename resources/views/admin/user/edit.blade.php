@extends('admin.template')
@section('sub-judul', 'Edit User')
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
    <form action="{{route('user.update', $user->id)}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="name" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input name="email" class="form-control" name="email" value="{{$user->email}}" readonly>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" name="password" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Type</label>
            <select name="type" id="" class="form-control">
                <option value="" holder>Pilih Tipe</option>
                <option value="1" @if($user->type == 1) selected @endif>Admin</option>
                <option value="0" @if($user->type == 0) selected @endif>Author</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block">
            Edit User
        </button>
    </form>
@endsection