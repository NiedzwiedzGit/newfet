$(document).ready(function() {
  $("#addLangButton").click(function(event) {
    event.preventDefault(); // выключaем стaндaртную рoль элементa
    var form = $("#codeForm");
    $.ajax({
      type: "POST",
      url: form.attr("action"),
      data: form.serialize(),
      success: function(responce) {
        $("#contentLeng").html(responce); //в этот див нужно вывести "новость"
        var langRefresh = $("#lang");
        $.ajax({
          url: "lengReloadList.php",
          cache: false,
          success: function(responce) {
            $(".langContent").html(responce); //в этот див нужно вывести "новость"
            alert("sdfsdf");
            // $( '#lang' ).add( "<div id='goLanguage'>Создать папку</div>" );
          }
        });
      }
    });
  });

  $("#addLangButton2").click(function(event) {
    event.preventDefault(); // выключaем стaндaртную рoль элементa
    var form = $("#codeForm2");
    $.ajax({
      type: "POST",
      url: form.attr("action"),
      data: form.serialize(),
      success: function(responce) {
        $("#contentLeng").html(responce); //в этот див нужно вывести "новость"
      }
    });
  });

  $("#langHover").hover(function(event) {
    event.preventDefault(); // выключaем стaндaртную рoль элементa
    var langRefresh = $("#langContent");
    $.ajax({
      url: "lengReloadList.php",
      cache: false,
      success: function(responce) {
        $(".langContent").html(responce); //в этот див нужно вывести "новость"
      }
    });
  });

  $(".content-item div").click(function(event) {
    // alert($(this).attr("name"));
    event.preventDefault(); // выключaем стaндaртную рoль элементa
    var form = $("#codeForm2");
    $.ajax({
      type: "GET",
      url: "pages/info.php",
      data: "info=" + $(this).attr("name"),
      success: function(responce) {
        $(".headerSideContent").html(responce); //в этот див нужно вывести "новость"
      }
    });
  });
});
