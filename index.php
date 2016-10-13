<?php 
    session_start();
    $_SESSION['weaponList'] = array(    array(name => 'rock', win_against => 'scissors'),
                                        array(name => 'paper', win_against => 'rock'),
                                        array(name => 'scissors', win_against => 'paper')
                                    );
                                    
    $_SESSION['score'] = array ("j1" => 0, "j2" => 0);
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Rock Paper Scissors</title>
        <link rel="stylesheet" href="rockpapercscissors.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    
    <body>

        <header>
            <h1>Rock, Paper, Scissors</h1>
    
        </header>
            
        <section>
            <div class="chooseGame pad25">
                <a href="/views/playerVsComputer.php" class="chooseGame" name="player" id="playerVScomputer">Player vs Computer</a>
                <a href="#" class="chooseGame" name="player" id="playerVSplayer">Player vs Player</a>
            </div>
            
           
        
             <!--[if lt IE 7]>
                 <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
             <![endif]-->
       
           </section>
   
        
            <script src="rockpapercscissors.js"></script>
        
    </body>
</html>
