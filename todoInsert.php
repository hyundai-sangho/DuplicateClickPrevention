<?php

require_once "database.php";

$todoName = $_GET["todoName"];

$db = new Database();

$result = $db->todoInsert($todoName);

if ($result == true) {
  echo "데이터가 성공적으로 입력되었습니다.";
  exit;
} elseif ($result == false) {
  echo "데이터가 입력되지 않았습니다.";
  exit;
}

?>
