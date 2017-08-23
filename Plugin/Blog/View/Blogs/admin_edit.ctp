<?php echo $this->element('Blogs/screen_option');?>
<!-- BEGIN PAGE HEADER-->
<h1 class="page-header">Edit Blog</h1>
 <div style="margin-bottom:15px;margin-top:10px;" class="btn-group btn-breadcrumb" id="bc1">
    <?php echo $this->Html->link('<i class="fa fa-home"></i>', array('plugin' => false, 'controller' => 'users','action' => 'dashboard'),array('style'=>'background:#000000;','escape'=>false,'class'=>'btn btn-default')); ?>
     <?php echo $this->Html->link(__('Blog'), array('plugin' => false, 'controller' => 'blogs','action' => 'index'),array('escape'=>false,'class'=>'btn btn-default')); ?>
    <a class="btn btn-default active" href="javascript::void();" style="display: block;"><div>Add</div></a> 
    <a class="" href="#"><div></div></a> 
 </div>

<!-- END PAGE HEADER-->
<div class="mart-b">
    <div class="row mart-b">
        <div class="col-md-12">
        		<?php echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-list"></i> '.__('List Blog').'</button>', array('controller' => 'blogs', 'action' => 'index'), array('escape' => false)); ?>
                
                <?php echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-list"></i> '.__('List Category').'</button>', array('controller' => 'blog_categories', 'action' => 'index'), array('escape' => false)); ?>
        </div>
    </div>
</div>
<!-- page start--->
<?php echo $this->Session->flash(); ?>
<div class="row">
	<div class="col-md-12" >
		<?php echo $this->element('Blogs/form');?>
	</div>
</div>
<!-- page end---->