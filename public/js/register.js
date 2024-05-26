   function validateForm(event) {
        var email = document.getElementById('email').value;
        var firstName = document.getElementById('FirstName').value;
        var lastName = document.getElementById('LastName').value;
        var phoneNumber = document.getElementById('PhoneNumber').value;
        var address = document.getElementById('Address').value;
        var password = document.getElementById('pass').value;

        clearErrors();

        if (email === '') {
            showError('emailError', 'Email is required.');
        }

        if (firstName === '') {
            showError('firstNameError', 'First Name is required.');
        }

        if (lastName === '') {
            showError('lastNameError', 'Last Name is required.');
        }

        if (phoneNumber === '') {
            showError('phoneNumberError', 'Phone Number is required.');
        }

        if (address === '') {
            showError('addressError', 'Address is required.');
        }

        if (password === '') {
        showError('passwordError', 'Password is required.');
        } else {
            validatePassword();
        }

        if (email === '' || firstName === '' || lastName === '' || phoneNumber === '' || address === '' || password === '') {
            event.preventDefault();
        }
    }
    function validatePassword() {
        var password = document.getElementById('pass').value;
        var passwordError = document.getElementById('passwordError');
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;

        if (!password.match(passwordRegex)) {
            showError('passwordError', 'Password must have at least 6 characters, including one uppercase letter, one lowercase letter, one symbol, and one number.');
        } else {
            clearErrors();
        }
    }
    function showError(elementId, errorMessage) {
        var errorElement = document.getElementById(elementId);
        errorElement.innerText = errorMessage;
        errorElement.style.display = 'block';
    }

    function clearErrors() {
        var errorElements = document.querySelectorAll('.error');
        errorElements.forEach(function(element) {
            element.innerText = '';
            element.style.display = 'none';
        });
    }
