$(document).ready(function(){
    $('#toggleSidebar').click(function(){
        $('#sidebar').toggleClass('active');
    });

    $('#closeSidebar').click(function(){
        $('#sidebar').removeClass('active');
    });

    function redirectToManageCarModel() {
        window.location.href = "{{ route('manage.carmodel') }}";
    }
});

const toggleButton = document.getElementById('toggle-btn');
const sidebar = document.getElementById('sidebar');

function toggleSubMenu(button) {
    if (!button.nextElementSibling.classList.contains('show')){
        closeAllSubMenus();
    }
    button.nextElementSibling.classList.toggle('show')
    button.classList.toggle('rotate')
}

function closeAllSubMenus() {
    Array.from(sidebar.getElementsByClassName('show')).forEach(ul => {
        ul.classList.remove('show')
        ul.previousElementSibling.classList.remove('rotate')
    })
}