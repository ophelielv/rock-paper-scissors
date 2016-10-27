<?php
namespace RockPaperScissors;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

use RockPaperScissors\Player;

    
require 'Autoloader.php'; 
Autoloader::register(); 


/**
 * Classe Multiplayers
 */ 
class Multiplayers implements MessageComponentInterface {
  

    protected $clients;
    protected $player1;
    protected $player2;
    protected $numRecv;
  
    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->numRecv = 0;
        $this->player1 = null;
        $this->player2 = null;
    }
  
    public function onOpen(ConnectionInterface $conn) {
        
        if($this->numRecv >= 2){
            $conn->send(sprintf('Only two players authorized'));
            return false;
        } 
    
        // Store the new connection to send messages to later
        $this->clients->attach($conn);
  
        echo "New connection! ({$conn->resourceId})\n";
        $this->numRecv = count($this->clients) ;
  
        $newPlayerName = "";
        
        //Gère la connection/déconnection de player1 et player2
        if($this->numRecv == 1 && $this->player1 === null && $this->player2 === null){
            $this->player1 = new Player($conn->resourceId , "Player 1");
            $newPlayerName = $this->player1->getName();
            $conn->send(sprintf("Welcome ". $this->player1->getName(). ", waiting for other player "));
            echo "PLAYER1 created on open : $this->player1 \n";
        }
        else if($this->numRecv == 2 && $this->player1 === null && $this->player2 !== null){
            $this->player1 = new Player($conn->resourceId, "Player 1");
            $newPlayerName = $this->player1->getName();
            $conn->send(sprintf("Welcome " . $this->player1->getName() . ", " . $this->player2->getName(). " is online"));
            echo "PLAYER1 created on open (2) : $this->player1 \n";
        }
        else if($this->numRecv == 2 && $this->player1 !== null && $this->player2 === null){
            $this->player2 = new Player($conn->resourceId, "Player 2");
            $newPlayerName = $this->player2->getName();
            $conn->send(sprintf("Welcome ". $this->player2->getName() . ", " . $this->player1->getName(). " is online"));
            echo "PLAYER2 created on open : $this->player2 \n";
        }
  
        // And tell the other clients about the new user.
        foreach ($this->clients as $client) {
            if ($conn !== $client) {
                $client->send(sprintf("$newPlayerName is connected"));
            }
        
        }
    }
  
    public function onMessage(ConnectionInterface $from, $msg) {
      
        echo 'message reçu : ' . $msg . '\n';
        
        //si l'un des joueurs n'est pas connecté
        if(!is_object($this->player1) || !is_object($this->player2)){
            $from->send(sprintf("... still waiting for other player"));
            return;
        }
        
        //$msg = nom du weapon choisi
        $selectedWeapon = Weapon::checkWeaponAutorized($msg);
        if($this->player1->getId() === $from->resourceId)
        {
            $this->player1->setWeapon($selectedWeapon);
        }
        else if($this->player2->getId() === $from->resourceId)
        {
            $this->player2->setWeapon($selectedWeapon);
        }

        
        if($this->player1->isReady() && $this->player2->isReady())
        {

            $game = new Game($this->player1, $this->player2);
            $result = $game->play();
            
            $data = array ( "winner" => $game->getWinnerName(),
                            "result" => $result
                          );
                        
            foreach ($this->clients as $client) {
                
                if ($this->player1->getId() === $client->resourceId) {
                    $data["opponent"] = $this->player2->getWeapon()->getName();
                }
                else if ($this->player2->getId() === $client->resourceId) {
                    $data["opponent"] = $this->player1->getWeapon()->getName();
                }
                
                $client->send(sprintf(json_encode($data)));

            }
            
            $this->player1->initWeapon();
            $this->player2->initWeapon();
        }

    }
  
    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it
        // messages.
        $this->clients->detach($conn);
        $this->numRecv = count($this->clients);
        echo "Connection {$conn->resourceId} has disconnected\n";
        
        $returnSentence = "";
  
        if(is_object($this->player1) && $this->player1->getId() == $conn->resourceId){
            $returnSentence = $this->player1->getName() . " is disconnected";
            echo $returnSentence;
            $this->player1 = null;
        }
        
        if(is_object($this->player2) && $this->player2->getId() == $conn->resourceId){
            $returnSentence = $this->player2->getName() . " is disconnected";
            echo $returnSentence;
            $this->player2 = null;
        }
        
        // And tell the other clients about the new user.
        foreach ($this->clients as $client) {
            if ($conn !== $client) {
                $client->send(sprintf($returnSentence));
            }
        
        }
    }
  
    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";
    
        $conn->close();
        $this->numRecv = count($this->clients);
      }
}