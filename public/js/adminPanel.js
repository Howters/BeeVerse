function openAddPopUp() {
    document.getElementById('addPopUp').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

function closeAddPopUp() {
    document.getElementById('addPopUp').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('Logo').addEventListener('change', validateLogo);
    // document.getElementsByName('GenreName')[0].addEventListener('input', validateGenreName);
    // document.getElementsByName('Title')[0].addEventListener('input', validateTitle);
    // document.getElementsByName('Director')[0].addEventListener('input', validateDirector);
    // document.getElementsByName('Duration')[0].addEventListener('input', validateDuration);
    // document.getElementsByName('Rating')[0].addEventListener('input', validateRating);
    // document.getElementsByName('Description')[0].addEventListener('input', validateDescription);
    // document.getElementsByName('ReleaseDate')[0].addEventListener('input', validateReleaseDate);
});

function validateLogo() {
    var fileInput = document.getElementById('Logo');
    var errorMessage = document.getElementById('errorMessage1');
    if (fileInput.files.length === 0) {
        errorMessage.textContent = 'Please select an image.';
        return false;
    }
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    var fileName = fileInput.files[0].name;
    if (!allowedExtensions.exec(fileName)) {
        errorMessage.textContent = 'Please select a valid image file (jpg, jpeg, png).';
        return false;
    }
    errorMessage.textContent = '';
    return true;
}

function validateGenreName() {
    var genreNameInput = document.getElementsByName('GenreName')[0];
    var errorMessage = document.getElementById('errorMessage2');
    if (genreNameInput.value.trim() === '') {
        errorMessage.textContent = 'Genre Name is required.';
        return false;
    }
    if (genreNameInput.value.length > 255) {
        errorMessage.textContent = 'Genre Name cannot exceed 255 characters.';
        return false;
    }
    errorMessage.textContent = '';
    return true;
}

function validateTitle() {
    var titleInput = document.getElementsByName('Title')[0];
    var errorMessage = document.getElementById('errorMessage3');
    if (titleInput.value.trim() === '') {
        errorMessage.textContent = 'Title is required.';
        return false;
    }
    if (titleInput.value.length > 255) {
        errorMessage.textContent = 'Title cannot exceed 255 characters.';
        return false;
    }
    errorMessage.textContent = '';
    return true;
}

function validateDirector() {
    var directorInput = document.getElementsByName('Director')[0];
    var errorMessage = document.getElementById('errorMessage4');
    if (directorInput.value.trim() === '') {
        errorMessage.textContent = 'Director is required.';
        return false;
    }
    if (directorInput.value.length > 255) {
        errorMessage.textContent = 'Director cannot exceed 255 characters.';
        return false;
    }
    errorMessage.textContent = '';
    return true;
}

function validateDuration() {
    var durationInput = document.getElementsByName('Duration')[0];
    var errorMessage = document.getElementById('errorMessage5');
    if (isNaN(durationInput.value) || durationInput.value < 1) {
        errorMessage.textContent = 'Please enter a valid duration (minimum is 1).';
        return false;
    }
    errorMessage.textContent = '';
    return true;
}

function validateRating() {
    var ratingInput = document.getElementsByName('Rating')[0];
    var errorMessage = document.getElementById('errorMessage6');
    if (isNaN(ratingInput.value) || ratingInput.value < 1 || ratingInput.value > 5) {
        errorMessage.textContent = 'Please enter a valid rating between 1 and 5.';
        return false;
    }
    errorMessage.textContent = '';
    return true;
}

function validateDescription() {
    var descriptionInput = document.getElementsByName('Description')[0];
    var errorMessage = document.getElementById('errorMessage7');
    if (descriptionInput.value.trim() === '') {
        errorMessage.textContent = 'Description is required.';
        return false;
    }
    if (descriptionInput.value.length > 255) {
        errorMessage.textContent = 'Description cannot exceed 255 characters.';
        return false;
    }
    errorMessage.textContent = '';
    return true;
}

function validateReleaseDate() {
    var releaseDateInput = document.getElementsByName('ReleaseDate')[0];
    var errorMessage = document.getElementById('errorMessage8');
    if (releaseDateInput.value.trim() === '') {
        errorMessage.textContent = 'Release Date is required.';
        return false;
    }
    errorMessage.textContent = '';
    return true;
}

function validateForm() {
    var isLogoValid = validateLogo();
    var isGenreNameValid = validateGenreName();
    var isTitleValid = validateTitle();
    var isDirectorValid = validateDirector();
    var isDurationValid = validateDuration();
    var isRatingValid = validateRating();
    var isDescriptionValid = validateDescription();
    var isReleaseDateValid = validateReleaseDate();
    if (
        isLogoValid
        // isGenreNameValid &&
        // isTitleValid &&
        // isDirectorValid &&
        // isDurationValid &&
        // isRatingValid &&
        // isDescriptionValid &&
        // isReleaseDateValid
    ) {
        document.getElementById('addPopUp').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
        return true;
    }
    return false;
}

function openModal(id){
    const popUpDel = document.querySelector('.delete-popup')
    popUpDel.style.display = 'block';
    const formDel = document.querySelector('.delete-popup form')
    formDel.action = "/delete-ukm/" + id;
}

function closePopupDel(){
    const popUpDel = document.querySelector('.delete-popup')
    popUpDel.style.display = 'none';
    const formDel = document.querySelector('.delete-popup form')
    formDel.action = "";
}
