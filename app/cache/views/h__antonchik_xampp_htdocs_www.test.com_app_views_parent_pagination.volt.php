<?php if (isset($pagination) && $pagination) { ?>
    <nav>
        <ul class="pagination pagination-sm">
            <?php foreach ($pagination as $item) { ?>
                <li<?php if ($item['active']) { ?> class="active"<?php } ?>>
                    <a href="?page=<?php echo $item['page']; ?>">
                        <?php echo $item['name']; ?>
                    </a>
                </li>
            <?php } ?>
            <li>
                <a href="javascript:void(0);">
                    Більше
                </a>
            </li>
        </ul>
    </nav>
<?php } ?>