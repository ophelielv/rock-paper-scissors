<?php     session_start(); ?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Rock Paper Scissors</title>
        <link rel="stylesheet" href="../rockpapercscissors.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    
    <body>

    <header class="inTheGame">
        <h1><small>Rock, Paper, Scissors : </small><br/>
        Player VS Computer</h1>

    </header>
        
    <section id="score">
        <a href="../index.php" alt="Homepage">Homepage</a>
        <p><strong>Score</strong><br>
        Player : <span id="j1">0</span><br>
        Computer : <span id="j2">0</span></p>
        
    </section>
    
    <section id="game">
        <?php
            require '../Weapon.class.php';

            $weaponList = array();
            foreach ($_SESSION["weaponList"] as $weapon){
                $temp_weapon = new Weapon($weapon["name"],$weapon["win_against"]);
                array_push($weaponList,$temp_weapon);
            }
        ?>
        
    
        <div id = "first" class="choose">
        
            <?php
                foreach($weaponList as $weapon){
                    $weapon->displayWeapon();
                }
            ?>
        </div>
        <h2>VS</h2>
        <div id="second">
            <span class="computerWeapon" name="computer" id="computer">?</span> 
        </div>
        
        <h2>Winner is : <span id="winner">--</span> <span id="playAgain">Play again</span></h2>
       
        
    </section>

        
             <!--[if lt IE 7]>
                 <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
             <![endif]-->
     
        <script src="../rockpapercscissors.js"></script>
    
  </body>
</html>
