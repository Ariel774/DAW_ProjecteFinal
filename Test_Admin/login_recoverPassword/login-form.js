var loginForm = document.getElementById("form-login");
var registerForm = document.getElementById("form-register");
var btn = document.getElementById("btn");
var login = document.getElementById("login");
var register = document.getElementById("register");
login.onclick = function login(){
    loginForm.style.left = "50px";
    registerForm.style.left = "450px";
    btn.style.left = "0px";
}

register.onclick = function register(){
    loginForm.style.left = "-400px";
    registerForm.style.left = "50px";
    btn.style.left = "110px";
}
