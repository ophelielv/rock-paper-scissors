<?php
namespace RockPaperScissors;

/**
 * Class Service
 */
class Service {
 
  /**
   * @var Service
   * @access private
   * @static
   */
   private static $_instance = null;
   
   private static $pid;
   


   /**
    * Constructeur de la classe
    *
    * @param void
    * @return void
    */
    private function __construct() { 
        exec('php /home/ubuntu/workspace/service/service.php');
     /*   error_reporting(E_ALL);

        // Ajoute une redirection pour que vous puissiez lire stderr. 
        //$handle = popen( __DIR__ . '/../service/service.php', 'r');
        $handle = popen('/home/ubuntu/workspace/service/service.php', 'r');
        echo "'$handle'; " . gettype($handle) . " <br>";
        $read = fread($handle, 8181);
        echo $read;
        pclose($handle);*/
        
    }
    
 
   /**
    * Méthode qui crée l'unique instance de la classe
    * si elle n'existe pas encore puis la retourne.
    *
    * @param void
    * @return WeaponList
    */
   public static function getInstance() {
 
     if(is_null(self::$_instance)) {
       self::$_instance = new Service();  
     }
     return self::$_instance;
   }
}
 
?>