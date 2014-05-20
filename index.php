<?php
require_once 'core/init.php';

//echo Config::get('mysql/host'); // 127.0.0.1
// mysql/host
// mysql/username
// mysql/password
// mysql/db

// remember/cookie_name
// remember/cookie_expiry

// session/session_name
// session/token_name

// nää kaikki ylemmät tulee pyynnöstä, kato vielä toi tietoturva



// Hakee kaikki rivit
//$user = DBrobots::getInstance()->getEmAll('users');

//if(!$user->count()) {
//    echo 'No user';
//} else {
//    foreach($user->results() as $user) {
//        echo $user->username, '<br />';
//    }
//}



// firstResult metodi esim
//$user = DBrobots::getInstance()->get('users', array('username', '=', 'Dumbo'));

//if(!$user->count()) {
//    echo 'No user';
//} else {
//    echo $user->firstResult()->username;
//}



// insert esim
//$user = DBrobots::getInstance()->insert('users', array(
//    'username'  => 'Jontteri',
//    'password'  => 'password',
//    'salt'      => 'salt'
//));

//if($userInsert) {
//    // echo 'Successfully inserted!';
//} else {
//    // echo 'Boo-hoo!';
//}


// update esim
//$user = DBrobots::getInstance()->update('users', 3, array(
//    'password'  => 'newpassword',
//    'name'      => 'newname'
//));


// flash metodi esim
if(Session::exists('home')) {
    echo '<p>' . Session::flash('home') . '</p>';
}

// printtaa käyttäjän id:n
//echo Session::get(Config::get('session/session_name'));

$user = new User(); // current
//$user = new User(6);
//echo $user->data()->username;

if($user->isLoggedIn()) {
?>
<p>Hello <a href="#"><?php echo escape($user->data()->username); ?></a></p>

<ul><li><a href="logout.php">Logout</a></li></ul>
<?php
} else {
    echo '<p>You need to <a href="login.php">login</a> or <a href="register.php">register</a></p>';
}

// iso committi
