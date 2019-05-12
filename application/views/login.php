<?php echo validation_errors(); ?>

<?php if (isset($error_message)) :?>
    <p><?= $error_message ?></p>
<?php endif; ?>

<?php echo form_open(base_url('Login')); ?>

<label for="username">Username</label>
<input type="text" name="username" /><br />
<br>
<label for="password">Password</label>
<input type="password" name="password" /><br />
<br>
<input type="submit" name="submit" value="Login" />

</form>
