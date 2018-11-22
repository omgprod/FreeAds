$(document).ready(function () {
    $('#send').hide();

    $('#send-btn').click(function() {
        var clicks = $(this).data('clicks');
        if (clicks) {
            $('#send').show();
        } else {
            $('#send').hide();
        }
        $(this).data("clicks", !clicks);
    });

    $('#unread-btn').click(function() {
        var clicks = $(this).data('clicks');
        if (clicks) {
            $('#unread').show();
        } else {
            $('#unread').hide();
        }
        $(this).data("clicks", !clicks);
    });

    $('#mask').click(function() {
        var clicks = $(this).data('clicks');
        if (clicks) {
            $('#message').css("display", "block");
        } else {
            $('#message').css("display", "none");
        }
        $(this).data("clicks", !clicks);
    });

    refresh();


    $(function () {
        $('.like').click(function () { likeFunction(this); });
        $('.dislike').click(function () { dislikeFunction(this);});
    });

    function likeFunction(caller) {
        var postId = caller.parentElement.getAttribute('postid');
        $.ajax({
            type: "POST",
            url: "rate.php",
            data: 'Action=LIKE&PostID=' + postId,
            success: function () {}
        });
    }
    function dislikeFunction(caller) {
        var postId = caller.parentElement.getAttribute('postid');
        $.ajax({
            type: "POST",
            url: "rate.php",
            data: 'Action=DISLIKE&PostID=' + postId,
            success: function () {}
        });
    }

});



//FONCTION DE REFRESH DE DIV
setInterval("refresh();",20000);
function refresh(){
    $('#refresh').load(location.href + ' #time');
    //$('#refresh-h-page').load(location.href + ' #home-refresh');
    //$('#refresh-m-page').load(location.href + ' #message-refresh');
}

document.addEventListener('DOMContentLoaded', function(){

}, false);


