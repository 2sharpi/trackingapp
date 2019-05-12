<?php if(isset($posts) && !empty($posts)): ?>
    <?php foreach ($posts as $post): ?>
    <div class="post">
        <h2><a href="<?= $post['url'] ?>"><?= $post['title'] ?></a></h2>
        <div><?= $post['content'] ?></div>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
    <div class="errors">
        <h2>No posts yet!</h2>
    </div>
<?php endif; ?>
