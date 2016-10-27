<?php 

use PHPUnit\Framework\TestCase;
use \RockPaperScissors\Autoloader;
use \RockPaperScissors\Weapon;


require_once __DIR__.'/../src/classes/Autoloader.php'; 
Autoloader::register(); 

    
class WeaponTest extends PHPUnit_Framework_TestCase{

    public function testWeaponGetName(){
        $weapon = new Weapon("spock", array(  array('vaporizes','rock'), array('smashes','scissors')));
        $this->assertSame("spock",$weapon->getName());
    }
    
    public function testDisplayWeaponInSpan() 
    {
        $weapon = new Weapon(   "spock", array( array('vaporizes','rock'), array('smashes','scissors')));
        $resultExpected = '<span class="chooseWeapon" name="spock" id="spock"><i class="fa fa-hand-spock-o" aria-hidden="true"></i><br>spock</span> ';
        $this->assertSame($weapon->displayWeapon(),$resultExpected);
    }
    
    public function testChooseRandomWeapon(){
        $randomWeapon = Weapon::randomWeapon();
        $this->assertContains($randomWeapon->getName(),["rock","paper","scissors","lizard","spock"]);
        $this->assertTrue($randomWeapon instanceof \RockPaperScissors\Weapon);
        
    }
    
    public function testCheckIfWeaponAuthorizedWithTrueName(){
        $weapon = Weapon::checkWeaponAutorized("spock");
        $spock =  new Weapon("spock", array( array('vaporizes','rock'), array('smashes','scissors')));
        $this->assertEquals($weapon, $spock);
    }
    
    public function testCheckIfWeaponAuthorizedWithFalseName(){
        $weapon = Weapon::checkWeaponAutorized("thom");
        $this->assertFalse($weapon);  
    }
    
    public function testWhoWinRockOrScissors(){
        $rock =  new Weapon("rock",array( array('crushes','scissors'), array('crushes','lizard')));
        $scissors = new Weapon("scissors",array( array('cuts','paper'), array('decapitates','lizard')));
        $result = Weapon::setWinner($rock,$scissors);
        $this->assertSame($result,$rock);
    }
    
    public function testWhoWinRockOrPaper(){
        $rock =  new Weapon("rock",array( array('crushes','scissors'), array('crushes','lizard')));
        $paper = new Weapon ("paper",array( array('covers','rock'), array('disproves','spock')));
        $result = Weapon::setWinner($rock,$paper);
        $this->assertSame($result,$paper);        
    }
    
    public function testWhoWinRockOrRock(){
        $rock =  new Weapon("spock",array( array('crushes','scissors'), array('crushes','lizard')));
        $result = Weapon::setWinner($rock,$rock);
        $this->assertSame($result,array($rock,$rock));        
    }
    
    public function testDisplayResult(){
        $rock =  new Weapon("rock",array( array('crushes','scissors'), array('crushes','lizard')));
        $paper = new Weapon ("paper",array( array('covers','rock'), array('disproves','spock')));
        $result = Weapon::displayResult($paper, $rock);
        $this->assertSame($result,"Paper covers Rock");
    }
    
    public function testDisplayResultEquality(){
        $rock =  new Weapon("rock",array( array('crushes','scissors'), array('crushes','lizard')));
        $result = Weapon::displayResult($rock,$rock);
        $this->assertFalse($result);
    }

}

