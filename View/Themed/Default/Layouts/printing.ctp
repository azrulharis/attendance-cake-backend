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
        '/build/css/printing.css' 
      ));  
      echo $this->fetch('meta');
      echo $this->fetch('css'); 
    ?>
   
    <link rel="shortcut icon" href="<?php echo BASE_URL;?>img/<?php echo Configure::read('Site.favicon'); ?>"/>
    <base href="<?php echo BASE_URL; ?>">
    <script>
      var baseUrl = '<?php echo BASE_URL; ?>';
      var themeBaseUrl = baseUrl+'theme/Default/';
    </script>
  </head>

  <body>
    <div class="container body">
      <div class="main_container"> 
          <?php echo $this->fetch('content'); ?> 
        </div> 
    </div>
    <?php
      echo $this->Html->script(array(
        '/vendors/jquery/dist/jquery.min.js',
        '/vendors/bootstrap/dist/js/bootstrap.min.js',
        '/vendors/fastclick/lib/fastclick.js', 
        '/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
        '/build/js/custom.js',
        '/vendors/jquery_UI/jquery-ui.min.js',
        '/vendors/jquery_UI/jquery-ui-timepicker-addon.js'
      ));
    ?>   
    <script>
  $( function() {
    $('#dateonly').datepicker({
      dateFormat: 'yy-mm-dd', 
      ampm: true
    }),
    $('#dateonly_2').datepicker({
      dateFormat: 'yy-mm-dd', 
      ampm: true
    }),
    $('#dateonly_3').datepicker({
      dateFormat: 'yy-mm-dd', 
      ampm: true
    }),
    $('#datepicker').datetimepicker({
      dateFormat: 'yy-mm-dd',
      timeFormat: "h:mm:ss",
      ampm: true
    }),
    $('#datepicker_2').datetimepicker({
      dateFormat: 'yy-mm-dd',
      timeFormat: "h:mm:ss",
      ampm: true
    })
  } );
  
  </script>
  
 
 
    <?php echo $this->fetch('script'); ?> 
  </body>
</html> 
