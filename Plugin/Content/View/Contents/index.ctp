<!-- Page level plugin styles START -->
<?php 
	echo $this->Html->css(array(   
							'Frontend/jquery.fancybox'	   			 
							));
?>
<!-- Page level plugin styles END -->
<div class="col-md-9 col-sm-9">
<h1><?php echo $contents['Content']['title']; ?></h1>
<div class="content-page">

<p>
<?php echo $this->Html->image('Frontend/aboutus.jpg',array('class'=>'img-responsive'));?>
</p>

<?php echo $contents['Content']['content']; ?>
</div>
</div>
<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
	<?php echo $this->Html->script(array(
										'Frontend/jquery.fancybox.pack',   //pop up 
									)); 
	?>
	
  <script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
	<?php echo $this->Html->script(array(
										'Frontend/layout',   						
								)); 
	?>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initTwitter();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->		  		  