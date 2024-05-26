<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beeverse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/homepage.css')}}">
    <link rel="stylesheet" href="">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="gray-bg">
    <nav>
        <x-navbar />
    </nav>
    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/assets/201-1-binusacid.jpg" alt="Your Image Description" width="100%" height="100%">
            <div class="container">
              <div class="carousel-caption text-start">
                <h1>BNCC TechnoTalk II</h1>
                <p class="opacity-75">Ini adalah event teknologi bertema AI dari BNCC</p>
                <p><a class="btn btn-lg btn-primary" href="#">Sign up now</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%"/></svg>
            <div class="container">
              <div class="carousel-caption">
                <h1>Comserv 10 jam!</h1>
                <p>Cat trotoar bisa dapat comserv 10 jam dari tfi?</p>
                <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%"/></svg>
            <div class="container">
              <div class="carousel-caption text-end">
                <h1>HIMSHOT 2024</h1>
                <p>Event terbesar yang diselenggarakan oleh HIMTI.</p>
                <p><a class="btn btn-lg btn-primary" href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-primary-color)"/></svg>
            <div class="container">
              <div class="carousel-caption text-end">
                <h1>TechnoScape 2024</h1>
                <p>Seminar, Talkshow, Hackathon. Event terbesar dari BNCC</p>
                <p><a class="btn btn-lg btn-primary" href="#">Join sekarang</a></p>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

    <div class="container mt-5">
            <div class="card-body">
                <h2 class="text-center mb-4">List UKM</h2>
                <hr class="mb-4">
                <div class="d-flex flex-wrap justify-content-evenly">
                    @forelse ($ukms  as $ukm)
                    <div class="card card-custom bg-white border-white border-0 mb-5 mt-2 mx-2">
                        <div class="card-custom-img" style="background-image: url('{{ asset($ukm->banner) }}')"></div>
                        <div class="card-custom-avatar">
                          <img class="img-fluid" src="{{ asset($ukm->logo) }}" alt="Avatar" />
                        </div>
                        <div class="card-body" style="overflow-y: auto">
                          <h4 class="card-title fw-bold">{{$ukm->short_name}}</h4>
                          <p class="card-text">{{$ukm->short_description}}</p>
                        </div>
                        <div class="card-footer" style="background: inherit; border-color: inherit;">
                          <a href="/{{$ukm->short_name}}" class="btn btn-lg btn-primary">Detail</a>
                        </div>
                        <div class="updateDeleteButton buttons-container mb-5">
                            <button type="button" class="edit-btn btn"><a href="/edit-movie/{{$ukm->id}}"><i class="bi bi-pencil-fill"></i></a></button>
                            <button type="button" class="delete-btn btn"><a onclick="openModal({{$ukm->id}})" style="color: red;"><i data-feather="trash-2"></i></a></button>
                        </div>
                      </div>
                    @empty
                        <h5 class="mx-4 mt-3">Empty</h5>
                    @endforelse
                </div>
                    <hr class="mb-4">
                <div class="container-fluid mt-5 d-flex justify-content-center">
                    {{ $ukms->onEachSide(1)->render() }}
                </div>
            </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{asset('js/homepage.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/homepage.css')}}">

    <x-footer />
</body>

</html>
