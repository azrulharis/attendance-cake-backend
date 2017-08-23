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
			'datepicker/dist/css/bootstrap-datepicker.min',
			'bootstrap-switch',
			'quick_slide_bar',
			'bootstrap-tagsinput'
		));

?>
<style>
.slug{display:block !important;}
</style>
<link rel="shortcut icon" href="<?php echo BASE_URL;?>img/<?php echo Configure::read('Site.favicon'); ?>"/>
<base href="<?php echo BASE_URL; ?>" >
<script>
baseUrl = '<?php echo BASE_URL; ?>';
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
          <div class="page-content" style="min-height:550px;">
            <div class="container">
                <div class="row">
        
        <div class="col-md-12">
   		 <?php echo $this->fetch('content'); ?>
    </div>
   
    </div>
    </div>
    </div>
     <?php echo $this->element('admin/footer');?>
    </div>
    </div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php  $screenOption = Configure::read('Blog.ScreenOption'); ?>
<script type="text/javascript">
	var screenOptionArray = '<?php echo json_encode($screenOption) ?>';
	var blogCategoryIds = '<?php echo !empty($blogCategoryIds) ? json_encode($blogCategoryIds) : ''  ?>';
	
</script>

<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<![endif]-->
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<?php
	echo $this->Html->script(array(
		'jquery.min',
		'jquery.slug',
		'moment',
		'bootstrap.min',
		'bootstrap-hover-dropdown.min',
		'bootstrap.file-input',
		'datepicker/dist/js/bootstrap-datepicker.min',
		'jquery.slimscroll',
		'common',
		'bootstrap-switch',
		'quick-sidebar',
		'blog',
		'bootstrap-tagsinput'
	));
	
echo $this->fetch('script');
?>
<?php
    echo $this->Html->script('ckeditor/ckeditor.js');
	echo $this->Html->script('ckfinder/ckfinder.js'); //blog.jambura.com/2011/01/29/implementing-ckfinder-in-cakephp-1-3-with-authentication/#sthash.h5NTilpO.dpuf/Link the ckfinder.js file on the page you want to use the editor.
?>

<!-- END CORE PLUGINS -->
<script>
	$("#BlogTitle").slug();
   $('input[type=file]').bootstrapFileInput();
   $('.file-inputs').bootstrapFileInput();
   $("[name='my-checkbox']").bootstrapSwitch();
   
   $(function(){

      $('#menu').slimScroll();

       height: 'auto'

    });
	
	
$(document).ready(function(){
  $(function () {
		
		$('.sandbox-container input').datepicker({
			format: "yyyy-mm-dd",
			todayBtn: "linked",
			todayHighlight: true
		});
});
  QuickSidebar.init(); // init quick sidebar

  
});
</script>
			
</body>
<!-- END BODY -->
</html>