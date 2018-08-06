$(document).ready(function(){
        $('#scrollBotton').removeClass('round');
              $('#scrollBotton').removeClass('round');
  $('#wraperIndex').mousemove(function(e){
    // положение элемента
    var pos = $(this).offset();
    var elem_left = pos.left;
    var elem_top = pos.top;
    // положение курсора внутри элемента
    var Xinner = e.pageX - elem_left;
    var Yinner = e.pageY - elem_top;
    var screemSize= $(window).width();
    var persent= Xinner*100/screemSize;
    if(persent>80){
  var doc_h = $(document).height();
  var i;


  var lastScrollTop = 0;
  doc_h = $(document).height();
  var cars=[doc_h];    /*dвиправити!!!*/
  $(window).scroll(function(event){
  var st = $(this).scrollTop();
  if (st > lastScrollTop){
     // downscroll code
     cars[0]=doc_h;
     console.log("down "+st);
  } else {
     // upscroll code
     cars[0]=-doc_h;
     console.log("up "+st);
  }
  lastScrollTop = st;
  });
  $('#scrollBotton').on("click",(function(){ console.log(cars[0]); $('html, body').stop().animate({scrollTop:cars[0]}, 'slow',function() {
  }); }));




/*if(i==false|| i==null){ doc_h = $(document).height();
  $('#scrollBotton').on("click",(function(){ console.log(doc_h); $('html, body').stop().animate({scrollTop:doc_h}, 'slow',function() {
  //doc_h = -($(document).height());
  var i=true;
  }); }));}
else{doc_h = -($(document).height());
  $('#scrollBotton').on("click",(function(){ console.log(-doc_h); $('html, body').stop().animate({scrollTop:-doc_h}, 'slow',function() {
  //doc_h = -($(document).height());
  i=false;
}); }));}*/

      $('#scrollBotton').addClass('show');



  }else{

    $('#scrollBotton').removeClass('show');
      $('#scrollBotton').removeClass('round');
  }
  });
  $("#scrollBotton").on("click",function () {

           if ($(this).hasClass('round')) {

//console.log("round"); // вывод результата в консоль
        $('#scrollBotton').removeClass('round').addClass('rounBack');
        return;
    }
    //console.log("round2");
       $('#scrollBotton').removeClass('rounBack').addClass('round');
       });
});
