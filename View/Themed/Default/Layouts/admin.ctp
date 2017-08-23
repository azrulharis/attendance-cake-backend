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
        '/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css',
        '/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css',
        '/build/css/custom.css?v='. Configure::read('Site.version'),
        '/vendors/jquery_UI/jquery-ui.min.css',
        '/vendors/jquery_UI/jquery-ui-timepicker-addon.css'
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

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;"> 
              <h1 class="site_title">E-Time</h1>
               <?php 
               //echo $this->Html->link($this->Html->image(Configure::read('Site.logo'),array('alt' => Configure::read('Site.title'),"class"=>"site_title",'title'=>Configure::read('Site.title'))),array('controller'=>'users','action' => 'dashboard','plugin'=>false), array('escape'=>false)); 
               ?>   
            </div> 

            <div class="clearfix"></div> 

            <br />

            <?php
              if($this->Session->read('Auth.User.id')) {
                echo $this->element('navigationLeft'); 
              }
            ?>

            <!-- /menu footer buttons -->
            
            
            <!-- /menu footer buttons -->
          </div> 
        </div>

        <?php
          if($this->Session->read('Auth.User.id')) {
            echo $this->element('navigationTop'); 
          }
        ?>

        <!-- page content -->
        <div class="right_col" role="main" style="min-height: 400px;"> 
          <?php echo $this->fetch('content'); ?> 
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php
          if($this->Session->read('Auth.User.id')) {
            echo $this->element('footer'); 
          }
        ?>
        <!-- /footer content -->
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
