let popup=document.getElementById("popup");
if(localStorage.getItem("cerrar")==null){
    popup.style.display="block";
    document.getElementById("cerrarpopup").addEventListener("click",()=>{
        popup.style.display="none";
        localStorage.setItem("cerrar",true)
    });
}
