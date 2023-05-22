<?php require_once ROOT . "/views/layouts/_header.php"; ?>
    
    <div class="container">
        <div class="col-xl-6 col-sm-8">
            <form action="#" method="POST" data-js="form-validate">
                <input type="hidden" name="MySessionId">
                <div class="mb-3 col-2">
                    <label for="nameId" class="form-label">ID</label>
                    <input type="number" name="name_user" class="form-control" id="nameId"
                           value="<?= $task["id"] ?>" disabled
                    >
                </div>
                <div class="mb-3 col-md-6">
                    <label for="nameUser" class="form-label">Имя пользователя</label>
                    <input type="text" name="name_user" class="form-control" id="nameUser"
                           value="<?= $task["name_user"] ?>" data-validate="name"
                    >
                </div>
                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">Email пользователя</label>
                    <input type="email" name="email" class="form-control" id="email"
                           value="<?= $task["email"] ?>" data-validate="email"
                    >
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Описание задачи</label>
                    <textarea rows="10" name="description" class="form-control"
                              id="description" data-validate="description"
                    ><?= $task["description"] ?>
                    </textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">
                    Добавить
                </button>
            </form>
        </div>
    </div>

<?php require_once ROOT . "/views/layouts/_footer.php"; ?>