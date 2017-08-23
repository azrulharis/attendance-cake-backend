<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<?php echo $this->Html->charset(); ?>
<title>
	<?php
	$adminDescription = __d('cake_dev', Configure::read('Site.title'));
	echo $adminDescription ?>:
	<?php echo $this->fetch('title'); ?>
</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>-->
<?php
	echo $this->Html->meta('icon');
	echo $this->Html->css(array(
		'bootstrap',
		'bootstrap.min',
		'dashboard',
		'style',
		'font-awesome.min',
		'simple-line-icons',
	));
?>
<link rel="shortcut icon" href="<?php echo BASE_URL;?>img/<?php echo Configure::read('Site.favicon'); ?>"/>
<base href="<?php echo BASE_URL; ?>" >
<script>
baseUrl = '<?php echo BASE_URL; ?>';
themeBaseUrl = baseUrl+'theme/CakeReady/';
AuthId = '<?php echo $this->Session->read('Auth.User.id'); ?>';
AdminId = '<?php echo ADMIN_ID; ?>';
</script>
</head>
<!-- END HEAD -->
<body>
<div class="overlay"></div>
<?php echo $this->element('admin/header');?>
<div class="container-fluid">
  <div class="row wrappe">
<?php echo $this->element('admin/navigation');?>
<div id="page-content-wrapper">
          <div class="page-content">
            <div class="container">
                <div class="row">
        
        <div class="col-md-12">
<?php echo $this->fetch('content'); ?>
   </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->


<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>

<![endif]-->
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<?php



######## https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js -> jquery.min
	echo $this->Html->script(array(
		'jquery.min',
		'bootstrap.min',
		'jquery-migrate-1.2.1.min',
		'common'
	));

echo $this->fetch('script');
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
</body>
<!-- END BODY -->
</html>