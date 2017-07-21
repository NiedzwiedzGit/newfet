var items = ['$file'];

// Create List
for (var i = 0; i < items.length; i++) {
  $("#pagination_ul").append("<li>"+ items[i] +"</li>");
}

// Pagination
// Limit
var lim = 10;
// All Items Length
var len = $("#pagination_ul li").length;
$("#pagination_ul li:gt("+ (lim - 1) +")").hide();
var totalPage = Math.round(len / lim);
for(var i = 1; i <= totalPage; i++) {
  $("#numbers").append("<a href='javascript:void(0);'>"+i+"</a>");
}
$("#numbers a:first").addClass("active");
$("#numbers a").click(function() {
  var index = $(this).index() + 1;
  var gt = lim * index;
  $("#numbers a").removeClass("active");
  $(this).addClass("active");
  $("#pagination_ul li").hide();
  for(var i = gt-lim; i < gt; i++) {
    $("#pagination_ul li:eq("+ i +")").show();
  }
});
