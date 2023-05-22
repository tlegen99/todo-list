<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Приложение-задачник</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/main.css" type="text/css">
</head>
<body>

<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#taskAddModal">
                Добавить задачу
            </button>
        </div>
        
        <?php if (!check_admin()): ?>
            <div class="col-md-3 text-end">
                <a href="<?= route("admin/login") ?>" class="btn btn-primary">Войти как администратор</a>
            </div>
        <?php else: ?>
            <div class="col-md-3 text-end">
                <a href="<?= route("admin/logout") ?>" class="btn btn-primary">Выйти</a>
            </div>
        <?php endif; ?>
    </header>
</div>