document.getElementById("btn_registrarse").addEventListener("click", register);
document.getElementById("btn_iniciar-sesion").addEventListener("click", iniciarSesion);
document.getElementById("btn_recuperar").addEventListener("click", cambiar);
//document.getElementById("btn_entrar").addEventListener("click", validarFormulario);
//document.getElementById("btn_recuperar_2").addEventListener("click", validarFormulario);
//document.getElementById("Registrarse").addEventListener("click", validarFormulario);
window.addEventListener("resize",Redimensionar);
var contenedor_login_register =document.querySelector(".contenedor_login-register");
var formulario_login =document.querySelector(".formulario_login");
var formulario_register =document.querySelector(".formulario_register");
var caja_trasera_register =document.querySelector(".caja_trasera-register");
var caja_trasera_login =document.querySelector(".caja_trasera-login");
    // Obtener los elementos input por su ID
    var correoInput = document.getElementById("ingre_correo");
    var contraseñaInput = document.getElementById("ingre_cont");
    var titulo = document.getElementById("titulo_rec");
    var boton = document.getElementById("btn_entrar");
    var boton2 = document.getElementById("btn_recuperar_2");
function Redimensionar(){
    if(window.innerWidth>850){
        caja_trasera_login.style.display= "block";
        caja_trasera_register.style.display="block";
    }
    else{
        caja_trasera_register.style.display="block";
        caja_trasera_register.style.opacity="1";
        caja_trasera_login.style.display="none";
        formulario_login.style.display="block";
        formulario_register.style.display="none";
        contenedor_login_register.style.left="0px";
    }
}

Redimensionar();
function register(){
    if(window.innerWidth>850){
    formulario_register.style.display="block";
    contenedor_login_register.style.left= "410px";
    formulario_login.style.display="none";
    caja_trasera_register.style.opacity ="0";
    caja_trasera_login.style.opacity="1";
    }else{
        formulario_register.style.display="block";
        contenedor_login_register.style.left= "0px";
        formulario_login.style.display="none";
        caja_trasera_register.style.display ="none";
        caja_trasera_login.style.display="block";
        caja_trasera_login.style.opacity="1";
    }
}

function iniciarSesion(){
    correoInput.placeholder = "Correo Electronico";
    correoInput.type = "email"; // Cambiar el tipo de "text" a "email"  
    contraseñaInput.placeholder = "Contraseña";
    
    contraseñaInput.type = "text"; // Cambiar el tipo de "password" a "text"
    titulo.textContent = "Iniciar sesion";
    if(window.innerWidth>850){
    formulario_register.style.display="none";
    contenedor_login_register.style.left= "10px";
    formulario_login.style.display="block";
    caja_trasera_register.style.opacity ="1";
    caja_trasera_login.style.opacity="0";
    }
    else{
    formulario_register.style.display="none";
    contenedor_login_register.style.left= "0px";
    formulario_login.style.display="block";
    caja_trasera_register.style.display ="block";
    caja_trasera_login.style.display="none";
    }
}

function cambiar() {

    // Cambiar el placeholder y el tipo de los inputs
    correoInput.placeholder = "Correo Electronico";
    correoInput.type = "email"; // Cambiar el tipo de "text" a "email"  
    contraseñaInput.placeholder = "Nombre";
    boton.style.display = "none";
    boton2.style.display = "block";
    boton2.style.opacity = "1";
    boton2.style.visibility = "visible";
    contraseñaInput.type = "text"; // Cambiar el tipo de "password" a "text"
    titulo.textContent = "Recuperacion de contraseña";
}

