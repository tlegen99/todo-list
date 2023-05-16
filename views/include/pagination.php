<nav aria-label="Page navigation example" class="mt-4">
    <ul class="pagination" data-js="pagination">
        <?php
            $i = 0;
            while ($i < $countTaskPage):
            $i++;
        ?>
            <li class="page-item">
                <a href="<?= route('todo/page-' . $i) ?>" class="page-link">
                    <?= $i ?>
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
</nav>