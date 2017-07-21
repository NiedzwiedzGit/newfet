
$(document).ready(function() {

    onresize = function() {
        var hght = $(".pic").css("height");
        var wdth = $(".pic").css("width");
        var ratio = 1.1;       // moj koef proporcji
        var $pic = $('.pic'); // кэшируем результат вызова функции .pic
        $pic.height($pic.width() * ratio);
    };
    onresize();
    window.addEventListener("resize", _resize_);
    function _resize_() {
        onresize();
    }
});
