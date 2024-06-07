<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    {{-- @vite('resources/css/products.css') --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/products.css') }}"> --}}
    <link rel="stylesheet" href="css/products.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <x-navbar />

        <!-- sidebar + content -->
        <section class="">
        <div class="container">
            <div class="row">
            <!-- sidebar -->
            {{-- <div class="col-lg-3">
                <!-- Toggle button -->
                <button
                        class="btn btn-outline-secondary mb-3 w-100 d-lg-none"
                        type="button"
                        data-mdb-toggle="collapse"
                        data-mdb-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                        >
                <span>Show filter</span>
                </button>
                <!-- Collapsible wrapper -->
                <div class="collapse card d-lg-block mb-5" id="navbarSupportedContent">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button
                                class="accordion-button text-dark bg-light"
                                type="button"
                                data-mdb-toggle="collapse"
                                data-mdb-target="#panelsStayOpen-collapseOne"
                                aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseOne"
                                >
                        Related items
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                        <div class="accordion-body">
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-dark">Electronics </a></li>
                            <li><a href="#" class="text-dark">Home items </a></li>
                            <li><a href="#" class="text-dark">Books, Magazines </a></li>
                            <li><a href="#" class="text-dark">Men's clothing </a></li>
                            <li><a href="#" class="text-dark">Interiors items </a></li>
                            <li><a href="#" class="text-dark">Underwears </a></li>
                            <li><a href="#" class="text-dark">Shoes for men </a></li>
                            <li><a href="#" class="text-dark">Accessories </a></li>
                        </ul>
                        </div>
                    </div>
                    </div>
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button
                                class="accordion-button text-dark bg-light"
                                type="button"
                                data-mdb-toggle="collapse"
                                data-mdb-target="#panelsStayOpen-collapseTwo"
                                aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseTwo"
                                >
                        Brands
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo">
                        <div class="accordion-body">
                        <div>
                            <!-- Checked checkbox -->
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1" checked />
                            <label class="form-check-label" for="flexCheckChecked1">Mercedes</label>
                            <span class="badge badge-secondary float-end">120</span>
                            </div>
                            <!-- Checked checkbox -->
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked2" checked />
                            <label class="form-check-label" for="flexCheckChecked2">Toyota</label>
                            <span class="badge badge-secondary float-end">15</span>
                            </div>
                            <!-- Checked checkbox -->
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked3" checked />
                            <label class="form-check-label" for="flexCheckChecked3">Mitsubishi</label>
                            <span class="badge badge-secondary float-end">35</span>
                            </div>
                            <!-- Checked checkbox -->
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked4" checked />
                            <label class="form-check-label" for="flexCheckChecked4">Nissan</label>
                            <span class="badge badge-secondary float-end">89</span>
                            </div>
                            <!-- Default checkbox -->
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">Honda</label>
                            <span class="badge badge-secondary float-end">30</span>
                            </div>
                            <!-- Default checkbox -->
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">Suzuki</label>
                            <span class="badge badge-secondary float-end">30</span>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button
                                class="accordion-button text-dark bg-light"
                                type="button"
                                data-mdb-toggle="collapse"
                                data-mdb-target="#panelsStayOpen-collapseThree"
                                aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseThree"
                                >
                        Price
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree">
                        <div class="accordion-body">
                        <div class="range">
                            <input type="range" class="form-range" id="customRange1" />
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                            <p class="mb-0">
                                Min
                            </p>
                            <div class="form-outline">
                                <input type="number" id="typeNumber" class="form-control" />
                                <label class="form-label" for="typeNumber">$0</label>
                            </div>
                            </div>
                            <div class="col-6">
                            <p class="mb-0">
                                Max
                            </p>
                            <div class="form-outline">
                                <input type="number" id="typeNumber" class="form-control" />
                                <label class="form-label" for="typeNumber">$1,0000</label>
                            </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-white w-100 border border-secondary">apply</button>
                        </div>
                    </div>
                    </div>
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button
                                class="accordion-button text-dark bg-light"
                                type="button"
                                data-mdb-toggle="collapse"
                                data-mdb-target="#panelsStayOpen-collapseFour"
                                aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseFour"
                                >
                        Size
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingThree">
                        <div class="accordion-body">
                        <input type="checkbox" class="btn-check border justify-content-center" id="btn-check1" checked autocomplete="off" />
                        <label class="btn btn-white mb-1 px-1" style="width: 60px;" for="btn-check1">XS</label>
                        <input type="checkbox" class="btn-check border justify-content-center" id="btn-check2" checked autocomplete="off" />
                        <label class="btn btn-white mb-1 px-1" style="width: 60px;" for="btn-check2">SM</label>
                        <input type="checkbox" class="btn-check border justify-content-center" id="btn-check3" checked autocomplete="off" />
                        <label class="btn btn-white mb-1 px-1" style="width: 60px;" for="btn-check3">LG</label>
                        <input type="checkbox" class="btn-check border justify-content-center" id="btn-check4" checked autocomplete="off" />
                        <label class="btn btn-white mb-1 px-1" style="width: 60px;" for="btn-check4">XXL</label>
                        </div>
                    </div>
                    </div>
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button
                                class="accordion-button text-dark bg-light"
                                type="button"
                                data-mdb-toggle="collapse"
                                data-mdb-target="#panelsStayOpen-collapseFive"
                                aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseFive"
                                >
                        Ratings
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingThree">
                        <div class="accordion-body">
                        <!-- Default checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked />
                            <label class="form-check-label" for="flexCheckDefault">
                            <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            </label>
                        </div>
                        <!-- Default checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked />
                            <label class="form-check-label" for="flexCheckDefault">
                            <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-secondary"></i>
                            </label>
                        </div>
                        <!-- Default checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked />
                            <label class="form-check-label" for="flexCheckDefault">
                            <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            </label>
                        </div>
                        <!-- Default checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked />
                            <label class="form-check-label" for="flexCheckDefault">
                            <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-secondary"></i><i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            </label>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div> --}}
            <!-- sidebar -->
            <!-- content -->
            <div class="col-lg-12">
                <div class="menu">
                    <div class="add">
                        <button class="btn btn-primary" type="button" style="visibility: hidden;">Add Product</button>
                    </div>
                    <div class=" wrapper add">
                        @if($user && $user->is_admin==1)
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Add Product</button>
                        @else
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" style="visibility: hidden;">Add Product</button>
                        @endif
                          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true" class="h3">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="addPopUp" id="addPopUp">
                                        <h1>Add Product</h1>
                                        <form action="/add-product" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="addPopUpInput">
                                                <div class="leftAddPopUp">
                                                    <div>
                                                        <label for="Ukm">UKM</label>
                                                        <select id="Ukm" name="Ukm">
                                                            <option value="">Select UKM</option>
                                                            @foreach($ukms as $ukm)
                                                                <option value="{{ $ukm->id }}">{{ $ukm->short_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span id="errorMessage1" style="color: red;"></span>
                                                    </div>
                                                    <div>
                                                        <label for="Image">Product Image</label>
                                                        <input type="file" id="Image" name="Image" value="{{ old('image') }}">
                                                        <span id="errorMessage2" style="color: red;"></span>
                                                    </div>
                                                    <div>
                                                        <label for="Name">Product Name</label>
                                                        <input type="text" name="Name" value="{{ old('name') }}">
                                                        <span id="errorMessage44" style="color: red;"></span>
                                                    </div>
                                                    <div>
                                                        <label for="Price">Product Price</label>
                                                        <input type="number" name="Price" value="{{ old('price') }}">
                                                        <span id="errorMessage4" style="color: red;"></span>
                                                    </div>
                                                    <div>
                                                        <label for="Stock">Product Stock</label>
                                                        <input type="number" name="Stock" value="{{ old('stock') }}">
                                                        <span id="errorMessage5" style="color: red;"></span>
                                                    </div>
                                                    <div>
                                                        <label for="ShortDescription">Short Description</label>
                                                        <textarea name="ShortDescription" id="ShortDescription" cols="15" rows="4">{{ old('short_description') }}</textarea>
                                                        <span id="errorMessage5" style="color: red;"></span>
                                                    </div>
                                                    <div>
                                                        <label for="LongDescription">Long Description</label>
                                                        <textarea name="LongDescription" id="LongDescription" cols="15" rows="8">{{ old('long_description') }}</textarea>
                                                        <span id="errorMessage6" style="color: red;"></span>
                                                    </div>
                                                    <div>
                                                        <label for="Color">Product Color</label>
                                                        <input type="text" name="Color" value="{{ old('color') }}">
                                                        <span id="errorMessage7" style="color: red;"></span>
                                                    </div>
                                                    <div>
                                                        <label for="Material">Product Material</label>
                                                        <input type="text" name="Material" value="{{ old('material') }}">
                                                        <span id="errorMessage8" style="color: red;"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="button">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                        <div class="overlay" id="overlay" onclick="closeAddPopUp()"></div>
                    </div>
                </div>
                <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
                    <form action="{{ url('/products') }}" method="GET">
                            <div class="input-group rounded">
                                <strong class="d-block py-2 " style="margin-right: 20px">{{$count}} Items found </strong>
                                <div class="form-outline" data-mdb-input-init>
                                <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                </div>
                                <span class="input-group-text border-0 mx-1" id="search-addon">
                                <i class="bi bi-search"></i>
                                </span>
                            <i class="bi bi-sort-numeric-down mx-2 sort-icon h3" data-sort="asc"></i>
                        <i class="bi bi-sort-numeric-up sort-icon h3" data-sort="desc"></i>
                            </div>
                    </form>
                <div class="ms-auto">

                    <select class="form-select d-inline-block w-auto border pt-1">
                    <option value="0">Best match</option>
                    <option value="1">Recommended</option>
                    <option value="2">High rated</option>
                    <option value="3">Randomly</option>
                    </select>
                    <div class="btn-group shadow-0 border">
                    <a href="#" class="btn btn-light" title="List view">
                        <i class="fa fa-bars fa-lg"></i>
                    </a>
                    <a href="#" class="btn btn-light active" title="Grid view">
                        <i class="fa fa-th fa-lg"></i>
                    </a>
                    </div>
                </div>
                </header>

                <div class="row container-custom">
                @forelse ($products  as $product)
                    <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                        <div class="card w-100 my-2 shadow-2-strong">
                            <a href="/product/{{$product->id}}"><img src="{{ asset($product->image) }}" class="card-img-top" /></a>
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex flex-column">
                                <div class="mb-2">
                                    <h4 class="mb-1 me-1 fw-bold">{{ \Illuminate\Support\Str::limit($product->name, 18) }}</h4>
                                </div>
                            <h5 class="mb-2 me-1 fw-bold  text-primary">Rp{{ number_format($product->price, 0, ',', '.') }}</h5>
                            {{-- <span class="text-danger"><s>$49.99</s></span> --}}
                            </div>
                            <p class="card-text" style="height:180px;">{{$product->short_description}}</p>
                            <div class="card-footer pt-3 px-2 pb-3">
                                <div class="widget-blog-author mb-1">
                                    <div class="widget-blog-author-image">
                                        <img src="{{asset($product->ukm->logo)}}" alt="">
                                    </div>
                                    <div class="widget-blog-author-info">
                                        <a href="/{{$product->ukm->short_name}}">{{$product->ukm->short_name}}</a>
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

                <hr />

                <!-- Pagination -->
                <div class="container-fluid mt-5 d-flex justify-content-center">
                    {{ $products->onEachSide(1)->render() }}
                </div>
                <!-- Pagination -->
            </div>
            </div>
        </div>
        </section>

    <x-footer />
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        $(document).ready(function() {
            function fetchProducts(query, sort) {
                $.ajax({
                    url: "{{ url('/products') }}",
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
                fetchProducts(query, sort);
            });

            $('.sort-icon').on('click', function() {
                sort = $(this).data('sort');
                var query = $('input[name="search"]').val();
                fetchProducts(query, sort);
            });
        });
</script>

</html>
