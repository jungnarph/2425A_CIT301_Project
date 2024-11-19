$(document).ready(function(){
    $('#toggleSidebar').click(function(){
        $('.sidebar').toggleClass('active');
    });

    $('#closeSidebar').click(function(){
        $('.sidebar').removeClass('active');
    });
});