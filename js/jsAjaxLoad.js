$(document).ready(function() {

	var hash = window.location.hash.substr(1);
	var href = $('#menu_ul li ul li a').each(function(){
		var href = $(this).attr('href');
		if(hash==href.substr(0,href.length-5)){
			var toLoad = hash+'.php';
			$('#content').load(toLoad);
		}
	});
//	$('#nav li ul a').click(function()
	$('#menu_ul li ul li a').click(function(){
	/*	var script = document.createElement('script');
		script.src = "js/jquery.lightbox-0.5.pack.js"
		document.body.appendChild(script);

		script.onload = function() {
		    // после выполнения скрипта становится доступна функция _
		    //alert('js/jquery.lightbox-0.5.pack.js'); // её код
			eval(script.src);
		}*/
		var toLoad = $(this).attr('href');
		$('#content').hide('fast',loadContent);
		$('#load').remove();
		$('#wrapper').append('<span id="load">LOADING...</span>');
		$('#load').fadeIn('normal');
		window.location.hash = $(this).attr('href').substr(0,$(this).attr('href').length-5);
		function loadContent() {
			$('#content').load(toLoad,'',showNewContent());
		}
		function showNewContent() {
			$('#content').show('normal',hideLoader());
		}
		function hideLoader() {
			$('#load').fadeOut('normal');
		}
		return false;

	});

});
