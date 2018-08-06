$(document).ready(function() {
    $(".urlparam").on("click", function() {
        var link = $(this).data('text');
    });
    $("p").on("click", function() {
        var link = $(this).data('text');
        $('#' + link).ScrollTo();
        $('.maineContent .button_fixed').removeClass('button_fixed');
        $('#' + link).addClass('button_fixed');
        $('.' + link).addClass('button_fixed');
        event.preventDefault();
    });

    var scrolToNav = [], //початок ініціалізації змінних
        i, //ітерація циклу
        date, //вказує пункт до якого відбувається скрол
        text, //змінна назви пунктів бокового меню
        title = 'До кавычки"после кавычки',
        count = $('[name="count"]').length, //підрахунок кількості заголовків до яких буде йти скрол
        countP = $('p').length;
    for (i = 1; i <= count; i++) {
         text = $('#scrollto'+i).text();
      //  text = 'Заголоок' + i;
        date = "scrollto" + i;
        scrolToNav[i] = $('<div/>', { //початок створення div блоку
            title: title,
            'data-text': date,
            text: text,
            class: "date",
            css: {
                display: 'block',
                position: 'relative',
                padding: '10px',
            },
            click: function() {
                var link = $(this).data('text'); //визначення значення date-text в елементі на який натиснули
                $('#' + link).ScrollTo();
                $('.maineContent .button_fixed').removeClass('button_fixed');
                $('#' + link).addClass('button_fixed');
                $('.' + link).addClass('button_fixed');
                //$('.date').addClass('button_fixed');
                event.preventDefault();
            },
        });
        $('.side_nav').append(scrolToNav[i]); //додаванян в блок з класом .side_nav елементів як
    }
    alert($('.maineContent').childNodes.length);


});
