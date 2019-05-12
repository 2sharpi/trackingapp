<?php echo validation_errors(); ?>

<?php if (isset($error_message)) :?>
    <p><?= $error_message ?></p>
<?php endif; ?>

<?php echo form_open($post_route); ?>

<label for="post_title">Title</label>
<input type="text" name="post_title" value="<?= isset($post_title) ? $post_title : null ?>"/>

<label for="post_slug">Slug</label>
<input type="text" name="post_slug" value="<?= isset($post_slug) ? $post_slug : null ?>"/>

<label for="post_content">Content</label>
<textarea name="post_content"><?= isset($post_content) ? $post_content : null ?></textarea>

<input type="submit" name="submit" value="Save" />

</form>
