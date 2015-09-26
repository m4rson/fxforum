
<!-- search form for users posts -->
<div style='text-align:center'>
<?= form_open('posts/search', ['method' => 'get']); ?>
<select class="" name="search">
  <?php foreach($users as $user): ?>
  <option value="<?= $user->username; ?>" > <?= $user->username; ?>  </option>
<?php endforeach; ?>
</select>
<?php //echo form_submit('submit', 'Show'); ?>
<input type='submit' name='submit' value='Show' class='showPostsButton'/>
<?= form_close(); ?>
</div>


<!-- show all the users posts -->
<?php if(!empty($searched)): ?>

  <?php foreach($searched as $user_post): ?>

    <div class='addedBy'>
      Added by <b><i><span style='color:#6D7A61'><?= $user_post->username; ?></i></b>  <?= $user_post->added; ?>

        <?php if($user_post->username === $this->session->username): ?>
          <?= anchor('posts/delete/' . $user_post->id . '/' . $user_post->userfile , 'Delete',
           ['onclick' => "return confirm('Are you sure?')", 'class' => 'deleteLink']); ?>
        <?php endif; ?>

    </div>

  <div class='imageBox'>
      <a href="<?php echo base_url() . 'uploads/' .  $user_post->userfile; ?>">
        <img src="<?= base_url() . 'uploads/' .  $user_post->userfile; ?>" class='userImage' >
      </a>
    </div>
  <div class='commentBox'>
      <p> <?= $user_post->comment; ?> </p>
  </div>


  <?php endforeach; ?>

  <div class='pagination_links'>
     <?php //echo $this->pagination->create_links(); ?>
  </div>

<?php endif; ?>
