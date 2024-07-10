<?php
session_start(); 
$logged_in = $_SESSION['logged_in'] ?? false;

$email = 'example@email.com';
$password = 'password';

function login()
{
 session_regenerate_id(true);
 $_SESSION['logged_in'] = true;
}

function logout()
{
 $_SESSION = [];

 // The session cookie is updated, the session ID is replaced by a blank string, 
 // and the expiry date is set to the past so the browser stops sending it.
 $params = session_get_cookie_params();
 setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

 session_destroy();
}

function require_login($logged_in)
{
 // If user is not logged in, send them to the login page
 // and stop the rest of the page from loading.
 if ($logged_in == false) {
  header('Location: login.php');
  exit;
 }
}
