<div class="card mt-4">
    <?php if ($task["status"]): ?>
        <div class="card-header text-success">
            <span>Выполнено</span>
            <i class="fa fa-pencil-square-o"></i>
        </div>
    <?php else: ?>
        <div class="card-header text-danger">
            <span>В процессе</span>
            <a href="<?= route("task/update/{$task["id"]}"); ?>" class="card-header__update">
                ✏️
            </a>
        </div>
    <?php endif; ?>
    <div class="card-body">
        <h5 class="card-title"><?= $task["name_user"] ?></h5>
        <div class="card-subtitle text-info"><?= $task["email"] ?></div>
        <p class="card-text mt-2"><?= $task["description"] ?></p>
    </div>
</div>