/*Carrusel*/
var posicion=0;
var enlaces=[
    ["./doc/Planos_Aplicacion/230129ArbolDeNavegación.pdf","./doc/Planos_Aplicacion/230129ArbolDeNavegación.png"],
    ["./doc/Planos_Aplicacion/CasosDeUso.pdf","./doc/Planos_Aplicacion/CasosDeUso.png"],
    ["./doc/Planos_Aplicacion/CatalogoDeRequisitos.pdf","./doc/Planos_Aplicacion/CatalogoDeRequisitos.png"],
    ["./doc/Planos_Aplicacion/diagrama_de_clases.png","./doc/Planos_Aplicacion/diagrama_de_clases.png"],
    ["./doc/Planos_Aplicacion/modelo_Datos.png","./doc/Planos_Aplicacion/modelo_Datos.png"],
    ["./doc/Planos_Aplicacion/RelacionDeFicheros.pdf","./doc/Planos_Aplicacion/RelacionDeFicheros.png"],
    ["./doc/Planos_Aplicacion/EstructuraAlmacenamiento.pdf","./doc/Planos_Aplicacion/EstructuraAlmacenamiento.png"],
    ["./doc/Planos_Aplicacion/usodeSession.pdf","./doc/Planos_Aplicacion/usodeSession.png"],
];
let imagen=document.createElement("img");
let enlace=document.getElementById("enlace");
let idTemporizador;
imagen.setAttribute("src","");
enlace.appendChild(imagen);
function ponerTemporizador() {
    clearInterval(idTemporizador);
    idTemporizador=setInterval(()=>{
        carrusel(1);
    },6000);
}
function carrusel(movimiento) {
    if(movimiento){
        ++posicion;
        if(posicion>=enlaces.length){
            posicion=0;
        }
        enlace.attributes[0].textContent=enlaces[posicion][0];
        imagen.attributes[0].textContent=enlaces[posicion][1];
        ponerTemporizador()
    }else{
        --posicion;
        if(posicion<0){
            posicion=enlaces.length-1;
        }
        enlace.attributes[0].textContent=enlaces[posicion][0];
        imagen.attributes[0].textContent=enlaces[posicion][1];
        ponerTemporizador()
    }
}
carrusel(1);
document.getElementById("delante").addEventListener("click",()=>{
    carrusel(1);
});
document.getElementById("atras").addEventListener("click",()=>{
    carrusel(0);
});
ponerTemporizador();
