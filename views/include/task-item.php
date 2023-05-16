<div class="card mt-4">
    <?php if ($task["status"]): ?>
        <div class="card-header text-success">
            Выполнено
        </div>
    <?php else: ?>
        <div class="card-header text-danger">
            В процессе
        </div>
    <?php endif; ?>
    <div class="card-body">
        <h5 class="card-title"><?= $task["name_user"] ?></h5>
        <div class="card-subtitle text-info"><?= $task["email"] ?></div>
        <p class="card-text mt-2"><?= $task["description"] ?></p>
    </div>
</div>