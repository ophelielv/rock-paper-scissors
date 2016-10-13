<?php
    session_start();
    require '../Weapon.class.php';
    
    header('Content-Type: application/json');
     
    $weaponName = isset($_POST['weaponName'])? $_POST['weaponName'] : '';
    $chosenWeapon = Weapon::checkWeaponAutorized($weaponName);

    $computerWeapon = Weapon::randomWeapon();
   // Weapon::checkWeapon($chosenWeapon);
  //  Weapon::checkWeapon($computerWeapon);
    $resultWeaponName = Weapon::setWinner($chosenWeapon,$computerWeapon);

    if($resultWeaponName === $chosenWeapon->getName()){
      $winner = "Player";
    }
    else if ($resultWeaponName === $computerWeapon->getName()){
      $winner = "Computer";
    }
    else{
      $winner = $resultWeaponName;
    }
    
    $data = array ( "computer" => $computerWeapon->getName(),
                    "winner" => $winner
                    );


    echo json_encode($data);
