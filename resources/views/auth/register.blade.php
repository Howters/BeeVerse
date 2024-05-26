<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{asset('css/register.css')}}"> --}}
    <link rel="stylesheet" href="css/register.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <x-navbar />
  <div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image" style="background-image: url('{{asset('assets/Binus-Image-1.jpg')}}')">
            </div>
            <div class="col-md-6 right">
                <form id="registrationForm" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-box">
                        <header>Create an account</header>
                        <div class="input-field">
                            <input type="text" class="input" id="email" name="email" required="" autocomplete="off"  value="{{ old('email') }}">
                            <label for="email">Email</label>
                            <span id="emailError" class="error"></span>
                            @error('email')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-field">
                            <input type="text" class="input" id="FirstName" name="first_name" required="" autocomplete="off" value="{{ old('first_name') }}">
                            <label for="fName">First Name</label>
                            <span id="firstNameError" class="error"></span>
                        </div>
                        <div class="input-field">
                            <input type="text" class="input" id="LastName" name="last_name" required="" autocomplete="off" value="{{ old('last_name') }}">
                            <label for="lName">Last Name</label>
                            <span id="lastNameError" class="error"></span>
                        </div>
                        <div class="input-field">
                            <input type="number" class="input" id="PhoneNumber" name="phone_number" required="" autocomplete="off" value="{{ old('phone_number') }}">
                            <label for="email">Phone number</label>
                            <span id="phoneNumberError" class="error"></span>
                        </div>
                        <div class="input-field">
                            <input type="text" class="input" id="Address" name="address" required="" autocomplete="off" value="{{ old('address') }}">
                            <label for="email">Address</label>
                            <span id="addressError" class="error"></span>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input" id="pass" name="password" required="" oninput="validatePassword()">
                            <label for="pass">Password</label>
                            <span id="passwordError" class="error"></span>
                        </div>
                        <div class="input-field submission">
                            <input type="submit" class="submit" value="Register" onclick="validateForm(event)">
                        </div>
                        <div class="signin">
                            <span>Own an account? <a href="{{ route('login') }}">Login</a></span>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<x-footer />
</body>
<script src="/js/register.js"></script>
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

        const submitBTN = document.querySelector('.container-about-us .contacts .inputs button')
        const nameInput = document.querySelector('.container-about-us .contacts .inputs .name input')
        const emailInput = document.querySelector('.container-about-us .contacts .inputs .email input')
        const messageInput = document.querySelector('.container-about-us .contacts .inputs .message textarea')
        submitBTN.addEventListener('click', ()=>{
            if(nameInput.value === '' || emailInput.value === '' || messageInput.value === ''){
                alert('Please Input Required Fields')
            }else{
                alert('Thank you for submitting!!')
            }
        })
</script>
</html>
