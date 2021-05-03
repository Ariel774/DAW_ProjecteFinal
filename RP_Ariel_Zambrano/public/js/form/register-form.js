'use strict';
var name_form = $("#name_span");
var correu_form = $("#correu_span");
var password_form = $("#password_span");
var password_confirm_form = $("#password-span-confirm");

if (name_form.text() != "") {
    $("#fa-name").addClass("mb-4")
}
if(correu_form.text() != "") {
    $("#fa-correu").addClass("mb-4")
}
if (password_form.text() != "") {
    $("#fa-password").addClass("mb-4")
}
if (password_confirm_form.text() != "") {
    $("#fa-password-confirm").addClass("mb-4")
}
