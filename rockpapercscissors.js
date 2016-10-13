var playGame = function(){
    
    $(this).closest('div').children(".chooseWeapon").css("background-color","#b9b9b9");
    $(this).css('background-color','darkcyan');
    $(".chooseWeapon").off('click',playGame);

    var chosenWeapon = $(this).attr("name");
    $.ajax({
        url      : "../ajax/PlayGame.php",
        context  : this,
        data     : { weaponName: chosenWeapon },
        dataType : 'json',
        type     : 'post',
        success  : function(data){

            if(data){
                $("#computer").text(data.computer);
                $("#winner").text(data.winner);
                
                if(data.winner === "Player" || data.winner === "It's a tie !"){
                    j1Score = $("#j1").text();
                    $("#j1").text(++j1Score);
                }
                
                if(data.winner === "Computer" || data.winner === "It's a tie !"){
                    j2Score = $("#j2").text();
                    $("#j2").text(++j2Score);  
                }

            }
            else{
                console.log("error");
            }
            
            $("#playAgain").css("visibility","visible");

        }
    });
    
    return false;
}

$(".chooseWeapon").on('click',playGame);

$("#playAgain").click(function(){
    $("#playAgain").css("visibility","hidden");
    $("span.chooseWeapon").css("background-color","tomato");
    $("#computer").text("?");
    $("#winner").text("--");
    $(".chooseWeapon").on('click',playGame);
});