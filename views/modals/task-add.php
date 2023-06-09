<!-- Modal Task -->
<div class="modal fade" id="taskAddModal" tabindex="-1" aria-labelledby="taskAddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taskAddModalLabel">Новая задача</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= route("task/create") ?>" method="POST" data-js="form-validate">
                    <input type="hidden" name="MySessionId">
                    <div class="mb-3">
                        <label for="nameUser" class="form-label">Имя пользователя</label>
                        <input type="text" name="name_user" class="form-control" id="nameUser" data-validate="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email пользователя</label>
                        <input type="email" name="email" class="form-control" id="email"
                               aria-describedby="emailHelp" data-validate="email"
                        >
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Описание задачи</label>
                        <textarea rows="6" name="description" class="form-control"
                                  id="description" data-validate="description"
                        ></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">
                        Добавить
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>