
  window.addEventListener("resize", _resize_container_image_box1);
  function _resize_container_image_box1(){
    if($( window ).width()<1600){
  walk();
    }
    else{
removeWalk();
    }
  }
  if($( window ).width()<1600){
walk();
  }
  else{
removeWalk();
  }
function walk(){
//  document.write('<h1>Hello, World!</h1>');
   $('#menu').addClass('is-falling');

  setTimeout(function(){
     $('.rectangle').addClass('is-collapsing');
  }, 1500);
  setTimeout(function(){
      $('#menu').addClass('walk');
  }, 700);
}

function removeWalk(){
    $('#menu').removeClass('walk');
}
  //<script src="js/headerWalk.js"></script>
