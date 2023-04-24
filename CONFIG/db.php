<?php

$dns = 'mysql:host=127.0.0.1:3306;dbname=gueram_compare_operator';
$user = 'gueram';
$password = 'Canisdirus2@9';

try {
    $db = new PDO($dns, $user, $password);

} catch (Exception $message) {
    echo "There is an issue <br>" . "<pre>$message</pre>";
}

return $db;
