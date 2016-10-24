<?php   
    use \RockPaperScissors\Service;
    use \RockPaperScissors\Autoloader;
    
    require 'classes/Autoloader.class.php'; 
    Autoloader::register(); 
    
    $service = Service::getInstance(); 
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
                <a href="/views/playerVsComputer.php" class="chooseGame" name="player" id="playerVScomputer">Player vs Computer</a>
                <a href="/views/playerVsPlayer.php" class="chooseGame" name="multiple" id="playerVSplayer">Player vs Player</a>
            </div>
            

           
        
             <!--[if lt IE 7]>
                 <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
             <![endif]-->
       
        </section>
           
        <footer>
            <h2>Rules :</h2>
            <p>The game is an expansion on the game Rock, Paper, Scissors. <br/> 
            Each player picks a variable. The winner is the one who defeats the others.  <p>
            <p>Scissors cuts Paper<br/>
            Paper covers Rock<br/>
            Rock crushes Lizard<br/>
            Lizard poisons Spock<br/>
            Spock smashes Scissors</p>
            <p>Scissors decapitates Lizard<br/>
            Lizard eats Paper<br/>
            Paper disproves Spock<br/>
            Spock vaporizes Rock<br/>
            Rock crushes Scissors</p>
        <footer>
   
        
          
        
    </body>
</html>
