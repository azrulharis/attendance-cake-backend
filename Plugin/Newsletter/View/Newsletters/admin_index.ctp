<!-- BEGIN PAGE HEADER-->
<h1 class="page-header"> Newsletters</h1>
<div style="margin-bottom:15px;margin-top:10px;" class="btn-group btn-breadcrumb" id="bc1">
    <?php echo $this->Html->link('<i class="fa fa-home"></i>', array('plugin' => false, 'controller' => 'users','action' => 'dashboard'),array('style'=>'background:#000000;','escape'=>false,'class'=>'btn btn-default')); ?>
     <?php echo $this->Html->link(__('Newsletter'), array('plugin' => 'newsletter', 'controller' => 'newsletters',
	 'action' => 'index'),array('escape'=>false,'class'=>'btn btn-default')); ?>
    <a class="btn btn-default active" href="javascript::void();" style="display: block;"><div>List</div></a> 
    <a class="" href="#"><div></div></a> 
 </div>
<!-- END PAGE HEADER--><!-- BEGIN PAGE CONTENT-->
<!--For Search -->          
<div class="row">
    <div class="col-md-12">
      <div class="table-wrap">
      	<div class="table-head">
            <div class="table-head-lt"><i class="fa fa-filter"></i><?php echo __('Filter'); ?></div>
            <?php echo $this->element('admin/table_toolbar');?>
            <div style="clear:both"></div>
        </div>
        <div style="padding:10px 10px 0px 10px;" class="table-responsive filter-responsive">
        	   <?php echo $this->Form->create('Newsletter',array('action'=>'index','novalidate' => true)); ?>
            <table cellspacing="0" cellpadding="0" border="0" class="filt-tab table">
            <tbody>
                    <tr>
                      <td><?php echo $this->Form->input('Newsletter.title', array('required'=>false,'placeholder'=>'Title','label' => false,'class'=>'form-control'));?></td>
                       <td><?php echo $this->Form->input('Newsletter.newsletter_category_id', array('required'=>false,'label' => false,'class'=>'form-control','empty'=>'Select Category'));?></td>
                       <td><?php echo $this->Form->input('Newsletter.status',array('label' => false,'class'=>'form-control select2me ','options'=>array('0'=>'Draft','1'=>'Public'),'empty'=>'Select Status','required'=>false));?></td>
                       
                        <td><?php echo $this->Form->button('<i class="fa fa-search"></i> Filter', array('class' => 'btn default','title' => 'Click here to Search'),array('escape'=>false) );?>&nbsp;</td>
                     </tr>
            </tbody>
           
            </table>
             <?php  echo $this->Form->end(); ?> 
        </div>
        <div style="clear:both"> </div>
     </div>
    </div>
</div> 
</br>      
 <!--End Search -->
<!-- Flash Messages -->   
<?php echo $this->Session->flash(); ?> 
<!-- Flash Messages -->  
<div class="row">
    <div class="col-md-12">
    	<div class="mart-b">
            <div class="row mart-b">
                <div class="col-md-6">
				<?php
                echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('New Newsletter').'</button>', array('action' => 'add'),array('escape'=> false));?>
               <?php echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-server"></i> '.__('Manage Newsletter Category').'</button>', array('controller' => 'newsletter_categories','action' => 'manage'),array('escape'=> false));     
                ?>
                        </div>
                    </div>
                </div>	
				<div class="table-wrap">
          			<div class="table-head">		
		<!-- BEGIN SAMPLE TABLE PORTLET-->
	
			<div class="table-head">
                <div class="table-head-lt"><i class="fa fa-newspaper-o"></i><?php echo __('Newsleetters List') ?></div>
                <?php echo $this->element('admin/table_toolbar');?>
                <div style="clear:both"></div>
            </div>
            <div style="padding:20px 10px 0px 10px;" class="table-responsive">
               <table cellspacing="0" cellpadding="0" border="0" class=" table">
                  <thead>
                    <tr>
                        <th>Sr.No</th>                                
                        <th><?php echo $this->Paginator->sort('title'); ?></th> 
                        <th><?php echo $this->Paginator->sort('subject'); ?></th>                                
                        <th><?php echo __('Actions'); ?></th>                            
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
				
			
                             if(count($newsletters)>0){
								$currentPage = empty($this->Paginator->params['paging']['Newsletter']['page']) ? 1 : $this->Paginator->params['paging']['Newsletter']['page'];
								$limit = $this->Paginator->params['paging']['Newsletter']['limit'];	
								$startSN = (($currentPage * $limit) + 1) - $limit; 
                             foreach ($newsletters as $newsletter){ ?>			
            
                                <tr>
                                        <td><?php echo $startSN++; ?></td>                            
                                        <td><?php echo h($newsletter['Newsletter']['title']); ?></td>                            
                                        <td><?php echo h($newsletter['Newsletter']['subject']); ?></td>
						<td class="actions">
                           <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',   array('action'=>'edit', $newsletter['Newsletter']['id']),array('escape' => false ,'title'=>'Edit',"class" => "btn default btn-sm",  'alt' => 'Edit Detail') ); ?> 
						
						    <?php echo $this->Html->link('<i class="fa fa-mail-forward"></i>',   array('action'=>'sendnewsletter', $newsletter['Newsletter']['newsletter_category_id'],$newsletter['Newsletter']['id']),array('escape' => false ,"class" => "btn default btn-sm" ,'title'=>'Send') ); ?> 
									<?php echo $this->Form->postLink('<i class="fa fa-trash-o"></i>',   array('action'=>'delete', $newsletter['Newsletter']['id']), array('escape' => false,"class" => "btn default btn-sm", 'title'=>'Delete'), __('Are you sure you want to delete # %s?', $newsletter['Newsletter']['id']));  ?>
						</td>
					</tr>
				<?php } 
					}
					else{
					?>
					<tr><td colspan='4' align='center'><?php echo NO_RECORD; ?></td></tr>
					<?php
					} 
					 ?>
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
</div>
<!-- END PAGE CONTENT-->