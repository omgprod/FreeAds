document.addEventListener('DOMContentLoaded', function(){


}, false);


document.getElementById('test').style.visibility='hidden';

$(document).ready(function(){
    texts = $('#test');
    texts.each(function() {
        $( this ).hide();
    });
});

