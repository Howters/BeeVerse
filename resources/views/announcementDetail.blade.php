<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Announcement</title>
    {{-- @vite('resources/css/announcements-detail.css') --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/announcementsDetail.css') }}"> --}}
    <link rel="stylesheet" href="/css/announcementsDetail.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <x-navbar />
    <div class="blog-single gray-bg">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <article class="article">
                        <div class="article-img">
                            <img src="{{asset($announcement->image)}}" title="" alt="">
                        </div>
                        <a href="{{$announcement->links}}">{{$announcement->links}}</a>
                        <br>
                        <div class="article-title">
                            <h2>{{$announcement->title}}</h2>
                            <div class="media">
                                <div class="avatar mx-2">
                                    <img src="{{asset($announcement->ukm->logo)}}" title="" alt="">
                                </div>
                                <div class="media-body">
                                    <label>{{$announcement->ukm->short_name}}</label>
                                    <span>{{$announcement->created_at->toDateString()}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="article-content">
                            <p>{{$announcement->long_description}}</p>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 m-15 px-tb blog-aside">
                    <!-- Author -->
                    <div class="widget widget-author">
                        <div class="widget-title">
                            <h3>Author</h3>
                        </div>
                        <div class="widget-body">
                            <div class="media align-items-center">
                                <div class="avatar">
                                    <img src="{{asset($announcement->ukm->logo)}}" title="" alt="">
                                </div>
                                <div class="media-body">
                                    <h6>{{$announcement->ukm->short_name}}</h6>
                                </div>
                            </div>
                            <p class="long-name">{{$announcement->ukm->long_name}}</p>
                        </div>
                    </div>
                    <!-- End Author -->
                    <!-- Latest Post -->
                    <div class="widget widget-latest-post">
                        <div class="widget-title">
                            <h3>Latest Post</h3>
                        </div>
                        <div class="widget-body">
                            @forelse ($latest_announcements  as $announcement)
                            <div class="latest-post-aside media">
                                <div class="lpa-left media-body">
                                    <div class="lpa-title">
                                        <h5><a href="/announcement/{{$announcement->id}}">{{$announcement->title}}</a></h5>
                                    </div>
                                    <div class="lpa-meta">
                                        <a class="name" href="#">
                                            {{$announcement->ukm->short_name}}
                                        </a>
                                        <a class="date" href="#">
                                            {{$announcement->created_at->toDateString()}}
                                        </a>
                                    </div>
                                </div>
                                <div class="lpa-right">
                                    <a href="/announcement/{{$announcement->id}}">
                                        <img src="{{asset($announcement->image)}}" title="" alt="">
                                    </a>
                                </div>
                            </div>
                            @empty
                            <p>Empty</p>
                            @endforelse
                        </div>
                    </div>
                    <!-- End Latest Post -->
                </div>
            </div>
        </div>
    </div>

    <x-footer />
</body>

</html>
