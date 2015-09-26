<div class='registerBox'>

<h1>Register</h1>

<?= form_open('users/register'); ?>
<label for='username'> Username </label>
<div> <?php //echo form_input('username', set_value('username')); ?>
  <input type='text' name='username' value="<?= set_value('username'); ?>"class='registerUsername registry' required />

</div>
<div> <?= form_error('username', '<p style="color:red">'); ?></div>
<label for='email'> Email </label>
<div> <?php //echo form_input('email', set_value('email')); ?>
  <input type='email' name='email' value="<?= set_value('email'); ?>" class='registerEmail registry' required />
</div>
<div> <?= form_error('email', '<p style="color:red">'); ?> </div>
<label for='password'> Password </label>
<div> <?php //echo form_password('password'); ?>
  <input type='password' name='password' minlength='6' class='registerPassword registry' required />
</div>
<div> <?= form_error('password', '<p style="color:red">'); ?> </div>
<div> <?php //echo form_submit('submit', 'Register'); ?>
   <input type='submit' value='Register' name='registerSubmit' class='registerSubmit' />
</div>

<?= form_close(); ?>

</div>
