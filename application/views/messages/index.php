<div class='messageForm'>
<?= form_open('messages/create'); ?>

<div> <textarea required name='message' class='messageInput' autofocus='autofocus' required > </textarea> </div>
<div class='message_error'> <?= form_error('message'); ?> </div>
<div> <input type='hidden' name='username' value="<?= $this->session->username; ?>" > </div>
<div> <input type='hidden' name='added' value="<?= date('Y-m-d'); ?>"> </div>
<div> <input type='submit' name='submit' value='Send' class='sendMessage' /> </div>

<?= form_close(); ?>
</div>

<div class='messageBox'>
  <?php if(!empty($messages)): foreach($messages as $message): ?>
     <div class='userMessage'>
       <span style='background:#000;color:#fff'> <?= $message->username; ?> </span>
       <?= $message->message; ?>
     </div>
     <hr><hr>
    <?php endforeach; ?>
  <?php endif; ?>
</div>
