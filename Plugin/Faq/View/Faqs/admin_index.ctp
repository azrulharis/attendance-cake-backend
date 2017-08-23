<!-- BEGIN PAGE HEADER-->
<h1 class="page-header">
<?php
if(!empty($title)){
 echo "Faq : ".$title; 
}
else{
 echo "Faqs";
 $faqid ='';	
}
?>
</h1>
 <div style="margin-bottom:15px;margin-top:10px;" class="btn-group btn-breadcrumb" id="bc1">
    <?php echo $this->Html->link('<i class="fa fa-home"></i>', array('plugin' => false, 'controller' => 'users','action' => 'dashboard'),array('style'=>'background:#000000;','escape'=>false,'class'=>'btn btn-default')); ?>
     <?php echo $this->Html->link(__('Faqs'), array('action' => 'index'),array('escape'=>false,'class'=>'btn btn-default')); ?>
    <a class="btn btn-default active" href="javascript::void();" style="display: block;"><div>List</div></a> 
    <a class="" href="#"><div></div></a> 
 </div>

			<!-- END PAGE HEADER-->
 <!-- Flash Messages -->   
 <?php echo $this->Session->flash(); ?> 
  <!-- Flash Messages --> 
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
      <div class="table-wrap">
      	<div class="table-head">
            <div class="table-head-lt"><i class="fa fa-filter"></i><?php echo __('Filter'); ?></div>
            <?php echo $this->element('admin/table_toolbar');?>
            <div style="clear:both"></div>
        </div>
        <div style="padding:10px 10px 10px 10px;overflow:hidden;" class="table-responsive filter-responsive new">
        	 <?php echo $this->Form->create('Faq',array('action'=>'index',$faqid,'class'=>'horizontal-form')); ?>
        	
            <div class="row">
            	<div class="col-md-4"> <?php echo $this->Form->input('Faq.faq_category_id', array('label' => false,'class'=>'form-control mb3','empty'=>'Select Category','required'=>false));?></div>
                <div class="col-md-4">
                   <?php echo $this->Form->input('Faq.status', array('label' => false,'class'=>'form-control mb3','options'=>array('1'=>'Active','0'=>'Inactive'),'empty'=>'Select Status','required'=>false));?>
				</div>
                <div class="col-md-4"><?php echo $this->Form->button('<i class="fa fa-search"></i>Filter', array('class' => 'btn default mb3','title' => 'Click here to Search'),array('escape'=>false) );?>
                </div>
            </div>
            <div style="clear:both"> </div>
            <?php echo $this->Form->end(); ?>

        </div>
        <div style="clear:both"> </div>
     </div>
    </div>
</div>
</br>			
			
<div class="row">
	<div class="col-md-12">
		<div class="mart-b">
			<div class="row mart-b">
				 <div class="col-md-6">         
				<?php
					echo $this->Html->link('<button type="button" class="btn default">'.__('New Faq').'</button>', array('controller' => 'faqs','action'=>'add', 'label'=>'true', 'plugin'=>'faq'),array('escape'=> false));
					echo $this->Html->link('&nbsp;<button type="button" class="btn default">'.__('List Faq Categories ').'</button>', array('controller' => 'faq_categories','action'=>'index','plugin'=>'faq'),array('escape'=> false));
					echo $this->Html->link('&nbsp;<button type="button" class="btn default">'.__('New Faq Category').'</button>', array('controller' => 'faq_categories','action'=>'add','plugin'=>'faq'),array('escape'=> false));
				?>
   
				</div>
			 </div>
		</div>
		<div class="table-wrap">
				  <div class="table-head">
					<div class="table-head-lt"><i class="fa fa-question"></i><?php echo __('Faqs List') ?></div>
					<?php echo $this->element('admin/table_toolbar');?>
					<div style="clear:both"></div>
				 </div>
				   <div style="padding:20px 10px 0px 10px;" class="table-responsive">
						<table cellspacing="0" cellpadding="0" border="0" class=" table">
							 <thead>	
								<tr>
									<th>S.No.</th>
									<th><?php echo $this->Paginator->sort('faq_category_id');?></th>
									<th><?php echo $this->Paginator->sort('question');?></th>
									<th><?php echo $this->Paginator->sort('status');?></th>
									<th class="actions"><?php echo __('Actions');?></th>
								</tr>
							</thead>
							<tbody>                 
							<?php   
							if(count($faqs)>0){
								$currentPage = empty($this->Paginator->params['paging']['Faq']['page']) ? 1 : $this->Paginator->params['paging']['Faq']['page'];
								$limit = $this->Paginator->params['paging']['Faq']['limit'];	
								$startSN = (($currentPage * $limit) + 1) - $limit;
								foreach ($faqs as $faq): ?>
									<tr>
										<td><?php echo $startSN++; ?></td>
										<td><?php echo __($faq['FaqCategory']['title'], array('controller' => 'faqcategories', 'action' => 'view', $faq['Faq']['id'])); ?></td>
										<td><?php echo h($faq['Faq']['question']); ?></td>
										<td>
										<?php
												$changStatus = ($faq['Faq']['status'] == 1) ? 0 : 1;													
												if($faq['Faq']['status'] == 0)
												{ 
													echo __('<i class="fa fa-times"></i>');									
												}
												else
												{
													echo __('<i class="fa fa-check"></i>');
												}
										?>                                            
										</td>
										<td>
											<?php echo $this->Html->link('<i class="fa fa-edit"></i>', array('action'=>'edit', $faq['Faq']['id']),array('escape' => false,'title'=>'Edit','class'=>'btn default btn-sm' )); ?>
											<?php echo $this->Form->postLink('<i class="fa fa-trash-o"></i>',   array('action'=>'delete', $faq['Faq']['id']),array('escape' => false,'title'=>'Delete','class'=>'btn default btn-sm' ), sprintf(__('Are you sure you want to delete # %s?'), $faq['Faq']['id'])); ?>
										</td>
										
									</tr>
							 <?php endforeach;
							  unset($faq); 
								}
								else
								{
								?>
								<td align="center" colspan="5"><?php echo __('NO RECORD FOUND'); ?></td>
								<?php } ?>
				
							 </tbody>
					</table>
				   		<div class="col-md-6">
			<p>
			<?php
			echo $this->Paginator->counter(array(
			'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total')
			));
			?>	
			</p>
		 </div>
						<div class="col-md-6">
			  <nav>
			  <ul class="pagination">
			   
				<li>
				<?php
				echo $this->Paginator->prev(' Prev ',array('tag'=>'li'),null, array('class' => 'disabled','aria-label'=>'Previous','tag'=>'li'));
				echo $this->Paginator->numbers(array('separator' => '','tag'=>'li'),null, array('class' => 'disabled','tag'=>'li'));
				echo $this->Paginator->next( ' Next ',array('tag'=>'li'),null, array('class' => 'disabled','tag'=>'li','aria-label'=>'Next'));
				?>
				</li>
			   
			  </ul>
			</nav>
			</div>

				  </div> 
				  <div style="clear:both"> </div>  
			</div>
	</div>
</div>
			<!-- END PAGE CONTENT-->           

<?php echo $this->element('table_setting'); ?>	            