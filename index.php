<?php

require_once "database.php";

$db = new Database();
$results = $db->getTodoName();

?>

<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD 만들기</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>


    <div class="container">
      <h1 class="text-center mb-3s">CRUD</h1>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">할 일</th>
            <th scope="col">조회수</th>
          </tr>
        </thead>
        <?php foreach ($results as $result): ?>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td class="todoName" data-id="<?= $result['id'] ?>" data-views="<?= $result['views'] ?>">
                <?= $result['name'] ?>
              </td>
              <td>
                <?= $result['views'] ?>
              </td>
            </tr>
          </tbody>
        <?php endforeach; ?>
      </table>

      <div class='text-center'>
        <form action="#">
          <input type="text" id="todoNameText" required>
          <button id="todoButton">할 일 등록</button>
        </form>
      </div>
    </div>


    <script src="main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
