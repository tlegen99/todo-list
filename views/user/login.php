<?php require_once ROOT . "/views/layouts/_header.php"; ?>
    
    <div class="container">
        <div class="col-xl-4 col-md-6">
            <form action="<?= route("login") ?>" method="POST" data-js="form-validate">
                <input type="hidden" name="MySessionId">
                <div class="mb-3">
                    <label for="nameUser" class="form-label">Логин пользователя</label>
                    <input type="text" name="name" class="form-control" id="nameUser">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input name="password" type="password" class="form-control" id="password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">
                    Войти
                </button>
            </form>
        </div>
    </div>

<?php require_once ROOT . "/views/layouts/_footer.php"; ?>
