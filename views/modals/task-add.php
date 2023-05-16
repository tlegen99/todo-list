<!-- Modal -->
<div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Новая задача</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/task/create" method="POST" data-js="ajax-form">
                    <div class="mb-3">
                        <label for="nameUser" class="form-label">Имя пользователя</label>
                        <input type="text" name="name_user" class="form-control" id="nameUser">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email пользователя</label>
                        <input type="email" name="email" class="form-control" id="email"
                               aria-describedby="emailHelp"
                        >
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Описание задачи</label>
                        <textarea name="description" class="form-control" id="description"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">
                        Добавить
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>