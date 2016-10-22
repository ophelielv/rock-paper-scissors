/*****websocket********/

// Edit these variables to match your environent.
var ws_host = 'rock-paper-scissors-ophelielv.c9.io';
var ws_port = '80';
var ws_folder = '';
var ws_path = '/websocket';

// We are using wss:// as the protocol because Cloud9 is using
// HTTPS. In case you try to run this, using HTTP, make sure
// to change this to ws:// .
var ws_url = 'wss://' + ws_host;
if (ws_port != '80' && ws_port.length > 0) {
    ws_url += ':' + ws_port;
}

ws_url += ws_folder + ws_path;

var conn = new WebSocket(ws_url);

conn.onopen = function(e) {
    console.log("Connection established!");
};

conn.onmessage = function(e) {
    
    if(isJson(e.data)){
        //résultat de la partie
        var response = jQuery.parseJSON(e.data);
        $("#opponent").text(response.opponent);
        $("#opponent").append( '<br><i class="fa fa-hand-' +response.opponent + '-o" aria-hidden="true"></i>');
        $("#winner").text(response.result);
        
        if(response.winner === "Player 1" || response.winner === "It's a tie !"){
            j1Score = $("#j1").text();
            $("#j1").text(++j1Score);
        }
        
        if(response.winner === "Player 2" || response.winner === "It's a tie !"){
            j2Score = $("#j2").text();
            $("#j2").text(++j2Score);  
        }
        
        $("#playAgain").css("visibility","visible");

    }
    else
    {
        //autre message reçu
        $('#multiplayers').append(e.data + '<br />');
    }
    

};

function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}


var playGame = function()
{
    $(this).closest('div').children(".chooseWeapon").css("background-color","#b9b9b9");
    $(this).css('background-color','darkcyan');
    $(".chooseWeapon").off('click',playGame);

    var chosenWeapon = $(this).attr("name");
    conn.send(chosenWeapon);
 
    return false;
}

$(".chooseWeapon").on('click',playGame);

$("#playAgain").click(function(){
    $("#playAgain").css("visibility","hidden");
    $("span.chooseWeapon").css("background-color","tomato");
    $("span.chooseWeapon").hover(function(){
        $(this).css("background-color", "darkcyan");
        }, function(){
        $(this).css("background-color", "tomato");
    });
    
    $("#opponent").text("?");
    $("#winner").text("");
    $(".chooseWeapon").on('click',playGame);
});