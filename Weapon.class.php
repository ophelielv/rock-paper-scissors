<?php
class Weapon
{
    private $name;
    private $win_against; 
    
    public function __construct($name, $win_against) 
    {
        $this->name = $name;
        $this->win_against = $win_against;
    }
    
    public function displayWeapon(){
        echo '<span class="chooseWeapon" name="'. $this->name . '" id="'. $this->name. '">' . $this->name . '</span> ';
    }

    public function getName(){
        return $this->name;
    }


    static function randomWeapon(){
        $randomKey = array_rand($_SESSION["weaponList"],1);
        $randomWeapon = new Weapon($_SESSION["weaponList"][$randomKey]["name"],$_SESSION["weaponList"][$randomKey]["win_against"]);
        return $randomWeapon;
    }
    
    static function checkWeaponAutorized($weaponNameToCheck){

        foreach ($_SESSION["weaponList"] as $weapon){
            if($weaponNameToCheck === $weapon["name"]){
                $chosenWeapon = new Weapon( $weapon["name"],  $weapon["win_against"],true);
                return $chosenWeapon;
            }
        }
        return false;
    
    }
    
    static function checkWeapon($weapon){
        var_dump($weapon);
        return true;
    }
    
    static function setWinner($weapon1, $weapon2){
        if($weapon1->name === $weapon2->name){
        //    var_dump("egalité");
            return "It's a tie !";
        }
        else if($weapon1->name === $weapon2->win_against){
        //    var_dump($weapon2->name);
            return $weapon2->name;
           
        }
        else if($weapon2->name === $weapon1->win_against){
        //    var_dump($weapon1->name);
            return $weapon1->name;
        }
        else{
        //    var_dump("error");
            return false;
        }
    }
}