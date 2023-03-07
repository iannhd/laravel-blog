@extends('admin.template')
@section('sub-judul', 'Tambah Post')
@section('content')

    @if(count($errors)>0)
        @foreach($errors->all() as $error)
        <ul class="w-100 d-flex justify-content-center bg-danger py-4 px-5 rounded">
            <li class="text-white list-unstyled " >{{$error}}</li>
        </ul>    
        @endforeach
    @endif

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session('success')}}
        </div>
    @endif
    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="judul">
        </div>
        <div class="form-group">
            <label>Pilih Tag</label>
            <select class="form-control select2" multiple="" name="tags[]">
            @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
              @endforeach
            </select>
          </div>
        <div class="form-group">
            <label>Kategori</label>
            <select name="category_id" id="" class="form-control">
                <option value="" holder>Pilih Kategori</option>
                @foreach ($category as $hasil) 
                <option value="{{$hasil->id}}">
                    {{$hasil->name}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Konten</label>
            <textarea id="editor"name="content" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Thumbnail</label>
            <input type="file" class="form-control" name="gambar">
        </div>
        <button type="submit" class="btn btn-primary btn-block">
            Simpan Post
        </button>
    </form>

    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script></script>
    
@endsection