function accordion(x){
    if (!$('.block' + x).is(":visible")) {         
        $('.block').slideUp(500);
        $('.btn-accordion').removeClass('btn-accordion-active');
        $('.btn-accordion' + x).addClass('btn-accordion-active');         
        $('.block' + x).slideDown(500);              
    }else { 
        $('.btn-accordion' + x).removeClass('btn-accordion-active'); 
        $('.block' + x).slideUp(500);             
    } 
}

$(document).ready(function () {
    $('.venobox').venobox();

    $('.btn-accordion100').click(()=>{
        var acc = $('.btn-accordion100').attr('data-accordion');
        accordion(acc);         
    })

});