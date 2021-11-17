const articlesHeaders = document.getElementsByClassName("actualiteHeader");
console.log(articlesHeaders.length);

for (var i = 0; i < articlesHeaders.length; i++) {
    var cardColorDisplay = document.createElement("div");
    cardColorDisplay.classList.add("card_color");
    cardColorDisplay.style.background = cardColor;
    
    articlesHeaders[i].parentNode.insertBefore(cardColorDisplay, articlesHeaders[i]);
}