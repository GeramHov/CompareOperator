<?php

$dns = 'mysql:host=localhost;dbname=CompareOperator';
$user = 'root';
$password = '';

try {
    $db = new PDO($dns, $user, $password);

} catch (Exception $message) {
    echo "There is an issue <br>" . "<pre>$message</pre>";
}

return $db;