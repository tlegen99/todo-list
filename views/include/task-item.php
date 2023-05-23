<div class="card mt-4">
    <div class="card-header">
        <?= \models\Task::getTaskStatus($task["id"]); ?>
        <a href="<?= route("task/update/{$task["id"]}"); ?>" class="card-header__update">
            ✏️
        </a>
    </div>
    <div class="card-body">
        <h5 class="card-title"><?= $task["name_user"] ?></h5>
        <div class="card-subtitle text-info"><?= $task["email"] ?></div>
        <p class="card-text mt-2"><?= $task["description"] ?></p>
    </div>
</div>