import {Validadacion} from "./validacion.js";
function erroreCorrecto(funcionValidacion,elemento,max,min) {
    if(funcionValidacion(elemento.value,max,min)==null){
        elemento.classList.remove("error");
        elemento.classList.add("correcto");
    }else{
        elemento.classList.add("error");
        elemento.classList.remove("correcto");
    }
}

let form=document.forms[0].elements;
let num1=document.getElementById("num1");
let num2=document.getElementById("num2");
let resultado=document.getElementById("resultado");
let res1=document.getElementById("res1");
let res2=document.getElementById("res2");
let res3=document.getElementById("res3");
let fUsuario=form.namedItem("usuario");
let fPassword=form.namedItem("password");
let fDescUsuario=form.namedItem("descUsuario");
let registra=form.namedItem("registrar");

fUsuario.addEventListener("blur",(event)=>{
    erroreCorrecto(Validadacion.validarAlfabetico,event.target,30,2);
});
fPassword.addEventListener("blur",(event)=>{
    erroreCorrecto(Validadacion.validarAlfaNumerico,event.target,16,2);
});
fDescUsuario.addEventListener("blur",(event)=>{
    erroreCorrecto(Validadacion.validarAlfaNumerico,event.target,250,2);
});
function registrar(event) {
    event.preventDefault();
    if(document.querySelectorAll(".correcto").length==3){
        captchaCreate();
        document.getElementById("captcha").style.display="table-cell";
    }else{
        document.getElementById("captcha").style.display="none";
    }
}
registra.addEventListener("click",registrar);

/*Capchat*/
res1.setAttribute("draggable","true");
res2.setAttribute("draggable","true");
res3.setAttribute("draggable","true");
var cuadroDrag;
function numeroAletaroioCaptchaFalsos() {
    resultado=parseInt(num1.textContent)+parseInt(num2.textContent);
    do{
        var num=parseInt(Math.random()*18+1);
    }while(num==resultado);
    return num;
}
function captchaCreate() {
    num1.textContent=parseInt(Math.random()*9+1);
    num2.textContent=parseInt(Math.random()*9+1);
    do{
        var numero1=numeroAletaroioCaptchaFalsos();
        var numero2=numeroAletaroioCaptchaFalsos();
    }while(numero1==numero2);
    let numeros=[
        parseInt(num1.textContent)+parseInt(num2.textContent),
        numero1,
        numero2
    ];
    numeros.sort();
    res1.textContent=numeros[0];
    res2.textContent=numeros[1];
    res3.textContent=numeros[2];
}
res1.addEventListener("drag",(event)=>{
    event.preventDefault();
    cuadroDrag=event.target;
});
res2.addEventListener("drag",(event)=>{
    event.preventDefault();
    cuadroDrag=event.target;
});
res3.addEventListener("drag",(event)=>{
    event.preventDefault();
    cuadroDrag=event.target;
});
resultado.addEventListener("dragover",(event)=>{
    event.preventDefault();
});
resultado.addEventListener("drop",(event)=>{
    event.preventDefault();
    if((parseInt(num1.textContent)+parseInt(num2.textContent))==parseInt(cuadroDrag.textContent)){
        event.target.classList.add("correcto");
        event.target.textContent="OK"
        event.target.classList.remove("error");
        res1.attributes.removeNamedItem("draggable");
        res2.attributes.removeNamedItem("draggable");
        res3.attributes.removeNamedItem("draggable");
        setTimeout(()=>{
            document.forms[0].submit();
        },2000);
    }else{
        event.target.classList.remove("correcto");
        event.target.classList.add("error");
        event.target.textContent="NO";
    }
});