$(function(){ 
    var toggle = false;
    $("#btn-info").on("click", function() {
        if(!toggle) {
            $("#tareaInfo").attr("hidden", false);
            toggle = true;
        } else {
            $("#tareaInfo").attr("hidden", true);
            toggle = false;
        }
    })
})