<?php
namespace RockPaperScissors;

/**
 * Class Autoloader
 */
class Autoloader{

    /**
     * Enregistre l'autoloader
     */
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }


    /**
     * Inclue le fichier correspondant à la classe
     * @param $class string Le nom de la classe à charger
     */
    static function autoload($class){
        $class = str_replace(__NAMESPACE__ . '\\', '', $class);
        require __DIR__ . '/' . $class . '.class.php';

    }
    

}