<?php
//source of this script: http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
function sec_session_start() {
    $session_name = 'sec_session_id';   // Set a custom session name
    $secure = false;
    // This stops JavaScript being able to access the session id.
     $httponly = true;
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: session_error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
    // Sets the session name to the one set above.
    session_name($session_name);
    session_start();            // Start the PHP session 
    session_regenerate_id();    // regenerated the session, delete the old one. 
}
//use of example: 
/**
 $_SESSION['user_id'] = "sdfdsfds"
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];
*/