<?php
session_start(); 

$host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'testproject';

$link = mysqli_connect($host,$db_user,$db_pass,$db_name);

if(!$link) {
    die("Echec de la connexion: ". mysqli_connect_error());
}
?>