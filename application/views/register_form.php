<html>
<?php echo form_open('/example/register/post_register'); ?>
<?php echo validation_errors(); ?>
<h5>Username</h5>
<input type="text" name="username" value="" size="50" />
<h5>Email</h5>
<input type="email" name="email" value="" size="50" />
<h5>Password</h5>
<input type="password" name="password" value="" size="50" />
<div><input type="submit" value="Submit" /></div>
</form>
</html>