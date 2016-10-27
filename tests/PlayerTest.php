<?php
use \PHPUnit\Framework\TestCase;
use \RockPaperScissors\Autoloader;
use \RockPaperScissors\Weapon;
use \RockPaperScissors\Player;

class PlayerTest extends PHPUnit_Framework_TestCase{
    
    public function testIfReadyWhenActuallyReady(){
        $spock = new Weapon("spock", array( array('vaporizes','rock'), array('smashes','scissors')));
        $player = new Player(1, "Player");
        $player->setWeapon($spock);
        $this->assertTrue($player->isReady());
        
    }
  
    public function testIfReadyWhenNotReady(){
        $spock = new Weapon("spock", array( array('vaporizes','rock'), array('smashes','scissors')));
        $player = new Player(1, "Player");

        $this->assertFalse($player->isReady());
        
    }
    
    public function testIdIsNumber(){
        $spock = new Weapon("spock", array( array('vaporizes','rock'), array('smashes','scissors')));
        $player = new Player(1, "Player");
        $this->assertInternalType("int", $player->getId());
        
    }
    
    public function testInitSetWeaponToNull(){
        $spock = new Weapon("spock", array( array('vaporizes','rock'), array('smashes','scissors')));
        $player = new Player(1, "Player");
        $player->setWeapon($spock);
        $player->initWeapon();
        $this->assertNull($player->getWeapon());
    }
    
    public function testSetWeaponIsNotNull(){
        $spock = new Weapon("spock", array( array('vaporizes','rock'), array('smashes','scissors')));
        $player = new Player(1, "Player");
        $player->setWeapon($spock);
        $this->assertNotNull($player->getWeapon());
    }
    
        
    public function testSetWeaponIsFromClassWeapon(){
        $spock = new Weapon("spock", array( array('vaporizes','rock'), array('smashes','scissors')));
        $player = new Player(1, "Player");
        $player->setWeapon($spock);
        $this->assertTrue($player->getWeapon() instanceof \RockPaperScissors\Weapon);
    }
    
    
    public function tesPlayerGetName(){
        $player = new Player(1, "Player");
        $this->assertSame("Player",$player->getName());
    }
   
}