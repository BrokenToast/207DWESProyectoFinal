export class Validadacion{
    static validarAlfabetico(texto="",max,min) {
        let patron=new RegExp(`^[a-záéíóúäëïöüàèìòùñ\s]{${min},${max}}$`,"i");
        if(texto==""){
            return "Campo vacio";
        }
        if(!patron.test(texto)){
            return `Sololetras. Cantidad de caracteres ${max}-${min}`;
        }
    }
    static validarAlfaNumerico(texto="",max,min) {
        let patron=new RegExp(`^[a-záéíóúäëïöüàèìòùñ\s0-9]{${min},${max}}$`,"i");
        if(texto==""){
            return "Campo vacio";
        }
        if(!patron.test(texto)){
            return `Solo caracteres afanumericos. Cantidad de caracteres ${max}-${min}`;
        }
    }
}