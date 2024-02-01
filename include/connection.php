<?php
defined('BASEPATH') or die("No access direct allowed");

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'e_vote';

$con  = new mysqli($host, $user, $pass, $db);

if ($con->connect_error) {
   die("Koneksi database gagal: " . $con->connect_error);
}
?>
