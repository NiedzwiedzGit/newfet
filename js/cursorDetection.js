$(document).ready(function() {
  $("#scrollBotton").removeClass("round");
  $("#scrollBotton").removeClass("round");

  $("#wraperIndex").mousemove(function(e) {
    // положение элемента
    var pos = $(this).offset();
    var elem_left = pos.left;
    var elem_top = pos.top;
    // положение курсора внутри элемента
    var Xinner = e.pageX - elem_left;
    var Yinner = e.pageY - elem_top;
    var screenSize = $(window).width();
    var persent = (Xinner * 100) / screenSize;
    if (persent > 80) {
      var doc_h = $(document).height();
      var i;

      var lastScrollTop = 0;
      doc_h = $(document).height();

      $("#scrollBotton").on("click", function() {
        var st = $("html, body").scrollTop();
        if (st > 200) {
          var cars = 0;
        } else {
          var cars = doc_h;
        }
        // console.log("up " + st);
        // console.log("dddddddddddddddd " + cars);
        $("html, body")
          .stop()
          .animate({ scrollTop: cars }, "slow", function() {});
      });

      $("#scrollBotton").addClass("show");
    } else {
      $("#scrollBotton").removeClass("show");
      $("#scrollBotton").removeClass("round");
    }
  });
  $("#scrollBotton").on("click", function() {
    if ($(this).hasClass("round")) {
      //console.log("round"); // вывод результата в консоль
      $("#scrollBotton")
        .removeClass("round")
        .addClass("rounBack");
      return;
    }
    //console.log("round2");
    $("#scrollBotton")
      .removeClass("rounBack")
      .addClass("round");
  });
});
