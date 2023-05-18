<nav aria-label="Page navigation example" class="mt-4">
    <ul class="pagination">
        <li class="page-item<?= $page > 1 ? "" : " disabled"; ?>">
            <a href="<?= route_pagination($page - 1); ?>" class="page-link" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        
        <?php for ($i = 1; $i <= $countTaskPage; $i++): ?>
            <li class="page-item">
                <a href="<?= route_pagination($i) ?>" class="page-link">
                    <?= $i ?>
                </a>
            </li>
        <?php endfor; ?>
        
        <li class="page-item<?= $page < $countTaskPage ? "" : " disabled"; ?>">
            <a href="<?= route_pagination($page + 1) ?>" class="page-link" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>