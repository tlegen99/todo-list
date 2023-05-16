<nav aria-label="Page navigation example" class="mt-4">
    <ul class="pagination" data-js="pagination">
        <li class="page-item<?= $page > 1 ? "" : " disabled"; ?>">
            <a href="/todo/page-<?= $page - 1; ?>" class="page-link" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        
        <?php
            $i = 0;
            while ($i < $countTaskPage) {
            $i++;
        ?>
            <li class="page-item">
                <a href="/todo/page-<?= $i ?>" class="page-link">
                    <?= $i ?>
                </a>
            </li>
        <?php } ?>
        
        <li class="page-item<?= $page < $countTaskPage ? "" : " disabled"; ?>">
            <a href="/todo/page-<?= $page + 1; ?>" class="page-link" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>