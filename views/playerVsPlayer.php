<?php
    use \RockPaperScissors\Autoloader;
    use \RockPaperScissors\Weapon;
    use \RockPaperScissors\WeaponList;
    use \RockPaperScissors\Service;
    
    require '../classes/Autoloader.class.php'; 

    Autoloader::register(); 
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Rock Paper Scissors</title>
        <link rel="stylesheet" href="../css/rockpapercscissors.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://use.fontawesome.com/f5bbde3669.js"></script>

    </head>
    
    <body>


    <header class="inTheGame">
        <h1><small>Rock, Paper, Scissors : </small><br/>
        Player VS Player</h1>

    </header>
        
    <section id="score">
        <a href="../index.php" alt="Homepage">Homepage</a>
        <p><strong>Score</strong><br>
        Player 1 : <span id="j1">0</span><br>
        Player 2 : <span id="j2">0</span>
        </p>
        <div id="multiplayers"><em>Multiplayers : </em></div>
        
        
    </section>
    
    <section id="game">
        <?php

            $weaponListObj = WeaponList::getInstance();

            $weaponsArray = [];
            foreach ($weaponListObj->getWeaponArray() as $weapon){
                $temp_weapon = new Weapon($weapon["name"],$weapon["win_against"]);
                array_push($weaponsArray,$temp_weapon);
            }

        ?>
        
    
        <div id = "first" class="choose">
        
            <?php
                foreach($weaponsArray as $weapon){

                    $weapon->displayWeapon();
                }
            ?>
        </div>
        <h2>VS</h2>
        <div id="second">
            <span class="opponentWeapon" name="opponent" id="opponent">?</span> 
        </div>
        
        <div class="result">
            <h2><span id="winner"></span> <span id="playAgain">Play again</span></h2>
        </div>
        
    </section>

        
             <!--[if lt IE 7]>
                 <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
             <![endif]-->
     
        <script src="../js/playerVsPlayer.js"></script>
    
  </body>
</html>
