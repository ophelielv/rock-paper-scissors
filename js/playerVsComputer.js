

var playGame = function(){
    
    $(this).closest('div').children(".chooseWeapon")
        .css("background-color","#b9b9b9")
        .unbind('mouseenter').unbind('mouseleave');
    $(this).css('background-color','cadetblue');

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
                $("#computer").append( '<br><i class="fa fa-hand-' + data.computer + '-o" aria-hidden="true"></i>');
                $("#winner").text(data.result);
                
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
    
    $("span.chooseWeapon").hover(function(){
        $(this).css("background-color", "cadetblue");
        }, function(){
        $(this).css("background-color", "tomato");
    });
    $("#computer").text('').append('<i class="fa fa-question-circle-o" aria-hidden="true"></i>');
    $("#winner").text("");
    $(".chooseWeapon").on('click',playGame);
});