<?php if (isset($post) && !empty($post)): ?>
    <?php if (isset($logged_in) && $logged_in): ?>
        <div class="admin">
            <a class="button" href="<?= $edit_url ?>">Edit</a>
            <a class="button button-clear" href="<?= $delete_url ?>">Delete</a>
        </div>
    <?php endif; ?>

    <div class="post">
        <h1><?= $post['title'] ?></h1>
        <div><?= $post['content'] ?></div>
    </div>
<?php endif; ?>

