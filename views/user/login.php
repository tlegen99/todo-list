<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" type="text/css">
</head>
<body>
    
    <div class="container">
        <div class="col-xl-4 col-md-6 mt-5">
            <?php session_flash(); ?>
            
            <form action="<?= route("login") ?>" method="POST">
                <input type="hidden" name="MySessionId">
                <div class="mb-3">
                    <label for="name" class="form-label">Логин пользователя</label>
                    <input type="text" name="name" class="form-control" id="name">
                    <?php if (isset($errorName)): ?>
                        <div class="error text-danger"><?= $errorName ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input name="password" type="password" class="form-control" id="password">
                    <?php if (isset($errorPass)): ?>
                        <div class="error text-danger"><?= $errorPass ?></div>
                    <?php endif; ?>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">
                    Войти
                </button>
            </form>
        </div>
    </div>

</body>
</html>
