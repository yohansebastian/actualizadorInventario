$(document).ready(function() {

    if (window.innerWidth < 768){
        $('.btn').addClass('btn-sm btn-block');
    }
    else if (window.innerWidth<900){
        $('.btn').removeClass('btn-sm');
    }
    else if (window.innerWidth<1200){
        $('.btn').addClass('btn-lg btn-block');
    }
});