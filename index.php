<?php   
    use \RockPaperScissors\Service;
    use \RockPaperScissors\Autoloader;
    
    require 'src/classes/Autoloader.php'; 
    Autoloader::register(); 

 //   $service = Service::getInstance(); 
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Rock Paper Scissors</title>
        <link rel="stylesheet" href="css/rockpapercscissors.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    
    <body>

        <header>
            <h1>Rock, Paper, Scissors, Lizard, Spock</h1>
    
        </header>
            
        <section>
            <div class="chooseGame pad25">
                <a href="src/views/playerVsComputer.php" class="chooseGame" name="player" id="playerVScomputer">Player vs Computer</a>
                <a href="src/views/playerVsPlayer.php" class="chooseGame" name="multiple" id="playerVSplayer">Player vs Player</a>
            </div>
            

           
        
             <!--[if lt IE 7]>
                 <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
             <![endif]-->
       
        </section>
        
        <?php include "src/views/footer.php" ?>
    </body>
</html>
