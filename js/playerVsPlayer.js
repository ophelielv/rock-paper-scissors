var ws = new WebSocket("wss://https://rock-paper-scissors-ophelielv.c9users.io/views/playerVsPlayer.php");

ws.send("Hello serveur...");

var data = { "type" : "texte", "message" : "Hello" };
var message = JSON.stringify(data);
ws.send(message);

socket.onopen = function (event) {      
  socket.send('{ "type": "texte", "message": "Prêt" }' );     
};

socket.onmessage=function(event) { 
    var data = JSON.parse(event.data);
    switch(data.type)
    {
       case "text":
           document.getElementById("message").innerHTML = data.message;
           break;
    }
};