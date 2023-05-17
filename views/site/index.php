<?php
require_once ROOT . "/views/layouts/_header.php";
?>

<div class="container">

    <?php session_flash(); ?>
    
    <div class="col-xl-3 col-xl-3 col-md-6">
        <select class="form-select">
          <option selected>Отсортировать по:</option>
          <option value="1">имя пользователя</option>
          <option value="2">email</option>
          <option value="3">статус</option>
        </select>
    </div>
    
    <div class="col-xl-9 col-sm-12">
        <?php foreach ($taskList as $task): ?>
            <?php include ROOT . "/views/include/task-item.php"; ?>
        <?php endforeach; ?>
    </div>
    
    <?php require_once ROOT . "/views/include/pagination.php"; ?>
</div>

<?php require_once ROOT . "/views/layouts/_footer.php"; ?>