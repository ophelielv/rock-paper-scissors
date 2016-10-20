<?php
namespace RockPaperScissors;

use \RockPaperScissors\Weapon;

/**
 * Class Weapon
 */
class Game
{
    
    private $player1;
    private $player2;
    private $winnerName;

    /**
    * Constructeur de la classe
    *
    * @param $player1 instance de player 
    * @param $player2 instance de player
    * @return void
    */
    public function __construct($player1, $player2) 
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }
    
    /**
    * Renvoie le nom du vainqueur
    *
    * @return string
    */
    public function getWinnerName(){
        return $this->winnerName;
    }

    /**
    * Constructeur de la classe
    * 
    * Player1 et player2 sont chargés, compare les jeux, donne le nom du vainqueur
    * et retourne la phrase résultat qui sera affichée
    * @return string
    */
    public function play(){

        $winningWeapon = Weapon::setWinner($this->player1->getWeapon(),$this->player2->getWeapon());
        $resultSentence = "";
        
        if (is_array($winningWeapon)){
          $resultSentence = "It's a tie !";
          $this->winnerName = "It's a tie !";
        }
        else if($winningWeapon === $this->player1->getWeapon()){
          $resultSentence = Weapon::displayResult($this->player1->getWeapon(), $this->player2->getWeapon()) . " : ". $this->player1->getName() . " wins !";
          $this->winnerName = $this->player1->getName();
        }
        else if($winningWeapon === $this->player2->getWeapon()){
          $resultSentence = Weapon::displayResult($this->player2->getWeapon(),$this->player1->getWeapon()) . " : ". $this->player2->getName() . "  wins !";
          $this->winnerName = $this->player2->getName();
        }
        else{
          $resultSentence = "Error";
        }
        
            
        return $resultSentence;
    }

    /**
    * Initialise la partie
    * 
    * Initialise player1, player2 et winnerName à null
    */
    public function initGame(){
        $this->player1 = null;
        $this->player2 = null;
        $this->winnerName = null;
    }
    
}