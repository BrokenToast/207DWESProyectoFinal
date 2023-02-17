function openArticle(event) {
    for (const element of event.target.parentElement.getElementsByTagName("article")) {
        element.classList.toggle("open")   
    }
}
for (const section of document.querySelectorAll("section>h1")) {
    section.addEventListener("click",openArticle);
}
document.getElementById("cerrarMensaje").addEventListener("click",(event)=>event.target.parentElement.style.display="none");