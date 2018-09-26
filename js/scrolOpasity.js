/*  Код відповідає за те щоб на всіх браузерах коректно відпрацювувалась анімвція і z-index футера */
$(document).ready(function() {
  $(window).scroll(function() {
    var step = 10; // вместо шага в 1, сделаем 10

    var bo = $(this).scrollTop();
    var a = $("footer").css("z-index");
    console.log(bo);
    if (bo >= 240) {
      $("footer>ul").removeClass("down");
      $("footer").removeClass("bord");
      $("footer").addClass("bord");

      $("footer>ul").removeClass("up");
      $("footer>ul").addClass("up");

      $("footer>ul>li").hover(
        function() {
          var a = $(this)
            .find("p")
            .text();
          $("footer #fBack").addClass("dynamicBack");
          $("footer #fBack").html(a);

          // шоб витягнути назву классу .aattr("class")
          // var className = $(this)
          //   .find("p")
          //   .attr("class");
          // $("#iconsIndex ." + className + "").addClass("iconUp");

          $(".iconUp").css("opacity", "1");
          /*  $('.iconUp').css({
            "animation": "3s",
            "animation-name": "slideup",
            "animation - fill - mode": "forwards"});*/
          $("#iconsIndex .home").animate(
            {
              bottom: "20" //вияснити універсільну форпмулу допасування анімації, футкр має 245px якосьб так зробити шоб картинка завжди була на 245 зверху
            },
            100
          );
        },
        function() {
          $("footer").removeClass("dynamicBack");
          $("#iconsIndex .home").animate(
            {
              bottom: "-20"
            },
            100
          );
          $(".iconUp").css("opacity", "1");
          //  $('.iconUp').css('animation-direction', 'reverse');
          //   $('#iconsIndex .' + className + '').removeClass('iconUp'); //якогось хзуя не реагує на повторне наведення мищкою
          $("footer #fBack").html("");
        }
      );
    }

    if (bo < 240) {
      $("footer").removeClass("bord");
      $("footer>ul").removeClass("up");

      $("footer>ul").removeClass("down");
      $("footer>ul").addClass("down");
    }
  });
});
