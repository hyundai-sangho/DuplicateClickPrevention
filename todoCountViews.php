<?php

require_once "database.php";

session_start();

$views = $_GET["views"];
$id = $_GET["id"];

$_SESSION["count" . $id] = $_SESSION["count" . $id] ?? null;

if ($_SESSION["count" . $id]) {
  return false;
} else {
  $db = new Database();
  $result = $db->countViews($views, $id);

  $_SESSION["count" . $id] = $id;

  echo $result;
}


?>
