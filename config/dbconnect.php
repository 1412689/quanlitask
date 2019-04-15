<?php
function connect()
{
    $user = "quanlitask";
    $pass = "quanlitask";
    $db = "quanlitask";	
    $mysqli = new mysqli("localhost", $user, $pass, $db );
    if ($mysqli->connect_errno )
    {
        die( "Couldn't connect to MySQL" );
    }
    return $mysqli;

}
?>
