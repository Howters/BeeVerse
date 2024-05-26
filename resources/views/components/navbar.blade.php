<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Plus+Jakarta+Sans:wght@400;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* body,html{
                overflow-x: hidden
        } */
        .container-navbar {
            display: flex;
            padding: 1em;
            justify-content: space-between;
            align-items: center;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: white;
            border: 1px solid rgb(247, 233, 233);

        }
        .container-navbar .links {
            display: flex;
            gap: 10em;
            padding: 1em;
            align-items: center;
        }

        .container-navbar .links ul {
            display: flex;
            list-style-type: none;
            gap: 2em;
            margin: 0;
        }

        .container-navbar .links ul li a {
            text-decoration: none;
            color: inherit;
            font-size: 1.2em;
        }

        .container-navbar .buttons {
            display: flex;
            gap: 1.2em;
        }

        .container-navbar .buttons button {
            padding: .5em 1.2em;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 1.2em;
        }

        .container-navbar .buttons button a {
            text-decoration: none;
            color: inherit
        }

        .container-navbar .buttons button:hover {
            cursor: pointer;
        }

        .container-navbar .buttons .login,

        .container-navbar .buttons .register {
            background-color: #0d6efd;
            color: #ffffff;
        }

        .container-navbar i {
            font-size: 2em;
            display: none;
        }

        .container-navbar .links .buttons .dropdown-menu-logout {
            position: absolute;
            border: 1px solid grey;
            display: none;
            background-color: whitesmoke;
            padding: .5em;
            border-radius: 10px;
            right: 0;
        }

        .container-navbar .links .buttons .dropdown-menu-logout.show{
            display: block;
        }

        .container-navbar .links.show {
            transform: translateX(0);
            transition: .3s;
        }

        .container-footer {
            background-color: #B9B08D;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3em 2em;
            gap: 1em;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .container-footer .icon-links {
            display: flex;
            gap: 1em;
            justify-content: center;
        }

        .container-footer .icon-links a img {
            width: 3em;
            height: 3em;
        }

        .container-footer hr {
            border: 1px solid black;
            width: 50em;
        }

        .container-footer p {
            font-size: 1em;
        }

        .container-footer p span {
            font-weight: bold;
        }
        .container-navbar h1{
            display: block;
            font-size: 2em;
            margin-top: 0.67em;
            margin-bottom: 0.67em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        .logo {
            text-decoration: none;
            color: #0d6efd;
        }

        @media screen and (max-width: 1024px) {
            .container-navbar h1 {
                font-size: 1.4em;
            }

            .container-navbar .links {
                gap: 5em;
            }

            .container-navbar .links {
                font-size: .8em;
            }

            .container-navbar h1{
            display: block;
            font-size: 2em;
            margin-top: 0.67em;
            margin-bottom: 0.67em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

            .container-footer .icon-links a img {
                width: 2em;
                height: 2em;
            }

            .container-footer p {
                font-size: 0.8em;
            }
        }

        @media screen and (max-width: 768px) {
            body,html{
                overflow-x: hidden
            }
            .container-navbar .links {
                gap: 2em;
                flex-direction: column;
                position: absolute;
                top: 0;
                right: 0;
                margin-top: 5em;
                width: 100vw;
                background-color: whitesmoke;
                align-items: start;
                transform: translateX(100%);
                transition: .3s;
                height: 20em;
                z-index: 10;
            }


            .container-navbar .links .buttons .dropdown-menu-logout{
                position: relative;
                display: block;
                padding: 0;
                border: none;
                /* margin-top: 1em; */
                transform: translateX(20%)
            }

            .container-navbar .links ul {
                flex-direction: column;
                /* border: 2px solid red; */
            }

            .container-navbar .links {
                font-size: .8em;
            }

            .container-navbar i {
                display: block;
            }

            .container-navbar .buttons {
                flex-direction: column;
            }

            .container-footer .icon-links a img {
                width: 1.5em;
                height: 1.5em;
            }

            .container-footer p {
                font-size: 0.7em;
            }
        }
    </style>
</head>
<body>
    <div class="container-navbar">
        <h1><a href="/" class="logo mx-2">BeeVerse</a></h1>
        <div class="links">
            <ul>
                @if(Auth::user() && Auth::user()->is_admin === 1)
                    <li><a href="{{route('admin.panel')}}">Admin Panel</a></li>
                @endif

                <li><a href="/">Home</a></li>
                <li><a href="/announcements">Announcements</a></li>
                <li><a href="/products">Products</a></li>
                @if (Auth::user())
                    <li><a href="/order-list">Orders</a></li>
                @endif
            </ul>
            <div class="buttons">
                @if (Auth::user())
                    <div class="dropdown">
                        <button class="usernames btn-primary btn"><a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                {{Auth::user()->first_name}}</a></button>
                        <ul class="dropdown-menu-logout">
                            <form action="/logout" method="POST">
                                @csrf
                                <li><button type="submit" class="dropdown-item" href="#">Log Out</button></li>
                            </form>
                        </ul>
                    </div>
                @else
                    <button class="btn btn-lg btn-primary"><a href="/login">Login</a></button>
                    <button class="btn btn-lg btn-light border"><a href="/register">Register</a></button>
                @endif
            </div>
        </div>
        <i class="fa fa-bars" id="hamburgerIcon"></i>
    </div>
</body>
<script>
    const hamburgerBars = document.getElementById('hamburgerIcon');
        const links = document.querySelector('.container-navbar .links');

        hamburgerBars.addEventListener('click', () => {
            links.classList.toggle('show')
        })

        const dropdownBTN = document.querySelector('.container-navbar .usernames')
        const dropdownMenu = document.querySelector('.container-navbar .links .buttons .dropdown-menu-logout')

        dropdownBTN.addEventListener('click', ()=>{
            dropdownMenu.classList.toggle('show')
        })
</script>
</html>
