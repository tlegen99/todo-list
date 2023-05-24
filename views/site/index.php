<?php require_once ROOT . "/views/layouts/_header.php"; ?>
    
    <div class="container">
        
        <?php session_flash(); ?>
        
        <?php if(!empty($taskList)): ?>
            <div class="col-xl-3 col-md-6">
                <select class="form-select" data-js="sort-task-select">
                    <?= options_task($countTaskPage) ?>
                </select>
            </div>
            
            <div class="col-xl-9 col-sm-12">
                <?php foreach ($taskList as $task): ?>
                    <?php include ROOT . "/views/include/task-item.php"; ?>
                <?php endforeach; ?>
            </div>
            
            <?php include_pagination($page, $countTaskPage); ?>
        <?php else: ?>
            Задач на данный момент нет
        <?php endif; ?>
    </div>

<?php require_once ROOT . "/views/layouts/_footer.php"; ?>