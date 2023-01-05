<?php

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../../index.html');
	exit;
}

// (A) SETTINGS - CHANGE TO YOUR OWN !
error_reporting(E_ALL & ~E_NOTICE);
define("DB_HOST", "localhost");
define("DB_NAME", "battlechips");
define("DB_CHARSET", "utf8");
define("DB_USER", "Filiper");
define("DB_PASSWORD", "qwerty");

$nome = $_SESSION['nome'];

// (B) CONNECT TO DATABASE
try {
  $pdo = new PDO(
    "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME, 
    DB_USER, DB_PASSWORD
  );
} catch (Exception $ex) { exit($ex->getMessage()); }

// (C) GET USERS
$stmt = $pdo->prepare("SELECT id FROM `accounts` WHERE nome='$nome'");
$stmt->execute();
$users = $stmt->fetchAll();
foreach ($users as $u) {
  printf("-%u %s", $u['id'], $nome);
}

// (D) CLOSE DATABASE CONNECTION
$pdo = null;
$stmt = null;

?>