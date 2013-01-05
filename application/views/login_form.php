<html>
<?php echo form_open('/example/login/post_login'); ?>
<?php echo validation_errors(); ?>
<h5>Username</h5>
<input type="text" name="username" value="" size="50" />

<h5>Password</h5>
<input type="password" name="password" value="" size="50" />
<div><input type="submit" value="Submit" /></div>
</form>
</html>