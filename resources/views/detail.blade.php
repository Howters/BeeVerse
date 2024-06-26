<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384 EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- @vite('resources/css/detail.css') --}}

    {{-- <link rel="stylesheet" href="{{ asset('css/detail.css') }}> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/detail.css') }}"> --}}
    <link rel="stylesheet" href="css/detail.css">


    <style>

    </style>
</head>

<body style="background-color: #ffffff">
    <nav>
        <x-navbar />
    </nav>
    <div class="container mt-5">
        <div class="card" style="background-color: #ffffff;">
            <div class="card-body row">
                <div class="col-md-12 px-5">
                    {{-- <h3 class="mb-3">{{ $movie->Title }}</h3> --}}
                    <h1 class="mb-3 fw-bold text-center">{{$ukm->short_name}}</h1>
                    <hr>
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-lg-4 mb-5 mb-lg-0 wow fadeIn">
                            <div class="card border-0 shadow">
                                <img src="{{asset($ukm->logo)}}">
                                <div class="card-body p-1-9 p-xl-4">
                                    <div class="mb-4">
                                        <h5 class="text-primary">{{$ukm->long_name}}</h5>
                                    </div>
                                    <ul class="list-unstyled mb-4">
                                        <li class="mb-3"><a href="#!"><i class="bi bi-envelope display-25 me-3 text-secondary"></i>{{$ukm->email}}</a></li>
                                        <li class="mb-3"><a href="#!"><i class="bi bi-phone display-25 me-3 text-secondary"></i>{{$ukm->phone}}</a></li>
                                        <li><a href="#!"><i class="bi bi-pin display-25 me-3 text-secondary"></i>{{$ukm->address}}</a></li>
                                    </ul>
                                    <ul class="list-unstyled social-icon-style2 ps-0">
                                        <li><a href="{{$ukm->instagram}}" class="rounded-3"><i class="bi bi-instagram"></i></a></li>
                                        <li><a href="{{$ukm->youtube}}" class="rounded-3"><i class="bi bi-youtube"></i></a></li>
                                        <li><a href="{{$ukm->linkedin}}" class="rounded-3"><i class="bi bi-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card border-0 shadow mt-2 px-2 py-2">
                                <div class="">
                                    <div class="body widget">
                                        <h4>Tags</h4>
                                        <ul class="list-unstyled categories-clouds m-b-0">
                                            @foreach($ukm->tags as $tag)
                                                <li><a class="card-title fw-bold">{{$tag->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-8">
                            <div class="ps-lg-1-6 ps-xl-5">
                                <div class="mb-5 wow fadeIn">
                                    <div class="text-start mb-1-6 wow fadeIn">
                                        <h2 class="h1 mb-0 text-primary">#About Us</h2>
                                    </div>
                                    <p>{{$ukm->about_us}}</p>
                                </div>
                                <div class="mb-5 wow fadeIn">
                                    <div class="text-start mb-1-6 wow fadeIn">
                                        <h2 class="mb-0 text-primary">#Vision</h2>
                                    </div>
                                    <p>{{$ukm->vision}}</p>
                                </div>
                                <div class="mb-5 wow fadeIn">
                                    <div class="text-start mb-1-6 wow fadeIn">
                                        <h2 class="mb-0 text-primary">#Mission</h2>
                                    </div>
                                    <p>{{$ukm->mission}}</p>
                                </div>
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Announcements</button>
                                      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Products</button>
                                    </div>
                                  </nav>
                                  <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        @forelse ($announcements  as $announcement)
                                        <div class="card box-shadow h-md-250 mb-4 mt-2">
                                            <div class="row g-0">
                                                <div class="col-md-8 d-flex flex-column justify-content-between p-4">
                                                    <div>
                                                        <strong class="d-inline-block mb-2 text-primary">{{$announcement->ukm->short_name}}</strong>
                                                        <h3 class="mb-0">
                                                            <a class="text-dark" href="/announcement/{{$announcement->id}}">{{$announcement->title}}</a>
                                                        </h3>
                                                        <br>
                                                        <div class="mb-1 text-muted">{{$announcement->created_at->toDateString()}}</div>
                                                        <p class="card-text mb-auto">{{$announcement->short_description}}.</p>
                                                    </div>
                                                    <a href="/announcement/{{$announcement->id}}">Continue reading</a>
                                                </div>
                                                <div class="col-md-4 d-md-flex align-items-center justify-content-end">
                                                    <a href="/announcement/{{$announcement->id}}"><img src="{{ asset($announcement->image) }}" class="img-fluid img-fixed" alt="Card image cap"></a>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <p>Empty</p>
                                        @endforelse
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="row">
                                            @forelse ($products  as $product)
                                                <div class="col-lg-5 col-md-6 col-sm-6 d-flex">
                                                    <div class="card w-100 my-2 shadow-2-strong">
                                                        <a href="/product/{{$product->id}}"><img src="{{ asset($product->image) }}" class="card-img-top" /></a>
                                                    <div class="card-body d-flex flex-column">
                                                        <div class="d-flex flex-row">
                                                        <h4 class="mb-1 me-1 fw-bold">Rp{{ number_format($product->price, 0, ',', '.') }}</h4>
                                                        {{-- <span class="text-danger"><s>$49.99</s></span> --}}
                                                        </div>
                                                        <p class="card-text">{{$product->short_description}}</p>
                                                        <div class="card-footer pt-3 px-2 pb-3">
                                                            <div class="widget-blog-author mb-1">
                                                                <div class="widget-blog-author-image">
                                                                    <img src="{{asset($product->ukm->logo)}}" alt="">
                                                                </div>
                                                                <div class="widget-blog-author-info">
                                                                    <a href="">{{$product->ukm->short_name}}</a>
                                                                </div>
                                                            </div>
                                                        <a href="/product/{{$product->id}}"class="btn btn-primary shadow-0 me-1">Detail</a>
                                                        {{-- <a href="#!" class="btn btn-light border icon-hover px-2 pt-2"><i class="bi bi-heart-fill"></i></a> --}}
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <h1>Empty</h1>
                                            @endforelse
                                            </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <x-footer />
</body>

</html>
