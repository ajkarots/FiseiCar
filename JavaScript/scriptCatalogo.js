let viñeta =  document.getElementById("viñetas")
let seleccion =  document.getElementById("seleccion")
let imgSeleccionada =  document.getElementById("img")
let marca =  document.getElementById("marca")
let modelo =  document.getElementById("modelo")
let tipo =  document.getElementById("tipo")
let combustible =  document.getElementById("combustible")
let transmision =  document.getElementById("transmision")
let caballaje =  document.getElementById("caballos")
let precio = document.getElementById("precio");
let id = document.getElementById("id_vehiculo");

function cargar(item){
    viñeta.style.width="100%" ;
    seleccion.style.width="100%";
    seleccion.style.opacity="1";
    imgSeleccionada.src = item.getElementsByTagName("img")[0].src;
    marca.innerHTML='Marca: '+item.getElementsByTagName("h2")[0].innerHTML;
    modelo.innerHTML='Modelo: '+item.getElementsByTagName("h2")[1].innerHTML;
    tipo.innerHTML='Tipo de vehiculo: '+item.getElementsByTagName("input")[0].value;
    combustible.innerHTML='Combustible: '+item.getElementsByTagName("input")[1].value;
    transmision.innerHTML='Transmision: '+item.getElementsByTagName("input")[2].value;
    precio.innerHTML='Precio: '+item.getElementsByTagName("span")[0].innerHTML;
    caballaje.innerHTML=item.getElementsByTagName("input")[3].value;
    id.href = item.getElementsByTagName("input")[4].value;
}

function cerrar(){
    viñeta.style.width="100%"
    seleccion.style.width="0";
    seleccion.style.opacity="0";    
}