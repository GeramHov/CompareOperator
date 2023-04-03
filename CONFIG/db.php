<?php

$dns = 'mysql:host=57.128.65.58;dbname=polo_comparoperator';
$user = 'poloo';
$password = 'herobrine';

try {
    $db = new PDO($dns, $user, $password);
    // echo "connexion established" ;

} catch (Exception $message) {
    echo "There is an issue <br>" . "<pre>$message</pre>";
}

return $db;