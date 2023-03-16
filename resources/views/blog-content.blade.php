<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('frontend/style.css')}}">
  <link rel="stylesheet" href="{{asset('library/bootstrap/dist/css/bootstrap.min.css')}}">
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
  <title>Document</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top fixing-navbar">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <section class="content">
    <div class="container mt-3">
      <nav aria-label="breadcrumb" style="width: 80%;">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('blog')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="#">{{$curr->category->name}}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{$curr->judul}}</li>
        </ol>
      </nav>
      <div class="row d-flex flex-wrap">
        @foreach ($data as $item)
        <div class="col-lg-10 col-md-10 col-sm-12">
          <div class="container">
            
            <div class="upper mb-2 d-flex align-items-center">
              <img src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="profile">
              <span class="username">{{$item->users->name}}</span>
              <span class="created">{{date_format($item->created_at, "Y/m/d")}} - {{$item->created_at->diffForHumans()}}</span>
            </div>
           
            <img src="{{Storage::url($item->gambar)}}" class="right" alt="...">
              <h5 class="my-1 text-center text-capitalize">{{$item->judul}}</h5>
              <p class="text-justify"> {!!$item['content']!!}</p>
              <span class="font-weight-light">Diterbitkan dalam kategori</span> <span class="font-italic">{{$item->category->name}}</span>
              <div>
                @foreach ($item->tags as $tag)
                <span class="badge badge-secondary">{{$tag->name}}</span>
                @endforeach
              </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  
  
  <div class="container mt-5">
    <div class="row">
      <h1>Other stories from us..</h1>
      @foreach($before as $itemBefore)
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="media mb-5">
          <a href="{{route('blog.content', $itemBefore->slug)}}">
            <img class="mr-3" src="{{Storage::url($itemBefore->gambar)}}" alt="Generic placeholder image" style="height: 100px; object-fit:cover;" >
          </a>
          <div class="media-body">
            {{$itemBefore->judul}}
            <h6 class="mt-1">{{$itemBefore->users->name}} <span>{{date_format($itemBefore->created_at, "Y-m-d")}}</span></h6>
            <h6><span class="badge badge-light">{{$itemBefore->tags ? $itemBefore->tags : "no tags"}}</span></h6>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="{{asset('library/bootstrap/dist/js/bootstrap.min.js')}}">
  </script>
</body>
</html>