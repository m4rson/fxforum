<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <link rel='stylesheet' href="<?php echo styles_url(); ?>style.css" >
    <meta charset="utf-8">
    <meta lang='pl'>
    <title>FX Forum <?= $title; ?> </title>
  </head>
  <body>

    <div id='main'>

      <header>
       <div class='inHeader'>
        <div class='headerLogo'>
          <img src="<?= images_url();?>currencies.png" class='imageLogo'>
        </div>
         <button class='menuButton'> Menu </button>
        <div class='headerNav'>
          <ul>
            <li> <?= anchor('/', 'Home'); ?> </li>
          <?php if($this->session->is_logged_in): ?>
            <li> <?= anchor('forum', 'Forum'); ?> </li>
            <li> <?= anchor('chat', 'Chat'); ?> </li>
            <li> <?= anchor('forum/search', 'Search'); ?> </li>
            <li> <?= anchor('logout', 'Log out', ['onclick' => "return confirm('Are you sure?')"]); ?>
            <span style='color:#eee'>  <?= $this->session->username; ?></span>
            </li>
          <?php else: ?>
            <li> <?= anchor('login', 'Log in'); ?> </li>
            <li> <?= anchor('register', 'Register'); ?> </li>
          <?php endif; ?>
          </ul>
        </div>
      </div>

      </header>
<div style='clear:both'></div>
      <div id='container'>
        <?php if($this->session->flashdata('message')): ?>
          <div  style='text-align:center;background:#121a1a;color:#ddd;'class='flash_message'>
             <?= $this->session->flashdata('message'); ?>
          </div>
        <?php endif; ?>

        <?php $this->load->view($yield); ?>
      </div>

    </div>
    <script src="<?= javascript_url(); ?>jquery.js "> </script>
    <script src="<?= javascript_url(); ?>app.js "> </script>
  </body>
</html>
