<?php
namespace RockPaperScissors;

/**
 * Class Weapon
 */
class Weapon
{
    
    private $name;
    /**
     * Tableau des actions possibles sur chaque adversaire
     * @array
     */
    private $win_against; 
    
    public function __construct($name, $win_against) 
    {
        $this->name = $name;
        $this->win_against = $win_against;
    }
    
    public function displayWeapon(){
        echo '<span class="chooseWeapon" name="'.$this->name .'" id="'.$this->name.'"><i class="fa fa-hand-'.$this->name .'-o" aria-hidden="true"></i><br>' . $this->name . '</span> ';
    
        /* 
        <i class="fa fa-hand-spock-o" aria-hidden="true"></i>
        <i class="fa fa-hand-lizard-o" aria-hidden="true"></i>
        <i class="fa fa-hand-rock-o" aria-hidden="true"></i>
        <i class="fa fa-hand-paper-o" aria-hidden="true"></i>
        <i class="fa fa-hand-scissors-o" aria-hidden="true"></i>*/
    }
        
    public function __toString()
    {
        return "\nWeapon // name = $this->name \n";
    }

    public function getName(){
        return $this->name;
    }


    static function randomWeapon(){
        $weaponListObj = WeaponList::getInstance();
        $weaponListArray = $weaponListObj->getWeaponArray();
        
        $randomKey = array_rand($weaponListArray ,1);
        $randomWeapon = new Weapon($weaponListArray[$randomKey]["name"],$weaponListArray[$randomKey]["win_against"]);
       
        return $randomWeapon;
    }
    
    static function checkWeaponAutorized($weaponNameToCheck){
        $weaponListObj = WeaponList::getInstance();


        foreach ($weaponListObj->getWeaponArray() as $weapon){
            if($weaponNameToCheck === $weapon["name"]){
                $chosenWeapon = new Weapon( $weapon["name"],  $weapon["win_against"],true);
                return $chosenWeapon;
            }
        }
        return false;
    
    }
    
    static function checkWeapon($weapon){
        var_dump($weapon->name);
        return true;
    }
    
    static function setWinner($weapon1, $weapon2){
      /*  $this->weaponList = array(
            array(name => 'rock',       win_against => array( array('crushes','scissors'), array('crushes','lizard')    )),
            array(name => 'paper',      win_against => array( array('covers','rock'), array('disproves','spock')        )),
            array(name => 'scissors',   win_against => array( array('cuts','paper'), array('decapitates','lizard')      )),
            array(name => 'lizard',     win_against => array( array('eats','paper'), array('poisons','spock')           )),
            array(name => 'spock',      win_against => array( array('vaporizes','rock'), array('smashes','scissors')    ))
            );*/
        
        if($weapon1->name === $weapon2->name){
            return array($weapon1, $weapon2);
        }
        else if( ($weapon1->name === $weapon2->win_against[0][1]) || ($weapon1->name === $weapon2->win_against[1][1])){
            return $weapon2;
        }
        else if( ($weapon2->name === $weapon1->win_against[0][1]) || ($weapon2->name === $weapon1->win_against[1][1])){
            return $weapon1;
        }
        else{
            return false;
        }
    }
    
    
    static function displayResult($weaponWinner, $weaponLooser){
        if( $weaponLooser->name === $weaponWinner->win_against[0][1]){
            return ucfirst($weaponWinner->name) . " " . $weaponWinner->win_against[0][0] . " " . ucfirst($weaponWinner->win_against[0][1]);
           
        }
        else if ($weaponLooser->name === $weaponWinner->win_against[1][1]){
            return ucfirst($weaponWinner->name) . " " . $weaponWinner->win_against[1][0] . " " . ucfirst($weaponWinner->win_against[1][1]);
        }
        else{
            return false;
        }

    }
}