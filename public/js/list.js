function showContainer(city) {
    var containers = document.querySelectorAll('.container');
    var buttons = document.querySelectorAll('.btn');

    containers.forEach(function(container) {
        container.classList.add('hidden');
    });

    buttons.forEach(function(btn) {
        btn.classList.remove('active');
    });

    var selectedContainer = document.getElementById(city);
    if(city == 'Jakarta'){
        var idbtn = 'jktbtn';
    }
    else if(city == 'Bandung'){
        var idbtn = 'bdgbtn';
    }
    else{
        var idbtn = 'tgrbtn';
    }

    var selectedButton = document.getElementById(idbtn);
    if (selectedContainer) {
        selectedContainer.classList.remove('hidden');
    }
    selectedButton.classList.add('active')
}
