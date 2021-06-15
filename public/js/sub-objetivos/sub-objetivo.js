$(function(){ 
    var toggle = true;
    $("#btn-hour").on("click", function() {
        if(!toggle) {
            $("#btn-hour-info").css("display", "none");
            $("#hora_inicio").val(null);
            $("#hora_fin").val(null);
            toggle = true;
        } else {
            $("#btn-hour-info").css("display", "flex");
            toggle = false;
        }
    })
})