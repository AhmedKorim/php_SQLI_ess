<nav>
    <?php $nav_subjects = find_all_subjects(); ?>
    <?php
    $subject_id = $subject_id ?? '';
    $page_id = $page_id ?? '';
    ?>
    <ul class="subjects">
        <?php while ($nav_subject = mysqli_fetch_assoc($nav_subjects)) { ?>
            <li class="<?php if ($nav_subject['id'] === $subject_id) echo 'selected'; ?>">
                <a href="<?php echo url_for('index.php?id=' . h(u($nav_subject['id']))); ?>">
                    <?php echo h($nav_subject['menu_name']); ?>
                </a>
                <?php if ($nav_subject['id'] === $subject_id) { ?>
                    <?php $nav_pages = find_pages_by_subject_id($nav_subject['id']); ?>
                    <ul class="pages">
                        <?php
                        $i = 0;
                        ?>
                        <?php while ($nav_page = mysqli_fetch_assoc($nav_pages)) {
                            if ($i === 0 && ($nav_subject['id'] === $subject_id) && empty($page_id)) {
                                redirect_to(url_for('index.php?id=' . h(u($nav_subject['id'])) . '&page_id=' . $nav_page['id']));
                            }
                            $i++;
                            ?>
                            <li class="<?php if ($nav_page['id'] === $page_id) echo 'selected'; ?>">
                                <a href="<?php echo url_for('index.php?id=' . $nav_subject['id'] . '&page_id=' . H(u($nav_page['id']))); ?>">
                                    <?php echo h($nav_page['menu_name']); ?>
                                </a>
                            </li>
                        <?php } // while $nav_pages ?>
                    </ul>
                    <?php mysqli_free_result($nav_pages); ?>
                <?php } ?>
            </li>
        <?php } // while $nav_subjects ?>
    </ul>
    <?php mysqli_free_result($nav_subjects); ?>
</nav>
