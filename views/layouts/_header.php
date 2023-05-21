<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Приложение-задачник</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" type="text/css">
</head>
<body>

<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#taskModal">
                Добавить задачу
            </button>
        </div>

        <div class="col-md-3 text-end">
            <a href="<?= route("login") ?>" class="btn btn-primary">Войти как администратор</a>
        </div>
    </header>
</div>