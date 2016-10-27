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
        $file = __DIR__ . '/' . $class . '.php';
        if(file_exists($file)){
            require $file;
        }

    }
    

}