
function reg(num) {
    if (document.getElementById(num).style.color=="blue") {
        document.getElementById(num).style.color="black";
        for( var i = 0; i < cards.length; i++){ 
            if ( cards[i] == num) {  cards.splice(i, 1);  }
            document.getElementById("enviar").removeAttribute("href");
    }
    }
    else{
        if (cards.length<7) {
            document.getElementById(num).style.color="blue";
            cards.push(num);
            if (cards.length==7) {
                var url=cards[0];
                for (let v = 1; v < cards.length; v++) {
                   url = url+"."+cards[v];   
                }
                document.getElementById("enviar").setAttribute("href", "curtirPostagem.php?cards="+ url);
            }
        }
        else{
            confirm("Você pode escolher apenas 7 cards")
        }
    }  
}
var cards = [];