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
  <nav class="navbar navbar-expand-lg navbar-light fixed-top custom-navbar">
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
    </div>
  </nav>

  <section class="hero-image" style="background-image: url({{Storage::url('upload/posts/1678048734Sepatu-Nike-Pixabay.com_-750x536.jpg')}}); height: 600px; background-position: center; background-repeat:no-repeat;background-size: cover; object-fit: cover;">
   
  </section>
  <hr class="my-4 top-separator"> 

  <section class="content">
    <div class="container mt-3">
      <h2>Tulisan terbaru kami..</h2>
      <form action="{{route('blog.search')}}" method="GET" class="form-inline my-2 my-lg-0">
        @csrf
        <input class="form-control mr-sm-2" type="search" placeholder="Cari Artikel.." aria-label="Search" name="search">
        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Cari</button>
      </form>
      <form action="{{route('blog')}}" method="GET">
        @csrf
        <button type="submit" class="btn btn-outline-dark ">Tampilkan semua tulisan</button>
      </form>
      <div class="row ">
        @foreach ($data as $item)
        {{-- <hr class="my-4 post-separator"> --}}
        <div class="col-sm-12 d-flex my-5" style="max-height: 150px">
          <a href="{{route('blog.content', $item->slug)}}"  style="width:150px;object-fit:cover;" >
            <img src="{{Storage::url($item->gambar)}}"alt="" style="width: 100%">
          </a>
          <div class=" d-flex flex-column" style="height: 100%">
            <h5 class="ml-2 text-capitalize text-left">{{$item->judul}}</h5>
          
            <p class="ml-2 mb-0 text-left">Tulisan oleh <span class=" font-weight-bold">{{$item->users->name}}</span>
            </p>
            <p class="ml-2 mb-0 text-left">Kategory tulisan: <br> <span class="font-weight-bold">"{{$item->category->name}}"</span>
            </p>
            <p class="ml-2 mb-0 text-left">Ditulis pada {{date_format($item->created_at, "Y-m-d")}}
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="{{asset('library/bootstrap/dist/js/bootstrap.min.js')}}">
  </script>
  <script>
    $('#myCarousel').carousel({
  interval: 3000,
  cycle: true
}); 
  </script>
</body>
</html>