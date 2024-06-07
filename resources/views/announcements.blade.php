<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Announcement</title>
    {{-- @vite('resources/css/announcements.css') --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/announcements.css') }}"> --}}
    <link rel="stylesheet" href="css/announcements.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <x-navbar />
    <div class="container mt-4">
        <h2 class="text-center mb-4">Announcement</h2>
        <hr>
        <div class="menu">
            <!-- Example single danger button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Select UKM
                    </button>
                    <ul class="dropdown-menu" id="ukm-dropdown">
                        <li><a class="dropdown-item" href="#" data-ukm-id="">All</a></li>
                        @foreach ($ukms as $ukm)
                            <li><a class="dropdown-item" href="#" data-ukm-id="{{ $ukm->id }}">{{ $ukm->short_name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            <div class="add">
                <button class="btn btn-primary" type="button" style="visibility: hidden;">Add Announcement</button>
            </div>
            <div class="wrapper add">
                @if($user && $user->is_admin==1)
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Add Announcement</button>
                @else
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" style="visibility: hidden;">Add Announcement</button>
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
                                <h1>Add Announcement</h1>
                                <form action="/add-announcement" method="POST" enctype="multipart/form-data">
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
                                                <label for="Title">Announcement Title</label>
                                                <input type="text" name="Title" value="{{ old('title') }}">
                                                <span id="errorMessage4" style="color: red;"></span>
                                            </div>
                                            <div>
                                                <label for="Image">Announcement Image</label>
                                                <input type="file" id="Image" name="Image" value="{{ old('image') }}">
                                                <span id="errorMessage2" style="color: red;"></span>
                                            </div>
                                            <div>
                                                <label for="Link">Announcement Link</label>
                                                <input type="text" name="Link" value="{{ old('links') }}">
                                                <span id="errorMessage3" style="color: red;"></span>
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
        <!-- Example single danger button -->

        <div id="announcements-container">
            @forelse ($announcements as $announcement)
                <div class="card box-shadow h-md-250 mb-4">
                    <div class="row g-0">
                        <div class="col-md-8 d-flex flex-column justify-content-between p-4">
                            <div>
                                <strong class="d-inline-block mb-2 text-primary">{{ $announcement->ukm->short_name }}</strong>
                                <h3 class="mb-0">
                                    <a class="text-dark" href="/announcement/{{ $announcement->id }}">{{ $announcement->title }}</a>
                                </h3>
                                <br>
                                <div class="mb-1 text-muted">{{ $announcement->created_at->toDateString() }}</div>
                                <p class="card-text mb-auto">{{ $announcement->short_description }}</p>
                            </div>
                            <a href="/announcement/{{ $announcement->id }}">Continue reading</a>
                        </div>
                        <div class="col-md-4 d-md-flex align-items-center justify-content-end">
                            <img src="{{ asset($announcement->image) }}" class="img-fluid img-fixed" alt="Card image cap">
                        </div>
                    </div>
                </div>
            @empty
                <h5 class="mx-4 mt-3">No announcements found for this UKM.</h5>
            @endforelse
        </div>

    </div>

    <x-footer />
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    $('#ukm-dropdown').on('click', '.dropdown-item', function(event) {
        event.preventDefault();
        var ukmId = $(this).data('ukm-id');

        // Make an AJAX request to fetch announcements for the selected UKM
        $.ajax({
            url: "{{ url('/announcements') }}", // This should be the URL that returns the filtered announcements
            type: "GET",
            data: { ukm_id: ukmId },
            success: function(data) {
                // Update the announcements container with the new announcements
                $('#announcements-container').html($(data).find('#announcements-container').html());
            }
        });
    });
});

</script>
</html>
