//everton 05/11/19

function mostra(x) {
    $('#d' + x).slideToggle(500);
    $('#link' + x).toggleClass("ativo");
}

$(function () {

    $(window).scroll(function () {
        if ($(this).scrollTop() > 700) {
            $('.paracima').fadeIn();
            $('#menuredes2 a').css("color", "white");
        } else {
            $('.paracima').fadeOut();
            $('#menuredes2 a').css("color", "black");
        }
    });

    $('.paracima').click(function () {
        $('html').animate({ scrollTop: 0 }, 500);
        return false;
    });

    $("#iconec").click(function () {
        $("#menucel").slideToggle(300);
    });

    $("#menucel").click(function () {
        $(this).fadeOut(200);
    });

    $('a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('href'),
            targetOffset = $(id).offset().top;

        $('html, body').animate({
            scrollTop: targetOffset - 50
        }, 500);
    });

});