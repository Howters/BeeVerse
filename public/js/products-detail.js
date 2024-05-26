document.addEventListener("DOMContentLoaded", function() {
    const quantityInput = document.getElementById("quantity");
    const buttonPlus = document.getElementById("button-plus");
    const buttonMinus = document.getElementById("button-minus");
    const fileUploadInput = document.getElementById('file-upload');
    const fileBrowserLink = document.getElementById('file-browser');
    const borderContainer = document.querySelector('.border-container');
    const fileListContainer = document.getElementById('file-list');

    fileBrowserLink.addEventListener('click', function(event) {
        event.preventDefault();
        fileUploadInput.click();
    });

    borderContainer.addEventListener('dragover', function(event) {
        event.preventDefault();
        borderContainer.classList.add('dragover');
    });

    borderContainer.addEventListener('dragleave', function(event) {
        borderContainer.classList.remove('dragover');
    });

    borderContainer.addEventListener('drop', function(event) {
        event.preventDefault();
        borderContainer.classList.remove('dragover');
        const files = event.dataTransfer.files;
        handleFiles(files);
    });

    fileUploadInput.addEventListener('change', function(event) {
        const files = event.target.files;
        handleFiles(files);
    });

    function handleFiles(files) {
        fileListContainer.innerHTML = ''; // Clear any existing file names
        for (let i = 0; i < files.length; i++) {
          const fileItem = document.createElement('p');
          fileItem.textContent = files[i].name;
          fileListContainer.appendChild(fileItem);
        }
      }

    buttonPlus.addEventListener("click", function() {
        let currentValue = parseInt(quantityInput.value);
        if (!isNaN(currentValue)) {
            quantityInput.value = currentValue + 1;
        }
    });

    buttonMinus.addEventListener("click", function() {
        let currentValue = parseInt(quantityInput.value);
        if (!isNaN(currentValue) && currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    });

    quantityInput.addEventListener("input", function() {
        let currentValue = parseInt(quantityInput.value);
        if (isNaN(currentValue) || currentValue < 1) {
            quantityInput.value = 1;
        }
    });
});


