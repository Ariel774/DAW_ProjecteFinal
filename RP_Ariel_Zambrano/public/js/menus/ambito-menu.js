/** Menu Rotativo */
var angleStart = -360;
// jquery rotate animation
function rotate(li,d, p) {
    $({d:angleStart}).animate({d:d}, {
        step: function(now) {
            $(li)
               .css({ transform: 'rotate('+now+'deg)' });
            $(p).css({ transform: 'rotate('+(now < 0 ? Math.abs(now) : now*= -1 )+'deg)' });
        }, duration: 0
    });
}

// show / hide the options
function toggleOptions(s) {
    $(s).toggleClass('open');
    var li = $(s).find('li');
    var p = $("#option-0");
    var deg = $(s).hasClass('half') ? 180/(li.length-1) : 360/li.length;
    for(var i=0; i<=li.length; i++) {
        p = $("#option-"+i);
        var d = $(s).hasClass('half') ? (i*deg)-90 : i*deg;
        if($(s).hasClass('open')) {
          rotate(li[i],d, p)
        } else {
          rotate(li[i],angleStart, p);
        };
    }
}

$('.selector button').on("click", function(e) {
    toggleOptions($(this).parent());
});

setTimeout(function() { toggleOptions('.selector'); }, 100);
/** Menu Rotativo */
/** Menu Actualizar-Eliminar ámbitos */
$("#update-ambitos").on("click", function() {
    $("#options-ambitos").css("display", "block");
})
