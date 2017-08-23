<!-- BEGIN PAGE HEADER-->
<?php  $screenOption = Configure::read('Blog.ScreenOption');?>
<h1 class="page-header">
<?php echo __('Blog Category'); ?></h1>
<div style="margin-bottom:15px;margin-top:10px;" class="btn-group btn-breadcrumb" id="bc1">
    <?php echo $this->Html->link('<i class="fa fa-home"></i>', array('plugin' => false, 'controller' => 'users','action' => 'dashboard'),array('style'=>'background:#000000;','escape'=>false,'class'=>'btn btn-default')); ?>
    <a class="btn btn-default active" href="javascript::void();" style="display: block;"><div>Blog Category</div></a> 
    <a class="" href="#"><div></div></a> 
 </div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<?php echo $this->Session->flash(); ?> 
<div class="mart-b">
            <div class="row mart-b">
                <div class="col-md-6">
                 <?php echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('New Blog').'</button>', array('controller' => 'blogs','action'=>'add', 'label'=>'true', 'plugin'=>'blog'), array('escape' => false)); ?>
                 
                 <?php echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-list"></i> '.__('List Blog').'</button>', array('controller' => 'blogs', 'action' => 'index'), array('escape' => false)); ?>
                </div>
            </div>
    	</div>
<div class="row">
	<div class="col-md-4">
		<div class="table-wrap">
				<div class="table-head">
                    <div class="table-head-lt">
					<?php if(empty($this->data))
					{
                                 $class = "fa fa-plus";
                                 $name = "Add";
                                }
                                else{
                                 $class = "fa fa-pencil";
                                 $name = "Edit";
                                }
                                ?>
                                <i class="<?php echo $class; ?>"></i>
                                <?php 
                                echo __($name.' Category'); ?>
                     </div>
                    <?php echo $this->element('admin/table_toolbar');?>
                    <div style="clear:both"></div>
                </div>
				<div class="form" style="border:none;">
<!-- BEGIN FORM-->

<?php echo $this->Form->create('BlogCategory',array('class'=>'horizontal-form','novalidate'=>true)); 
echo $this->Form->hidden('id');
?>
<div class="form-art">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label class="control-label">Title</label>
				<?php echo $this->Form->input('BlogCategory.title', array('class' => 'form-control','id'=>'BlogTitle','placeholder'=>'Title','label' => false)); ?> 
				
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label class="control-label">Slug</label>
			<?php echo $this->Form->input('BlogCategory.slug', array('class' => 'slug form-control','id'=>'slug', 'placeholder'=>'slug','readonly' => 'readonly','label' => false));	 ?>				
			</div>
		</div>
	</div>
    <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                	<label class="control-label">Parent</label>
                    <?php
                        echo $this->Form->input('BlogCategory.parent_id',array('class' => 'select2me form-control','empty' => '(No Parent)','label'=>false,'escape'=>false)); ?>
                </div>
            </div>
    </div>
   <div class="row"> 
		 <div class="col-md-12">
			<div class="form-group">
				<label class="control-label">Description</label>
				<?php echo $this->Form->input('BlogCategory.description', array('class' => 'form-control','label' => false,'rows'=>'2')); ?> 						
			</div>
		</div>
   </div>
   <div class="">
<?php echo $this->Form->button('Save Blog Category', array('class' => 'btn default','title' => 'Click here to Save Blog Category'),array('escape'=>false) );?>	
</div>
</div>

<?php echo $this->Form->end(); ?>
<!-- END FORM-->
</div>								
		</div>
         </br>
	</div>
   
	<div class="col-md-8">		
		<!-- BEGIN SAMPLE TABLE PORTLET-->
      <div class="table-wrap">
      	<div class="table-head">
            <div class="table-head-lt"><i class="fa fa-server"></i><?php echo __('Blog Category List'); ?></div>
            <?php echo $this->element('admin/table_toolbar');?>
            <div style="clear:both"></div>
        </div>
        <div style="padding:10px 10px 0px 10px;" class="table-responsive filter-responsive">
        	<table cellspacing="0" cellpadding="0" border="0" class="filt-tab table">
					<thead>
                        <tr>
							 <th><?php echo __('S.No.'); ?></th>
							<th><?php echo __('name'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
							<?php 
							if(count($blogCategories))
							{
								$currentPage = empty($this->Paginator->params['paging']['BlogCategory']['page']) ? 1 : $this->Paginator->params['paging']['BlogCategory']['page'];
								$limit = $this->Paginator->params['paging']['BlogCategory']['limit'];	
								$startSN = (($currentPage * $limit) + 1) - $limit;	
							 	foreach ($blogCategories as $key=>$blogCategory){ ?>	
							<tr>
							
								<td><?php echo $startSN++; ?></td>
							
							<td>
								<?php echo h($blogCategory); ?>
							</td>
							<td>
								<?php echo $this->Html->link('Edit', array('action' => 'index',$key)); ?> |
								<?php echo $this->Html->link('Up', array('action' => 'moveup', $key,1)); ?> |
                            	<?php echo $this->Html->link('down',   array('action'=>'movedown', $key,1) ); ?> | 
                            	<?php echo $this->Html->link('delete',   array('action'=>'delete', $key,1), array(), __('Are you sure you want to remove from tree # %s?', $key));  ?>
                    
							</td>
							
							</tr>
							 <?php } 
							}
							else{
							?>
							<tr><td colspan='3' align='center'><?php echo "No Record Found"; ?></td></tr>
							<?php
							} 
							 ?>
							
							
							</tbody>
				</table>
					  
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END PAGE CONTENT-->		
