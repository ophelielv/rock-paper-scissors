<?php

use \PHPUnit\Framework\TestCase;
use \RockPaperScissors\Game;
use \RockPaperScissors\Player;
use \RockPaperScissors\Weapon;

class GameTest extends PHPUnit_Framework_TestCase{
    
    public function testConstructorPlayer1AndPlayer2ArePlayers(){
        $player1 = new Player(1, "Player1");
        $player2 = new Player(2, "Player2");
        $game = new Game($player1, $player2);

        
        $this->assertTrue($game->getPlayer1() instanceof \RockPaperScissors\Player);
        $this->assertTrue($game->getPlayer2() instanceof \RockPaperScissors\Player);
    }
    

    public function testWinnerNameWhenGameNotPlayedYet(){

        $player1 = new Player(1, "Player1");
        $player2 = new Player(2, "Player2");
        
        $rock =  new Weapon("rock",array( array('crushes','scissors'), array('crushes','lizard')));
        $player1->setWeapon($rock);
        
        $game = new Game($player1, $player2);
        
        $result = $game->play();
        
        $this->assertSame($result,"Error");
        $this->assertNull($game->getWinnerName());
 
    }
    
    public function testPlayRockVsRock(){
        $rock =  new Weapon("rock",array( array('crushes','scissors'), array('crushes','lizard')));
        
        $player1 = new Player(1, "Player1");
        $player2 = new Player(2, "Player2");
        $player1->setWeapon($rock);
        $player2->setWeapon($rock);
 
        $game = new Game($player1, $player2);
        
        $result = $game->play();
        
        $this->assertSame($result, "It's a tie !");
        $this->assertSame($game->getWinnerName(), "It's a tie !");
 
    }
    
    public function testPlayPaperVsRock(){
        $rock =  new Weapon("rock",array( array('crushes','scissors'), array('crushes','lizard')));
        $paper = new Weapon ("paper",array( array('covers','rock'), array('disproves','spock')));
        
        $futureWinner = new Player(1, "future winner");
        $futureWinner->setWeapon($paper);
        
        $futureLooser = new Player(2, "future looser");
        $futureLooser->setWeapon($rock);
        
        $game = new Game($futureLooser, $futureWinner);
        
        $result = $game->play();
        
        $this->assertSame($result, "Paper covers Rock : future winner wins !");
        $this->assertSame($game->getWinnerName(), "future winner");
 
        
    }
    
    public function testPlayRockVsPaper(){
        $rock =  new Weapon("rock",array( array('crushes','scissors'), array('crushes','lizard')));
        $paper = new Weapon ("paper",array( array('covers','rock'), array('disproves','spock')));
        
        $futureWinner = new Player(1, "future winner");
        $futureWinner->setWeapon($paper);
        
        $futureLooser = new Player(2, "future looser");
        $futureLooser->setWeapon($rock);
        
        $game = new Game($futureWinner, $futureLooser);
        
        $result = $game->play();
        
        $this->assertSame($result, "Paper covers Rock : future winner wins !");
        $this->assertSame($game->getWinnerName(), "future winner");
 
        
    }
}
