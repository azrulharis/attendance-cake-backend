<!-- BEGIN PAGE HEADER-->
<h3 class="page-header">
Newsletter Categories
</h3>
<div style="margin-bottom:15px;margin-top:10px;" class="btn-group btn-breadcrumb" id="bc1">
    <?php echo $this->Html->link('<i class="fa fa-home"></i>', array('plugin' => false, 'controller' => 'users','action' => 'dashboard'),array('style'=>'background:#000000;','escape'=>false,'class'=>'btn btn-default')); ?>
     <?php echo $this->Html->link(__('Newsletter Category'), array('plugin' => 'newsletter', 'controller' => 'newsletter_categories','action' => 'manage'),array('escape'=>false,'class'=>'btn btn-default')); ?>
    <a class="btn btn-default active" href="javascript::void();" style="display: block;"><div>Manage</div></a> 
    <a class="" href="#"><div></div></a> 
 </div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->


<?php echo $this->Session->flash(); ?> 

<div class="row" style="margin-top:20px;margin-bottom:20px">
	<div class="col-md-12">
	<?php echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-list"></i> '.__('List Newsletters').'</button>', array('controller'=>'newsletters','action' => 'index'),array('escape'=> false)); ?>&nbsp;&nbsp;
   	<?php echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-mail-forward"></i> '.__('Send Newsletters').'</button>', array('controller'=>'newsletters','action' => 'sendnewsletter','',''),array('escape'=> false));  ?>&nbsp;&nbsp;
   	<?php  echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-mail-forward"></i> '.__('Send Test Mail').'</button>', array('controller'=>'newsletters','action' => 'testmail'),array('escape'=> false));
    ?>
	</div>
</div>	
<br />

<div class="row">
	<div class="col-md-4">
		<div class="table-wrap">
				<div class="table-head">
                    <div class="table-head-lt"><?php if(empty($this->data)){
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

<?php echo $this->Form->create('NewsletterCategory',array('class'=>'horizontal-form','novalidate'=>true)); 
echo $this->Form->hidden('id');
?>
<div class="form-art">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label class="control-label">Title</label>
				<?php echo $this->Form->input('NewsletterCategory.title', array('class' => 'form-control','id'=>'title','placeholder'=>'Title','label' => false)); ?> 
				
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label class="control-label">Slug</label>
			<?php echo $this->Form->input('NewsletterCategory.slug', array('class' => 'slug form-control','id'=>'slug', 'placeholder'=>'slug','readonly' => 'readonly','label' => false));	 ?>				
			</div>
		</div>
	</div>
   <div class="row"> 
		 <div class="col-md-12">
			<div class="form-group">
				<label class="control-label">Description</label>
				<?php echo $this->Form->input('NewsletterCategory.description', array('class' => 'form-control','label' => false,'rows'=>'2')); ?> 						
			</div>
		</div>
   </div>
   <div class="">
<?php echo $this->Form->button('Save Newsletter Category', array('class' => 'btn default','title' => 'Click here to Save Newsletter Category'),array('escape'=>false) );?>	
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
            <div class="table-head-lt"><i class="fa fa-server"></i><?php echo __('Newsletter Category List'); ?></div>
            <?php echo $this->element('admin/table_toolbar');?>
            <div style="clear:both"></div>
        </div>
        <div style="padding:10px 10px 0px 10px;" class="table-responsive filter-responsive">
        	<table cellspacing="0" cellpadding="0" border="0" class="filt-tab table">
					<thead>
                        <tr>
                            <th>Sr.No</th>			
                            <th><?php echo $this->Paginator->sort('title','Name'); ?></th>
                            <th><?php echo $this->Paginator->sort('description'); ?></th>
                            <th><?php echo $this->Paginator->sort('slug'); ?></th>                       
                            <th class="actions"><?php echo __('Actions'); ?></th>
                            
                        </tr>
					</thead>
					<tbody>
				 
  					<?php 
					if(count($newsletterCategories)>0){
						$currentPage = empty($this->Paginator->params['paging']['NewsletterCategory']['page']) ? 1 : $this->Paginator->params['paging']['NewsletterCategory']['page'];
						$limit = $this->Paginator->params['paging']['NewsletterCategory']['limit'];	
						$startSN = (($currentPage * $limit) + 1) - $limit;
					foreach ($newsletterCategories as $newsletterCategory): ?>		

					<tr>
						<td><?php echo $startSN++; ?></td>		
                        <td><?php echo h($newsletterCategory['NewsletterCategory']['title']); ?></td>
                        <td><?php echo h($newsletterCategory['NewsletterCategory']['description']); ?></td>
                        <td><?php echo h($newsletterCategory['NewsletterCategory']['slug']); ?></td>  
                        <td>
                     
                        <?php echo $this->Html->link('<span href="#" class="btn default"><i class="fa fa-edit"></i></span>',   array('action'=>'manage', $newsletterCategory['NewsletterCategory']['id']),array('escape' => false,'title'=>'Edit') ); ?>  
                        <?php echo $this->Form->postLink('<span href="#" class="btn default"><i class="fa fa-trash-o"></i></span>',  array('action'=>'delete', $newsletterCategory['NewsletterCategory']['id']), array('escape' => false,'title'=>'Delete'), __('Are you sure you want to delete # %s?', $newsletterCategory['NewsletterCategory']['id']));  ?>						
                        </td>
					</tr>
			 		<?php endforeach; 
						unset($newsletterCategory); 
						}
						else
						{
						?>
						<td align="center" colspan="7"><?php echo NO_RECORD ?></td>
						<?php 
						} ?>
					</tbody>
				</table>
					<div class="box-footer clearfix">
                        <ul class="pagination">
                            <li>                            
                            <?php
                                echo $this->Paginator->prev('< ' . __('Prev'),array('tag'=>'li'),null, array('class' => 'disabled','tag'=>'li'));
                                echo $this->Paginator->numbers(array('separator' => '','tag'=>'li'),null, array('class' => 'disabled','tag'=>'li'));
                                echo $this->Paginator->next(__('Next') . ' >',array('tag'=>'li'),null, array('class' => 'disabled','tag'=>'li'));
                            ?>
                            </li>
                        
                        </ul>
                        <p>
                        <?php
                        echo $this->Paginator->counter(array(
                        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                        ));
                        ?>	
                        </p>
                    </div>  
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END PAGE CONTENT-->		
	
