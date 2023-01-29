function before() {
    --posicion;
    if(posicion<0){
        posicion=enlaces.length-1;
    }
    let enlace=document.getElementById("actual");
    let imagen=enlace.children[0];
    enlace.attributes[0].textContent=enlaces[posicion][0];
    imagen.attributes[0].textContent=enlaces[posicion][1];
}
function after() {
    ++posicion;
    if(posicion>=enlaces.length){
        posicion=0;
    }
    let enlace=document.getElementById("actual");
    let imagen=enlace.children[0];
    enlace.attributes[0].textContent=enlaces[posicion][0];
    imagen.attributes[0].textContent=enlaces[posicion][1];
}
let enlace=document.getElementById("actual");
let imagen=enlace.children[0];
document.write(enlace.getAttribute("href"));
var enlaces=[
    ["./webroot/multimedia/230110DiagramaDeClasesLoginLogoffMulticapaPOO.pdf","./webroot/media/img/carrito/diagrama_clase.png"],
    ["./webroot/multimedia/230115LoginLogoffRelaciónDeFicheros.pdf","./webroot/media/img/carrito/diagramaArchivos.png"],
    ["./webroot/multimedia/230110DiagramaDeClasesGenéricoMulticapaPOO.pdf","./webroot/media/img/carrito/diagramageneral.png"],
    ["./webroot/multimedia/230110ArbolDeNavegaciónLoginLogoffMulticapaPOO.pdf","./webroot/media/img/carrito/diagramaNavegacion.png"]
];
var posicion=0;
setInterval(after,6000);
