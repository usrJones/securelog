<?php
session_start();

$GLOBALS['config'] = array(
    'mysql'     => array(
        'host'          => '127.0.0.1',
        'username'      => 'root',
        'password'      => '',
        'db'            => 'secure_login'
    ),
    'remember'  => array(
        'cookie_name'   => 'hash',
        'cookie_expiry' => 604800
    ),
    'session'   => array(
        'session_name'  => 'user',
        'token_name'    => 'token'
    )
);

// autoloaderi
spl_autoload_register(function($class) {
    require_once 'classes/' . $class . '.php'; 
});

require_once 'functions/sanitize.php';

// tarkistaa kekseistä, että onko jengi tikannut "remember me" checkboxin
if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DBrobots::getInstance()->get('users_session', array('hash', '=', $hash));
    
    if($hashCheck->count()) {
        $user = new User($hashCheck->firstResult()->user_id);
        $user->login();
    }
}