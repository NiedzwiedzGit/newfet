'use strict';
$.fn.paginate = function(options) {
  var $el = this; // The container to paginate
  var $results = $el.children();
  var $prevBtn = options.prevBtn; // The previous button
  var $nextBtn = options.nextBtn; // The next button

  var page = options.startingPage || 1; // Set the starting page, default to 1
  var perPage = options.perPage || 5; // Set the amount of results per page, default to 5
  var currentPage = $results;

  var onPage = options.onPage || null;

  function loadPage() {
    // Hide the last page
    currentPage.each(function(i, element) {
      $(element).hide();
    });
    // Set the current page
    currentPage = $results.slice((page - 1) * perPage, page * perPage);

    // Show the current page
    currentPage.each(function(i, element) {
      $(element).show();
    });

    if (onPage) {
      onPage({
        page: page,
        totalPages: Math.ceil($results.length / perPage),
        currentPage: currentPage
      });
    }
  }

  $prevBtn.on('click', function(evt) {
    // If we aren't at the starting page
    if (page > 1) {
      page -= 1;
      loadPage();
    }
  });

  $nextBtn.on('click', function(evt) {
  //  console.log('here');
    // If we aren't at the last page
    if (page < $results.length / perPage) {
      page += 1;
      loadPage();
    }
  });
  loadPage(); // Load the starting page
  window.addEventListener("resize", _resize_num_image);

  function _resize_num_image() {
    var intCurrentScreenWidth = window.innerWidth;
    var intCurrentScreenHeight = window.innerHeight;
    loadPage();
    if (intCurrentScreenHeight > 600) {
      perPage = 24;
    } else if (intCurrentScreenHeight < 600 && intCurrentScreenWidth < 1200) {
      //alert('tyt');
      perPage = 16;
    } else if (intCurrentScreenHeight < 600 && intCurrentScreenWidth < 600) {
      perPage = 30;
    } else if (intCurrentScreenHeight > 600 && intCurrentScreenWidth < 650) { //вертикальний режим
      perPage = 50;
    } else if (intCurrentScreenHeight <= 480 && intCurrentScreenWidth <= 320) { //вертикальний режим
      perPage = 30;
    } else {
      perPage = 30;
    }
  }
};
// Example
$('#contentP').paginate({
  // Required Buttons
  prevBtn: $('.prevP'),
  nextBtn: $('.nextP'),

  // Optional Stuff
  perPage: 24,
  startingPage: 1,

  // Lifecycle Hook (pretty useful I do say ;) )
  onPage: function onPage(data) {
    if (data.page == 1) {
      $('.pageNumber').html('<strong style="font-size: 120%;color: yellow">' + data.page + '</strong>' + '...' + data.totalPages);
    } else if (data.page == data.totalPages) {
      $('.pageNumber').html(data.totalPages - data.page + 1 + '...' + '<strong style="font-size: 120%;color: yellow">' + data.totalPages + '</strong>');
    } else {
      $('.pageNumber').html(data.page - 1 + '...' + '<strong style="font-size: 120%;color: yellow">' + data.page + '</strong>' + '...' + data.totalPages);
    }
    //передача значення кількості сторінок до функції\ прогресбар
    //var pN=data.totalPages;
    //move(pN);

  }
});


/*var percentDel=0;
var a=0;
var cur;
function move(N) {
  //a+=N;
 a=100/N;
 percentDel=100/N+1;
    console.log(a);
      $( "button" ).on( "click", function( event ) {
      var target = $( event.target ),
        progressbar = $( "#progressbar" ),
        progressbarValue = progressbar.find( ".ui-progressbar-value" );
if(a>=0||a<=101){
if ( target.is( ".prevP" ) ) {
        a-=percentDel;
          console.log("prevP="+a);
} else if ( target.is( ".nextP" ) ) {
  console.log("nexnP!!!!="+a);
        a+=percentDel;
        console.log("nexnP="+a);
  }
}else{a=100/N;}
  progressbarValue.css({
         "background": '#4286f4'
});
$( "#progressbar" ).progressbar({
  value: a
});
    });
    $( "#progressbar" ).progressbar({
      value: a
    });
}*/
$( function(data) {
    $( "#progressbar" ).progressbar({
      value: false
    });
    var a=0;
    $( "button" ).on( "click", function( event ) {
      var target = $( event.target ),
        progressbar = $( "#progressbar" ),
        progressbarValue = progressbar.find( ".ui-progressbar-value" );
console.log("nexnP1="+data.totalPages);
    if ( target.is( ".prevP" ) )  {
        a-=25;
        console.log("prevP2="+a);
        progressbar.progressbar( "option", {
          value: a
        });
      } else if ( target.is( ".nextP" ) )  {
          a+=25;
          console.log("nexnP2="+a);
          progressbar.progressbar( "option", {
            value: a
          });
        }
    });
  } );
