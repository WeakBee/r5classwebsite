<?php 
session_start();

$_SESSION = [];
session_unset();
session_destroy();

unset($_COOKIE['id']);
unset($_COOKIE['key']);
setcookie('id', null, time()-3600 , '/');
setcookie('key', null, time()-3600 , '/');

header("Location: ../login");
exit;

?>