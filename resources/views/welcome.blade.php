<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- General CSS Files --}}

    <link rel="stylesheet"
        href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('frontend/style/style.css')}}">
    @stack('style')

    <!-- Template CSS -->

        
    {{-- Start GA --}}
    <script async
    src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
    </script>
    <!-- END GA -->

</head>
<body>
        {{-- HEADER --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">TINYLONGSTEP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                
              </ul>
              <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Login <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Signup <span class="sr-only">(current)</span></a>
                </li>
              </ul>
            </div>
        </nav>

        {{-- Header End --}}

        {{-- Carousel --}}
        <div class="container-fluid carousel-section">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block carousel-img" src="https://images.pexels.com/photos/4559592/pexels-photo-4559592.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="First slide">
                  </div>
                  <div class="carousel-item ">
                    <img class="d-block carousel-img" src="https://images.pexels.com/photos/261579/pexels-photo-261579.jpeg?auto=compress&cs=tinysrgb&w=1600" alt="Second slide">
                  </div>
                  <div class="carousel-item ">
                    <img class="d-block carousel-img" src="https://images.pexels.com/photos/3194523/pexels-photo-3194523.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Third slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        {{-- Carousel End --}}

        {{-- Tags --}}


        <div class="container-fluid my-5">
            <div class="row pill-container">
                <div class="col-lg-9 col-sm-12 col-md-12 col-xs-12 d-flex flex-wrap ">
                    @foreach ($tag as $tagItem)
                    <a href="#" class=" tags-pill">{{$tagItem->name}}</a>
                    @endforeach
                </div>
                <div class="m-auto col-lg-2 col-sm-12 col-md-12 xs-12 d-flex align-items-center justify-content-center">
                    <button class="btn btn-secondary btn-block">Show All Categories</button>
                </div>
            </div>
        </div>

        {{-- Tags End --}}

        {{-- POST AND SIDEBAR --}}

        <div class="container-fluid">
            <div class="page-home">
                <div class="left">
                    
                    @foreach ($post as $postItem)
                    <div class="card m-auto post-card" style="width: 60rem;">
                        <img class="card-img-top" src="{{Storage::url($postItem->gambar)}}" alt="Card image cap">
                        <div class="card-body">
                           <div class="row">
                            <div class="col-9"> <div class="tags d-flex flex-wrap">
                                <a href="#" class=" tags-pill">Tags</a>
                                <a href="#" class=" tags-pill">Tags</a>
                                <a href="#" class=" tags-pill">Tags</a>
                                <a href="#" class=" tags-pill">Tags</a>
                                <a href="#" class=" tags-pill">Tags</a>
                            </div></div>
                            <div class="col-3">
                                <p>{{$post->created_at}}</p>
                            </div>
                           </div>
                            <h2 class="card-title text-center">{{$postItem->judul}}</h2>
                            <p class="card-text">
                            {{$postItem->content}}
                            </p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>  
                    @endforeach
                </div>
                <div class="right">
                    <ul class="nav nav-tabs post-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Top Post</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Recent Post</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <table class="table">
                                <tbody>
                                  <tr>
                                    <th scope="row" class="h3">1</th>
                                    <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores, incidunt.</td>
                                  </tr>
                                  <tr>
                                    <th scope="row" class="h3">2</th>
                                    <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores, incidunt.</td>
                                  </tr>
                                  <tr>
                                    <th scope="row" class="h3">3</th>
                                    <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores, incidunt.</td>
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <table class="table">
                                <tbody>
                                  <tr>
                                    <th scope="row" class="h3">1</th>
                                    <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores, incidunt.</td>
                                  </tr>
                                  <tr>
                                    <th scope="row" class="h3">2</th>
                                    <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores, incidunt.</td>
                                  </tr>
                                  <tr>
                                    <th scope="row" class="h3">3</th>
                                    <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores, incidunt.</td>
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"></div>
                      </div>
                </div>
                </div>
                {{$post->links()}}  
            </div>
                    
                            
                </div>
                <div class="sidebar-blog">
                    
            </div>
        </div>

        <footer class="">
            <div class="container-fluid bg-dark text-white footer-blog">
                <div class="row h-100">
                    <div class="col-6 d-flex flex-column align-items-center justify-content-center h-100">
                        <h1>Get In Touch</h1>
                        <h5>test@mail.com</h5>
                    </div>
                    <div class="col-6 d-flex flex-column align-items-center justify-content-center h-100">
                        <p>
                            I'd love to grab tea to talk about anything - from design and tech to esports and kpop. Shoot me an email and we can work something out.
                        </p>
                        <p class="small">Yogyakarta, Indonesia</p>
                    </div>
                </div>
            </div>
        </footer>
    
    @stack('addon-script')
    <!-- General JS Scripts -->
    <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('library/popper.js/dist/umd/popper.js') }}"></script>
    <script src="{{ asset('library/tooltip.js/dist/umd/tooltip.js') }}"></script>
    <script src="{{ asset('library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
    
    @stack('scripts')

    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>