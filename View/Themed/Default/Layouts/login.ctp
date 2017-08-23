<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
    <?php
      $adminDescription = __d('cake_dev', Configure::read('Site.title'));
      echo $adminDescription 
      ?> : <?php echo $this->fetch('title'); ?>
    </title>
    <?php
      echo $this->Html->meta('icon');
      echo $this->Html->css(array(
        '/vendors/bootstrap/dist/css/bootstrap.min.css',
        '/vendors/font-awesome/css/font-awesome.min.css',  
        '/build/css/custom.min.css'
      ));  
      echo $this->fetch('meta');
      echo $this->fetch('css'); 
    ?>
    <link rel="shortcut icon" href="<?php echo BASE_URL;?>img/<?php echo Configure::read('Site.favicon'); ?>"/>
    <script>
    baseUrl = '<?php echo BASE_URL; ?>';
    </script>
  </head> 
  <body class="login">
    <?php echo $this->fetch('content'); ?>
  </body>
</html>
