<!-- BEGIN PAGE HEADER-->
<h1 class="page-header">
<?php echo __('Faq Categories'); ?>
</h1>
<!-- Flash Messages -->   
<?php echo $this->Session->flash(); ?> 
<!-- Flash Messages --> 
 <div style="margin-bottom:15px;margin-top:10px;" class="btn-group btn-breadcrumb" id="bc1">
    <?php echo $this->Html->link('<i class="fa fa-home"></i>', array('plugin' => false, 'controller' => 'users','action' => 'dashboard'),array('style'=>'background:#000000;','escape'=>false,'class'=>'btn btn-default')); ?>
     <?php echo $this->Html->link(__('Faq Categories'), array('action' => 'index'),array('escape'=>false,'class'=>'btn btn-default')); ?>
    <a class="btn btn-default active" href="javascript::void();" style="display: block;"><div>List</div></a> 
    <a class="" href="#"><div></div></a> 
 </div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
      <div class="table-wrap">
      	<div class="table-head">
            <div class="table-head-lt"><i class="fa fa-filter"></i><?php echo __('Filter'); ?></div>
            <?php echo $this->element('admin/table_toolbar');?>
            <div style="clear:both"></div>
        </div>
        <div style="padding:10px 10px 10px 10px;overflow:hidden" class="table-responsive filter-responsive new">
        	<?php echo $this->Form->create('FaqCategory',array('action'=>'index','novalidate'=>true)); ?>
        	<div class="row">
            	<div class="col-md-4"><?php echo $this->Form->input('FaqCategory.title', array('type' => 'text','required'=>false,'placeholder'=>'Title','label' => false,'class'=>'form-control mb3'));?></div>
                <div class="col-md-4">
                   <?php echo $this->Form->input('FaqCategory.status', array('label' => false,'class'=>'form-control mb3','options'=>array('1'=>'Active','0'=>'Inactive'),'empty'=>'Select Status','required'=>false));?>
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
<!--End Search -->
<div class="row">
	<div class="col-md-12">   
	<div class="mart-b">
            <div class="row mart-b">
                <div class="col-md-6">         
		 <?php                    
			echo $this->Html->link('<button type="button" class="btn default">'.__('New Faq Category').'</button>', array('action' => 'add'),array('escape'=> false));
		 ?>       
		 </div>
		 </div>
		 </div>
            <div class="table-wrap">
					 <div class="table-head">
						<div class="table-head-lt"><i class="fa fa-question-circle"></i><?php echo __('Faq Categories List') ?></div>
						<?php echo $this->element('admin/table_toolbar');?>
					 	<div style="clear:both"></div>
					 </div>
                     <div style="padding:20px 10px 0px 10px;" class="table-responsive">
                        <table cellspacing="0" cellpadding="0" border="0" class=" table">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th><?php echo $this->Paginator->sort('title');?></th>
                                <th><?php echo $this->Paginator->sort('status');?></th>
                                <th class="actions"><?php echo __('Actions');?></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                     
                            <?php   
                                if(count($faqCategories)>0){
									$currentPage = empty($this->Paginator->params['paging']['FaqCategory']['page']) ? 1 : $this->Paginator->params['paging']['FaqCategory']['page'];
									$limit = $this->Paginator->params['paging']['FaqCategory']['limit'];	
									$startSN = (($currentPage * $limit) + 1) - $limit;
                                    foreach ($faqCategories as $faqCategory){ ?>
                                        <tr>
                                            <td><?php echo $startSN++; ?></td>
                                            <td><?php echo $faqCategory['FaqCategory']['title']; ?></td>
                                            <td>
											<?php
													$changStatus = ($faqCategory['FaqCategory']['status'] == 1) ? 0 : 1;													
													if($faqCategory['FaqCategory']['status'] == 0)
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
                                                 <?php echo $this->Html->link('<i class="fa fa-question"></i>', array('controller'=>'faqs','action' => 'index', $faqCategory['FaqCategory']['id']),array('escape' => false ,'title'=>'Faqs','class'=>'btn default btn-sm')); ?>
                              					 <?php echo $this->Html->link('<i class="fa fa-edit"></i>',   array('action'=>'edit', $faqCategory['FaqCategory']['id']),array('escape' => false,'title'=>'Edit' ,'class'=>'btn default btn-sm')); ?>
                                                 <?php echo $this->Form->postLink('<i class="fa fa-trash-o"></i>',   array('action'=>'delete', $faqCategory['FaqCategory']['id']),array('escape' => false,'title'=>'Delete' ,'class'=>'btn default btn-sm'), sprintf(__('Are you sure you want to delete # %s?'), $faqCategory['FaqCategory']['id'])); ?>
                                            </td>
                                            
                                        </tr>
                                     <?php } 
                                    unset($faqCategory);
									}
                                    else
                                    {
                                    ?>
                                    <td align="center" colspan="4"><?php echo __('NO RECORD FOUND'); ?></td>
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