
<div class='postForm'>
<?= form_open_multipart('posts/create', ['class' => 'postForm']); ?>

   <div> <?= form_hidden('username', $this->session->username); ?> </div>
   <div> <input type='hidden' name='added' value="<?= date('Y-m-d'); ?>" ></div>
   <div> <textarea name='comment' style='width:100%;resize:none' required ></textarea><?php //echo form_textarea('comment'); ?> </div>
   <div> <?= form_error('comment'); ?> </div>
   <div> <?= form_upload('userfile'); ?>
     <input type='submit' name='submit' value='Add Post' class='addPostSubmit' />
    <?php //echo form_submit('submit', 'Add post'); ?> </div>

<?= form_close(); ?>
</div>


<?php if(!empty($posts)): foreach($posts as $post): ?>


<div class='addedBy'>
  Added by <b><i><span class='added_by'><?= $post->username; ?></i></b>  <?= $post->added; ?>

    <?php if($post->username === $this->session->username): ?>
      <?= anchor('posts/delete/' . $post->id . '/' . $post->userfile , 'Delete',
       ['onclick' => "return confirm('Are you sure?')", 'class' => 'deleteLink']); ?>
    <?php endif; ?>

</div>

<div class='imageBox'>
  <a href="<?= base_url() . 'uploads/' .  $post->userfile; ?>">
    <img src="<?= base_url() . 'uploads/' .  $post->userfile; ?>" class='userImage' >
  </a>
</div>
<div class='commentBox'>
  <p> <?= $post->comment; ?> </p>
</div>
<?php endforeach; ?>

<div class='pagination_links'>
   <?= $this->pagination->create_links(); ?>
</div>

<?php else: ?>

  <h2> No posts yet </h2>

<?php endif; ?>
