<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .container-navbar {
            /* border: 2px solid red; */
            display: flex;
            padding: 1em;
            justify-content: space-between;
            align-items: center;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .container-navbar .links {
            /* border: 2px solid red; */
            display: flex;
            gap: 10em;
            padding: 1em;
            align-items: center;
        }

        .container-navbar .links ul {
            display: flex;
            list-style-type: none;
            gap: 2em;
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
        .container-navbar .buttons .username {
            background-color: #192630;
            color: #F8CB68;
        }

        .container-navbar .buttons .register {
            background-color: #F8CB68;
            color: #192630;
        }

        .container-navbar i {
            font-size: 2em;
            display: none;
        }

        .container-navbar .links .buttons .dropdown-menu {
            position: absolute;
            border: 1px solid grey;
            display: none;
            background-color: whitesmoke;
            padding: .5em;
            border-radius: 10px
        }

        .container-navbar .links .buttons .dropdown-menu.show{
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

            .container-footer .icon-links a img {
                width: 2em;
                height: 2em;
            }

            .container-footer p {
                font-size: 0.8em;
            }
        }

        @media screen and (max-width: 768px) {
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
            }

            .container-navbar .buttons .username{
                display: none;
            }

            .container-navbar .links .buttons .dropdown-menu{
                display: block;
                padding: 0;
                border: none;
                margin-top: 1em;
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
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          <p class="col-md-4 mb-0 text-muted">Made with <i class="bi bi-heart-fill"></i> by BeeVerse</p>

          <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
          </a>

          <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="/announcements" class="nav-link px-2 text-muted">Announcement</a></li>
            <li class="nav-item"><a href="/products" class="nav-link px-2 text-muted">Products</a></li>
          </ul>
        </footer>
      </div>
      <div class="b-example-divider"></div>
</body>
<script>
    const hamburgerBars = document.getElementById('hamburgerIcon');
        const links = document.querySelector('.container-navbar .links');

        hamburgerBars.addEventListener('click', () => {
            links.classList.toggle('show')
        })

        const dropdownBTN = document.querySelector('.container-navbar .username')
        const dropdownMenu = document.querySelector('.container-navbar .links .buttons .dropdown-menu')

        dropdownBTN.addEventListener('click', ()=>{
            dropdownMenu.classList.toggle('show')
        })
</script>
</html>
