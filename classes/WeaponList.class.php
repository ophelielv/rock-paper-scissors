<?php
 
class WeaponList {
 
  /**
   * @var WeaponList
   * @access private
   * @static
   */
   private static $_instance = null;
   
                                    
    /**
     * @var weaponList
     * @access public
     * 
     */
    private $weaponList;
    

   /**
    * Constructeur de la classe
    *
    * @param void
    * @return void
    */
    private function __construct() { 
        $this->weaponList = array(
            array(name => 'rock',       win_against => array( array('crushes','scissors'), array('crushes','lizard')    )),
            array(name => 'paper',      win_against => array( array('covers','rock'), array('disproves','spock')        )),
            array(name => 'scissors',   win_against => array( array('cuts','paper'), array('decapitates','lizard')      )),
            array(name => 'lizard',     win_against => array( array('eats','paper'), array('poisons','spock')           )),
            array(name => 'spock',      win_against => array( array('vaporizes','rock'), array('smashes','scissors')    ))
            );
    }
    
    /**
    *
    * @param void
    * @return array
    */
    public function getWeaponArray(){
        return $this->weaponList;
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
       self::$_instance = new WeaponList();  
     }
     return self::$_instance;
   }
}
 
?>