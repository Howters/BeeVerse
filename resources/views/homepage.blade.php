<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beeverse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{asset('css/homepage.css')}}"> --}}
    <link rel="stylesheet" href="css/homepage.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
            <img src="/assets/BTT.jpg" alt="Your Image Description" width="100%" height="100%">
            {{-- <div class="container">
              <div class="carousel-caption text-start">
                <h1>BNCC TechnoTalk II</h1>
                <p class="opacity-75">Ini adalah event teknologi bertema AI dari BNCC</p>
                <p><a class="btn btn-lg btn-primary" href="#">Sign up now</a></p>
              </div>
            </div> --}}
          </div>
          <div class="carousel-item">
            <img src="/assets/hq720.jpg" alt="Your Image Description" width="100%" height="100%">
          </div>
          <div class="carousel-item">
            <img src="/assets/bnec-poster.png" alt="Your Image Description" width="100%" height="100%">
            {{-- <div class="container">
              <div class="carousel-caption text-end">
                <h1>HIMSHOT 2024</h1>
                <p>Event terbesar yang diselenggarakan oleh HIMTI.</p>
                <p><a class="btn btn-lg btn-primary" href="#">Learn More</a></p>
              </div>
            </div> --}}
          </div>
          <div class="carousel-item">
            <img src="/assets/himmat.png" alt="Your Image Description" width="100%" height="100%">
            {{-- <div class="container">
              <div class="carousel-caption text-end">
                <h1>TechnoScape 2024</h1>
                <p>Seminar, Talkshow, Hackathon. Event terbesar dari BNCC</p>
                <p><a class="btn btn-lg btn-primary" href="#">Join sekarang</a></p>
              </div>
            </div> --}}
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
            <form action="{{ url('/') }}" method="GET">
                <div class="input-group rounded mb-2">
                    <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                        <button type="submit" style="background: none; border: none;"><i class="bi bi-search"></i></button>
                    </span>
                    </div>

                        <i class="bi bi-sort-alpha-down mx-2 sort-icon h3" data-sort="asc"></i>
                        <i class="bi bi-sort-alpha-up sort-icon h3" data-sort="desc"></i>

            </form>
            <div class="container-custom">
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
                    <div class="card-footer mb-5" style="background: inherit; border-color: inherit;">
                      <a href="/{{$ukm->short_name}}" class="btn btn-lg btn-primary">Detail</a>
                    </div>
                  </div>
                @empty
                    <h5 class="mx-4 mt-3">Not Found</h5>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        $(document).ready(function() {
            function fetchUKMs(query, sort) {
                $.ajax({
                    url: "{{ url('/') }}",
                    type: "GET",
                    data: { search: query, sort: sort },
                    success: function(data) {
                        $('.container-custom').html($(data).find('.container-custom').html());
                    }
                });
            }

            var sort = 'asc';

            $('input[name="search"]').on('keyup', function() {
                var query = $(this).val();
                fetchUKMs(query, sort);
            });

            $('.sort-icon').on('click', function() {
                sort = $(this).data('sort');
                var query = $('input[name="search"]').val();
                fetchUKMs(query, sort);
            });
        });
</script>

</html>
