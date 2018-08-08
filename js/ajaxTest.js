$(document).ready(function() { // либо $(function() {
    /*$('#goLanguage').click(function(event){
        event.preventDefault(); // выключaем стaндaртную рoль элементa

        $.ajax({
            url:"dataLoadTest.php",
            cache: false,
            success: function(responce){
                $('#content').html(responce); //в этот див нужно вывести "новость"
                $('#content').addClass( "border" );
            }
        });
    });*/

    $('#addLangButton').click(function(event){
        event.preventDefault(); // выключaем стaндaртную рoль элементa
        var form = $('#codeForm');
        $.ajax( {
        type: "POST",
        url: form.attr( 'action' ),
        data: form.serialize(),
            success: function(responce){
                $('#contentLeng').html(responce); //в этот див нужно вывести "новость"
                var langRefresh = $('#lang');
                $.ajax( {
                //type: "POST",
                 //url: langRefresh.attr( 'action' ),
                //data: langRefresh.serialize(),
                url:"lengReloadList.php",
                cache: false,
                    success: function(responce){
                        $('#lang').html(responce); //в этот див нужно вывести "новость"
                        alert("sdfsdf");
                        // $( '#lang' ).add( "<div id='goLanguage'>Создать папку</div>" );
                    }
                });
            }
        });


    });


    $('#addLangButton2').click(function(event){
        event.preventDefault(); // выключaем стaндaртную рoль элементa
        var form = $('#codeForm2');
        $.ajax( {
      type: "POST",
      url: form.attr( 'action' ),
      data: form.serialize(),
      success: function(responce){
          $('#contentLeng').html(responce); //в этот див нужно вывести "новость"
      }
    });
    });

    $('#langHover').hover(function(event){
        event.preventDefault(); // выключaем стaндaртную рoль элементa
        var langRefresh = $('#langContent');
        $.ajax( {
        //type: "POST",
         //url: langRefresh.attr( 'action' ),
        //data: langRefresh.serialize(),
        url:"lengReloadList.php",
        cache: false,
            success: function(responce){
                $('#langContent').html(responce); //в этот див нужно вывести "новость"
            }
        });
    });


});
