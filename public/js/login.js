function validateForm(event) {
    var email = document.getElementById('email').value;
    var password = document.getElementById('pass').value;

    clearErrors();

    if (email === '') {
        showError('emailError', 'Email is required.');
    }

    if (password === '') {
    showError('passwordError', 'Password is required.');
    }

    if (email === '' ||password === '') {
        event.preventDefault();
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
