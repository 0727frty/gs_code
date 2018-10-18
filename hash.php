<?php

$message = "test";
$pw =  password_hash($message, PASSWORD_DEFAULT);
echo $pw."<br/>";


?>