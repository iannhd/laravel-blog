@extends('admin.template')
@section('sub-judul', 'Tambah Kategori')
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
    <form action="{{route('category.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Kategori</label>
            <input type="text" class="form-control" name="name">
        </div>
        <button type="submit" class="btn btn-primary btn-block">
            Simpan Kategori
        </button>
    </form>
@endsection