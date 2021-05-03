'use strict';
var forms = document.getElementById('formulari');
var correu_form = $("#correu_span");
var password_form = $("#password_span");

if(correu_form.text() != "") {
    $("#fa-correu").addClass("mb-4")
}
if (password_form.text() != "") {
    $("#fa-password").addClass("mb-4")
}
