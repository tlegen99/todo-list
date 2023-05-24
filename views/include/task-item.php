<div class="card mt-4">
    <div class="card-header">
        <?= \models\Task::getTaskStatus($task["id"]); ?>
        <?php if ($task["edited_admin"]): ?>
            <div class="card-edited__admin">Отредактировано администратором</div>
        <?php endif; ?>
        <?php if (check_admin()): ?>
            <a href="<?= route("task/update/{$task["id"]}"); ?>" class="card-header__update">
                ✏️
            </a>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <h5 class="card-title"><?= $task["name_user"] ?></h5>
        <div class="card-subtitle text-info"><?= $task["email"] ?></div>
        <div class="card-text mt-2"><?= $task["description"] ?></div>
    </div>
</div>