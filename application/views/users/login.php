<div class='loginBox'>
<h1>Log in</h1>

<?= form_open('users/auth'); ?>
<label for='username'> Username </label>
<div> <?php //echo form_input('username', set_value('username')); ?>
<input type='text' name='username' value="<?= set_value('username');?>"class='registerUsername registry logins' required />
</div>
<div> <?= form_error('username', '<p style="color:red">'); ?></div>
<label for='password'> Password </label>
<div> <?php //echo form_password('password'); ?>
   <input type='password' name='password' minlength='6' class='registerPassword registry logins' required />
</div>
<div> <?= form_error('password', '<p style="color:red">'); ?> </div>
<div> <?php //echo form_submit('submit', 'Log in'); ?>
  <input type='submit' value='Log in' name='loginSubmit' class='loginSubmit' />
</div>

<?= form_close(); ?>
</div>
