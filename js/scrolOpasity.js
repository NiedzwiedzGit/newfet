
/*  Код відповідає за те щоб на всіх браузерах коректно відпрацювувалась анімвція і z-index футера */
$(document).ready(function() {

    $(window).scroll(function() {
        var bo = $(this).scrollTop();
        var a = $('footer').css('z-index');

        if (bo >= 210) {

            $('footer').removeClass('bord');
            $('footer').addClass('bord');
        }
        if (bo < 210) {

            $('footer').removeClass('bord');
        }
    });
});
