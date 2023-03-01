img=[
    "webroot/media/img/numeros/0.png",
    "webroot/media/img/numeros/1.png",
    "webroot/media/img/numeros/2.png",
    "webroot/media/img/numeros/3.png",
    "webroot/media/img/numeros/4.png",
    "webroot/media/img/numeros/5.png",
    "webroot/media/img/numeros/6.png",
    "webroot/media/img/numeros/7.png",
    "webroot/media/img/numeros/8.png",
    "webroot/media/img/numeros/9.png",
    "webroot/media/img/numeros/dosPuntos.png",
];

let reloj=document.getElementById("reloj");

let imagenReloj=document.createElement("img");
imagenReloj.setAttribute("src","");
reloj.appendChild(imagenReloj);

let numeros=document.createElement("div");
numeros.setAttribute("id","numeros");

for (let numPos = 0; numPos < 8; numPos++) {
  let numero= document.createElement("img");
  numero.setAttribute("src","");
  numeros.appendChild(numero);
}
numeros.children[2].attributes[0].textContent=img[10];
numeros.children[5].attributes[0].textContent=img[10];

reloj.appendChild(numeros);

function tiempo() {
    var hora=new Date();
    let primero=parseInt(hora.getHours()/10);
    let segundo=hora.getHours()%10;
    let tercero=parseInt(hora.getMinutes()/10);
    let cuarto=hora.getMinutes()%10;
    let quinto=parseInt(hora.getSeconds()/10);
    let sexto=hora.getSeconds()%10
    numeros.children[0].attributes[0].textContent=img[primero];
    numeros.children[1].attributes[0].textContent=img[segundo];
    numeros.children[3].attributes[0].textContent=img[tercero];
    numeros.children[4].attributes[0].textContent=img[cuarto];
    numeros.children[6].attributes[0].textContent=img[quinto];
    numeros.children[7].attributes[0].textContent=img[sexto];
}
tiempo();
setInterval(tiempo,1000);