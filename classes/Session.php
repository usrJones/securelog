<?php

class Session {
    public static function exists($name) {
        //if teh token is set, then true, otherwise false
        return (isset($_SESSION[$name])) ? true:false;
    }
    
    public static function put($name, $value) {
        return $_SESSION[$name] = $value;
    }
    
    public static function get($name) {
        return $_SESSION[$name];
    }
    
    public static function delete($name) {
        if(self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }
    
    // fläshää sivun/merkkijonon, esim "kirjauduttu onnistuneesti"
    // seuraavan kerran ku f5, niin häipyy
    public static function flash($name, $string = '') {
        if(self::exists($name)) {
            $session = self::get($name);
            self::delete($name);
            return $session;
        } else {
            self::put($name, $string);
        }
        return '';
    }
}
