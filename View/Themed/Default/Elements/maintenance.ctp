<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
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
	$adminDescription = __d('cake_dev', 'CakeReady: Comming Soon');
	echo $adminDescription ?>:
	<?php echo $this->fetch('title'); ?>
</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>

<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array(
			'bootstrap',
			'bootstrap.min',
			'dashboard',
			'style',
			'font-awesome.min',
			'simple-line-icons',
			'bootstrap-datetimepicker',
			'bootstrap-datetimepicker.min',
			'coming-soon'
		));

?>
<link rel="shortcut icon" href="<?php echo BASE_URL;?>img/<?php echo Configure::read('Site.favicon'); ?>"/>
<script>
baseUrl = '<?php echo BASE_URL; ?>';
</script>

<style>

.error{
	color:#F00;
}

.success{
	color:#FFF;
}

</style>

</head>

<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="log">
<div class="container" style="width:1200px !important; margin:0px auto">
	<div class="row">
		<div class="col-md-12 coming-soon-header">
			<?php 
			echo $this->Html->image(Configure::read('Site.logo'),array('alt'=>Configure::read('Site.title'),'title'=>Configure::read('Site.title')));
			?>
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 coming-soon-content">
			<h1 ><?php echo $title_for_layout; ?></h1>
			<p>
				<?php echo Configure::read('Site.maintenance_message');?>
			</p>
			<br>
            <?php echo $this->Form->create('User',array('action'=>'subscriber','class'=>'form-inline','noValidate'=>true));?>
				<div class="input-group input-large add-subscribe" style="float:left">
					<?php echo $this->Form->input('User.email',array('class'=>'form-control emailSuc','placeholder'=>'Email','label'=>false)); ?>
					<span class="input-group-btn">
                    <?php echo $this->Form->button('<span>Subscribe </span><i class="m-icon-swapright m-icon-white"></i>',array('class'=>'btn default','escape'=>false)); ?>
					</span>
                </div>
				<br><br><span style="display:inline-block;" class="subscribe-message"></span>
                <div id="wait" style="display:none;float:left; padding-top:3px;"><?php echo $this->Html->image('graf.gif',array('style'=>'width:26px; padding-left:5px;')); ?></div>
                <div style="clear:both"></div>
			<?php echo $this->Form->end(); ?>
            <div class="form-group">
                            <label class="control-label">Follow us at:</label>
                        <a class="facebook" data-original-title="facebook" href="<?php echo Configure::read('Social.facebook'); ?>" target="_blank">
						  <button class="btn default" type="button"> <i class="fa fa-facebook "></i> </button>
                        </a>
                        <a class="twitter" data-original-title="Twitter" href="<?php echo Configure::read('Social.twitter'); ?>" target="_blank">
							<button class="btn default" type="button"> <i class="fa fa-twitter"></i> </button>
                        </a>
                        <a class="googleplus" data-original-title="Goole Plus" href="<?php echo Configure::read('Social.googleplus'); ?>" target="_blank">
							<button class="btn default" type="button"> <i class="fa fa-google-plus"></i> </button>
                        </a>
                        <a class="linkedin" data-original-title="Linkedin" href="<?php echo Configure::read('Social.linkedin'); ?>" target="_blank">
							   <button class="btn default" type="button"> <i class="fa  fa-linkedin "></i> </button>    
                        </a>
                     
            </div>
		</div>
		<div class="col-md-6 coming-soon-countdown">
			<div id="defaultCountdown">
			</div>
        <?php echo $this->Html->link('<button type="button" class="btn default">'.__('<span>check admin panel </span>').'</button>', array('controller' => 'users', 'action' => 'login','admin'=>true,'plugin'=>false), array('escape' => false)); ?>
        
        </div>
	</div>
	<!--/end row-->
	<div class="row">
		<div class="col-md-12 coming-soon-footer">
			 <a href="http://www.w3itexperts.com" target="__blank" style="color:#fff !important;"> <?php echo Configure::read('Site.copyright'); ?></a>
		</div>
	</div>
</div>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<?php
	echo $this->Html->script(array(
		'respond.min',
		'excanvas.min',
	));
?>
<![endif]-->
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<?php

######## https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js -> jquery.min
	echo $this->Html->script(array(
		'jquery.min',
		'moment',
		'bootstrap.min',
		'bootstrap-datetimepicker-master/build/js/bootstrap-datetimepicker.min',
		'common',
		'jquery.countdown.min',
		'jquery.backstretch.min',
		'coming-soon'
		
	));
  
echo $this->fetch('script');
?>
<script>
jQuery(document).ready(function() {     
   
    jQuery(document).ajaxStart(function(){
        jQuery("#wait").css("display", "block");
    });
    jQuery(document).ajaxComplete(function(){
        jQuery("#wait").css("display", "none");
    });
    
 });
</script>

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>