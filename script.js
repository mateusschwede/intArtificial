function salva(nume) {
    
}
function pinta(num) {
    if (document.getElementById(num).style.color=="blue") {
        document.getElementById(num).style.color="black";
    }
    else{
        document.getElementById(num).style.color="blue";
    }  
}
function reg(numero) {
    pinta(numero);
    salva(numero);
    
}