
function reg(num) {
    if (document.getElementById(num).style.color=="blue") {
        document.getElementById(num).style.color="black";
        for( var i = 0; i < cards.length; i++){ 
            if ( cards[i] == num) {  cards.splice(i, 1);  }
    }
    }
    else{
        if (cards.length<7) {
            document.getElementById(num).style.color="blue";
            cards.push(num);
        }
        else{
            confirm("Você pode escolher apenas 7 cards")
        }
    }  
}
var cards = [];