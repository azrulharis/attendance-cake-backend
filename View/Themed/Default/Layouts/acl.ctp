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
        '/build/css/custom.css' 
      ));  
      echo $this->fetch('meta');
      echo $this->fetch('css'); 
    ?>
   
    <link rel="shortcut icon" href="<?php echo BASE_URL;?>img/<?php echo Configure::read('Site.favicon'); ?>"/>
    <base href="<?php echo BASE_URL; ?>">
 
    <script>
baseUrl = '<?php echo BASE_URL; ?>';
themeBaseUrl = baseUrl+'theme/CakeReady/';
AuthId = '<?php echo $this->Session->read('Auth.User.id'); ?>';
AdminId = '<?php echo ADMIN_ID; ?>';
</script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;"> 
              <?php echo $this->Html->link($this->Html->image(Configure::read('Site.logo'),array('alt' => Configure::read('Site.title'),"class"=>"site_title",'title'=>Configure::read('Site.title'))),array('controller'=>'users','action' => 'dashboard','plugin'=>false),
      array('escape'=>false));?>  
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info 
            <div class="profile">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>-->
            <!-- /menu profile quick info -->

            <br />

            <?php
              if($this->Session->read('Auth.User.id')) {
                echo $this->element('navigationLeft'); 
              }
            ?>

            <!-- /menu footer buttons -->
            <?php
              if($this->Session->read('Auth.User.id')) {
                echo $this->element('navigationLeftFooter'); 
              }
            ?>
            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <?php
          if($this->Session->read('Auth.User.id')) {
            echo $this->element('navigationTop'); 
          }
        ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
             
          <!-- /top tiles -->
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2>Access Control Layer</h2>
     
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
          <?php echo $this->fetch('content'); ?>
          </div>
                </div>
              </div>
            </div>
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
        '/build/js/custom.min.js'
      ));

      echo $this->Html->script(array( 
		'jquery-migrate-1.2.1.min',
		'common'
	));
    ?>   
    <script>

function getAllGroupActions(){
	jQuery('.controllerRow').unbind().click(function(){
		controllerName = jQuery(this).attr('rel');
		actionrows = jQuery('#action_'+controllerName).find('tr').length;
		
		if(actionrows == 0)
		{
			url	=	baseUrl+'admin/acl/aros/ajax_get_actions/'+controllerName;
			jQuery.ajax({
				url: url,
				type:'POST',
				success:function(data)
				{
					jQuery('#action_'+controllerName).html(data);
				},
			});
		}
	});
}

function getAllUserActions(){
	jQuery('.controllerUserRow').unbind().click(function(){
		
		controllerName = jQuery(this).attr('rel');
		actionrows = jQuery('#action_'+controllerName).find('tr').length;
		
		if(actionrows == 0)
		{
			userId = jQuery('#userId').val();
			url	=	baseUrl+'admin/acl/aros/ajax_get_user_actions/'+controllerName+'/'+userId;
			jQuery.ajax({
				url: url,
				type:'POST',
				success:function(data)
				{
					jQuery('#action_'+controllerName).html(data);
				},
			});
		}
	});
}

function controllerAction(controllerName)
{
	url = baseUrl+'admin/acl/aros/ajax_edit_actions/'+controllerName;
		jQuery.ajax({
		url: url,
		type:'POST',
		success:function(data)
		{
			jQuery('#action_'+controllerName).html(data);
			AjaxReady();
		},
	});
}

function AjaxReady()
{
	jQuery('.cakeReadyAjax').click(function(){
		action	=	jQuery(this).attr('rel');
		if(confirm('Do you want to '+action+' this action'))
		{
		url = jQuery(this).attr('cakeready-link');
			jQuery.ajax({
			url: url,
			type:'POST',
			success:function(data)
			{
				//alert(data);
				controllerAction(data);
			},
		});
		}
	});
}

jQuery(document).ready(function(){
	
	getAllGroupActions();
	
	getAllUserActions();
	
		
	jQuery('.controllerEditRow').click(function(){
		
		controllerName = jQuery(this).attr('rel');
		
		actionrows = jQuery('#action_'+controllerName).find('tr').length;
		if(actionrows == 0)
		{
			controllerAction(controllerName);
		} 
	});
	
	
});

</script>
 	
    <?php echo $this->fetch('script'); ?> 
  </body>
</html>
