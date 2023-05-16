<?php
require_once ROOT . "/views/layouts/_header.php";
?>

<div class="container">
    
    <div class="col-xl-3 col-xl-3 col-md-6">
        <select class="form-select">
          <option selected>Отсортировать по:</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
    </div>
    
    <div data-js="pagination-content">
        <?= $this->todoAjax($page) ?>
    </div>
    
    <?php require_once ROOT . "/views/include/pagination.php"; ?>
</div>

<?php require_once ROOT . "/views/layouts/_footer.php"; ?>