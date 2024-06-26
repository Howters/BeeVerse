<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/adminPanel.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <nav>
            <x-navbar />
        </nav>

        <div class="container mt-5">
            <div class="card justify-content-center" style="background-color: #f8f8f8; width: 100%">
                <div class="card-body">
                    <div class="menu">
                        <div class="add">
                            <button class="btn btn-primary" type="button" style="visibility: hidden;">Add UKM</button>
                        </div>
                        <div class=" wrapper add">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter1">Add Tag</button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Add UKM</button>
                            <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="h3">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="addPopUp" id="addPopUp">
                                            <h1>Add Tag</h1>
                                            <form action="/add-tag" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="addPopUpInput">
                                                    <div class="leftAddPopUp">
                                                        <div>
                                                            <label for="Name">Tag Name</label>
                                                            <input type="text" name="Name" value="{{ old('short_name') }}">
                                                            <span id="errorMessage3" style="color: red;"></span>
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
                                            <h1>Add UKM</h1>
                                            <form action="/add-ukm" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="addPopUpInput">
                                                    <div class="leftAddPopUp">
                                                        <div>
                                                            <label for="Logo">Logo</label>
                                                            <input type="file" id="Logo" name="Logo" value="{{ old('logo') }}">
                                                            <span id="errorMessage1" style="color: red;"></span>
                                                        </div>
                                                        <div>
                                                            <label for="Banner">Banner</label>
                                                            <input type="file" id="Banner" name="Banner" value="{{ old('banner') }}">
                                                            <span id="errorMessage2" style="color: red;"></span>
                                                        </div>
                                                        <div>
                                                            <label for="ShortName">Short Name</label>
                                                            <input type="text" name="ShortName" value="{{ old('short_name') }}">
                                                            <span id="errorMessage3" style="color: red;"></span>
                                                        </div>
                                                        <div>
                                                            <label for="LongName">Long Name</label>
                                                            <input type="text" name="LongName" value="{{ old('long_name') }}">
                                                            <span id="errorMessage4" style="color: red;"></span>
                                                        </div>
                                                        <div>
                                                            <label for="tags">Tags</label>
                                                            @foreach($tags as $tag)
                                                                <div class="form-checks">
                                                                    <label class="form-check-label"><input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag-{{ $tag }}">
                                                                        {{ $tag->name }}
                                                                    </label>
                                                                </div>
                                                            @endforeach

                                                            <span id="errorMessage4" style="color: red;"></span>
                                                        </div>
                                                        <div>
                                                            <label for="ShortDescription">Short Description</label>
                                                            <textarea name="ShortDescription" id="ShortDescription" cols="15" rows="4">{{ old('short_description') }}</textarea>
                                                            <span id="errorMessage5" style="color: red;"></span>
                                                        </div>
                                                        <div>
                                                            <label for="AboutUs">About Us</label>
                                                            <textarea name="AboutUs" id="AboutUs" cols="15" rows="4">{{ old('about_us') }}</textarea>
                                                            <span id="errorMessage6" style="color: red;"></span>
                                                        </div>
                                                        <div>
                                                            <label for="Vision">Vision</label>
                                                            <textarea name="Vision" id="Vision" cols="15" rows="4">{{ old('vision') }}</textarea>
                                                            <span id="errorMessage7" style="color: red;"></span>
                                                        </div>
                                                        <div>
                                                            <label for="Mission">Mission</label>
                                                            <textarea name="Mission" id="Mission" cols="15" rows="4">{{ old('mission') }}</textarea>
                                                            <span id="errorMessage8" style="color: red;"></span>
                                                        </div>
                                                        <div>
                                                            <label for="Email">Email</label>
                                                            <input type="email" name="Email" value="{{ old('email') }}">
                                                            <span id="errorMessage9" style="color: red;"></span>
                                                        </div>
                                                        <div>
                                                            <label for="Phone">Phone</label>
                                                            <input type="text" name="Phone" value="{{ old('phone') }}">
                                                            <span id="errorMessage10" style="color: red;"></span>
                                                        </div>
                                                        <div>
                                                            <label for="Address">Address</label>
                                                            <input type="text" name="Address" value="{{ old('address') }}">
                                                            <span id="errorMessage11" style="color: red;"></span>
                                                        </div>
                                                        <div>
                                                            <label for="Instagram">Instagram</label>
                                                            <input type="text" name="Instagram" value="{{ old('instagram') }}">
                                                            <span id="errorMessage12" style="color: red;"></span>
                                                        </div>
                                                        <div>
                                                            <label for="LinkedIn">LinkedIn</label>
                                                            <input type="text" name="LinkedIn" value="{{ old('linkedin') }}">
                                                            <span id="errorMessage13" style="color: red;"></span>
                                                        </div>
                                                        <div>
                                                            <label for="Youtube">Youtube</label>
                                                            <input type="text" name="Youtube" value="{{ old('youtube') }}">
                                                            <span id="errorMessage14" style="color: red;"></span>
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
                                            <button type="button" class="edit-btn btn" data-bs-toggle="modal" data-bs-target="#editModal{{$ukm->id}}"><i class="bi bi-pencil-fill" style="color: blue"></i></button>
                                            <div class="menu">
                                                <div class="wrapper add">
                                                    <div class="modal fade" id="editModal{{$ukm->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true" class="h3">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <div class="addPopUp" id="addPopUp">
                                                                    <h1>Edit UKM</h1>
                                                                    <form action="/update-ukm/{{$ukm->id}}" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('patch')
                                                                        <div class="addPopUpInput update">
                                                                            <div class="leftAddPopUp">
                                                                                <div>
                                                                                    <label for="Logo">Logo</label>
                                                                                    @if ($ukm->logo)
                                                                                        <div>
                                                                                            <img src="{{ asset($ukm->logo) }}" alt="Current Logo" style="width: 100px; height: auto;">
                                                                                        </div>
                                                                                    @endif
                                                                                    <input type="file" id="Logo" name="Logo" value="{{ $ukm->logo }}">
                                                                                    <span id="errorMessage1" style="color: red;"></span>
                                                                                </div>
                                                                                <div>
                                                                                    <label for="Banner">Banner</label>
                                                                                    @if ($ukm->banner)
                                                                                    <div>
                                                                                        <img src="{{ asset($ukm->banner) }}" alt="Current Banner" style="width: 500px; height: auto;">
                                                                                    </div>
                                                                                    @endif
                                                                                    <input type="file" id="Banner" name="Banner" value="{{ $ukm->banner }}">
                                                                                    <span id="errorMessage2" style="color: red;"></span>
                                                                                </div>
                                                                                <div>
                                                                                    <label for="ShortName">Short Name</label>
                                                                                    <input type="text" name="ShortName" value="{{ $ukm->short_name }}">
                                                                                    <span id="errorMessage3" style="color: red;"></span>
                                                                                </div>
                                                                                <div>
                                                                                    <label for="LongName">Long Name</label>
                                                                                    <input type="text" name="LongName" value="{{ $ukm->long_name }}">
                                                                                    <span id="errorMessage4" style="color: red;"></span>
                                                                                </div>
                                                                                <div>
                                                                                    <label for="tags">Tags</label>
                                                                                    @foreach($tags as $tag)
                                                                                        <div class="form-checks">
                                                                                            <label class="form-check-label">
                                                                                                <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag-{{ $tag->id }}"
                                                                                                    @if($ukm->tags->contains($tag->id))  checked @endif>
                                                                                                {{ $tag->name }}
                                                                                            </label>
                                                                                        </div>
                                                                                    @endforeach

                                                                                    <span id="errorMessage4" style="color: red;"></span>
                                                                                </div>
                                                                                <div>
                                                                                    <label for="ShortDescription">Short Description</label>
                                                                                    <textarea name="ShortDescription" id="ShortDescription" cols="15" rows="4">{{ $ukm->short_description }}</textarea>
                                                                                    <span id="errorMessage5" style="color: red;"></span>
                                                                                </div>
                                                                                <div>
                                                                                    <label for="AboutUs">About Us</label>
                                                                                    <textarea name="AboutUs" id="AboutUs" cols="15" rows="4">{{ $ukm->about_us }}</textarea>
                                                                                    <span id="errorMessage6" style="color: red;"></span>
                                                                                </div>
                                                                                <div>
                                                                                    <label for="Vision">Vision</label>
                                                                                    <textarea name="Vision" id="Vision" cols="15" rows="4">{{ $ukm->vision }}</textarea>
                                                                                    <span id="errorMessage7" style="color: red;"></span>
                                                                                </div>
                                                                                <div>
                                                                                    <label for="Mission">Mission</label>
                                                                                    <textarea name="Mission" id="Mission" cols="15" rows="4">{{ $ukm->mission }}</textarea>
                                                                                    <span id="errorMessage8" style="color: red;"></span>
                                                                                </div>
                                                                                <div>
                                                                                    <label for="Email">Email</label>
                                                                                    <input type="email" name="Email" value="{{ $ukm->email }}">
                                                                                    <span id="errorMessage9" style="color: red;"></span>
                                                                                </div>
                                                                                <div>
                                                                                    <label for="Phone">Phone</label>
                                                                                    <input type="text" name="Phone" value="{{ $ukm->phone }}">
                                                                                    <span id="errorMessage10" style="color: red;"></span>
                                                                                </div>
                                                                                <div>
                                                                                    <label for="Address">Address</label>
                                                                                    <input type="text" name="Address" value="{{ $ukm->address }}">
                                                                                    <span id="errorMessage11" style="color: red;"></span>
                                                                                </div>
                                                                                <div>
                                                                                    <label for="Instagram">Instagram</label>
                                                                                    <input type="text" name="Instagram" value="{{ $ukm->instagram }}">
                                                                                    <span id="errorMessage12" style="color: red;"></span>
                                                                                </div>
                                                                                <div>
                                                                                    <label for="LinkedIn">LinkedIn</label>
                                                                                    <input type="text" name="LinkedIn" value="{{ $ukm->linkedin }}">
                                                                                    <span id="errorMessage13" style="color: red;"></span>
                                                                                </div>
                                                                                <div>
                                                                                    <label for="Youtube">Youtube</label>
                                                                                    <input type="text" name="Youtube" value="{{ $ukm->youtube }}">
                                                                                    <span id="errorMessage14" style="color: red;"></span>
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
                    <div class="container mt-5 d-flex justify-content-center">
                        {{ $ukms->render() }}
                    </div>
                </div>
            </div>
        </div>

    <div class="delete-popup">
        <div class="delete-container">
            <h1>CONFIRMATION</h1>
            <div class="contents">
                <p>Are you sure? <br>Because this action is <span>irreversible</span></p>
                <div class="buttons">
                    <button class="cancel" onclick="closePopupDel()">Cancel</button>
                    <form action="" method="POST">
                        @csrf
                        @method('delete')
                        <button class="delete">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <x-footer />
    </div>
    <script>
        feather.replace()
    </script>
    <script src="js/adminPanel.js"></script>
</body>

</html>
