$(document).ready(function () {
    $('.venobox').venobox();

    $('.btn-sanfona').click(()=>{
        var x = $('.btn-sanfona').attr('data-sanfona');
        if (!$('.bloco' + x).is(":visible")) {         
            $('.bloco').slideUp(500);
            $('.btn-sanfona').removeClass('btn-sanfona-active');
            $('.btn-sanfona' + x).addClass('btn-sanfona-active');         
            $('.bloco' + x).slideDown(500);              
        }else { 
            $('.btn-sanfona' + x).removeClass('btn-sanfona-active'); 
            $('.bloco' + x).slideUp(500);             
        }  
    })
});