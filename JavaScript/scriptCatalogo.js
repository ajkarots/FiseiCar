let viñeta =  document.getElementById("viñetas")
let seleccion =  document.getElementById("seleccion")
let imgSeleccionada =  document.getElementById("img")
let modelo =  document.getElementById("modelo")
let descripcion =  document.getElementById("descripcion")
let precio = document.getElementById("precio");
let id = document.getElementById("boton_selecion_tiempo");

function cargar(item){
    viñeta.style.width="100%" ;
    seleccion.style.width="100%";
    seleccion.style.opacity="1";
    imgSeleccionada.src = item.getElementsByTagName("img")[0].src;
    modelo.innerHTML=item.getElementsByTagName("h2")[0].innerHTML;
    precio.innerHTML=item.getElementsByTagName("span")[0].innerHTML;
    descripcion.innerHTML=item.getElementsByTagName("p")[0].innerHTML;
    id.href = item.getElementsByTagName("input")[0].value;
}

function cerrar(){
    viñeta.style.width="100%"
    seleccion.style.width="0";
    seleccion.style.opacity="0";    
}