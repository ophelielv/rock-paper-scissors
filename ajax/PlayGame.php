<?php
    use \RockPaperScissors\Autoloader;
    use \RockPaperScissors\Weapon;
    use \RockPaperScissors\Player;
    use \RockPaperScissors\Game;
    
    require '../classes/Autoloader.class.php'; 
    Autoloader::register(); 

    
    header('Content-Type: application/json');

    $weaponName = isset($_POST['weaponName'])? $_POST['weaponName'] : '';
    $chosenWeapon = Weapon::checkWeaponAutorized($weaponName);

    if($chosenWeapon === false){
      die("Error, weapon not recognized");
    }
    
    $player1 = new Player(1, "Player");
    $player1->setWeapon($chosenWeapon);
    
    $computer = new Player(2, "Computer");
    $computer->setWeapon(Weapon::randomWeapon());
    
    $game = new Game($player1, $computer);
    $result = $game->play();
 
    $data = array ( "computer" => $computer->getWeapon()->getName(),
                    "winner" => $game->getWinnerName(),
                    "result" => $result
                    );


    echo json_encode($data);
