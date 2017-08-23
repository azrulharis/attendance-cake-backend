<!-- BEGIN PAGE HEADER-->
<h1 class="page-header"><?php echo __('Subscribers'); ?></h1>

 <div style="margin-bottom:15px;margin-top:10px;" class="btn-group btn-breadcrumb" id="bc1">
    <?php echo $this->Html->link('<i class="fa fa-home"></i>', array('plugin' => false, 'controller' => 'users','action' => 'dashboard'),array('style'=>'background:#000000;','escape'=>false,'class'=>'btn btn-default')); ?>
     <?php echo $this->Html->link(__('Subscriber'), array('plugin' => 'newsletter', 'controller' => 'subscribes',
	 'action' => 'index'),array('escape'=>false,'class'=>'btn btn-default')); ?>
    <a class="btn btn-default active" href="javascript::void();" style="display: block;"><div>List</div></a> 
    <a class="" href="#"><div></div></a> 
    <div class="page-toolbar">
		<div class="btn-group pull-right">
				 <?php echo $this->Html->link('<button type="button" class="btn default" style="border-radius:0px 5px 5px 0px;border:none;border-left:1px solid #ddd;"><i class="fa fa-file-excel-o"></i> '.__('Export CSV').'</button>', array('action' => 'excel_export'),array('escape'=> false));?>
		</div>
	</div>
 </div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<!--For Search -->
<?php echo $this->Session->flash(); ?> 
<div class="row">
    <div class="col-md-12">
      <div class="table-wrap">
      	<div class="table-head">
            <div class="table-head-lt"><i class="fa fa-filter"></i><?php echo __('Filter'); ?></div>
            <?php echo $this->element('admin/table_toolbar');?>
            <div style="clear:both"></div>
        </div>
        <div style="padding:10px 10px 0px 10px;" class="table-responsive filter-responsive">
        <?php echo $this->Form->create('Filter',array(),array('action'=>'index')); ?>
        	<table cellspacing="0" cellpadding="0" border="0" class="filt-tab table">
            <tbody>
                    <tr>
                       	
                       <td style="padding-left:1%"><?php echo $this->Form->input('Filter.keywords', array('type' => 'text','placeholder'=>'Keywords','label' => false,'class'=>'form-control','required'=>false)); ?></td>
                       <td  style="padding-left:1%"><?php echo $this->Form->input('Filter.unsubscribe', array('class' => 'form-control','type'=>'select','options'=>array('0'=>'Unsubscribed','1'=>'Subscribed'),'label'=>false,'empty'=>'Select subscription status'));?>	</td>
                  
                           
                       <td style="padding-left:1%"><?php  echo $this->Form->button('Filter', array('class'=>'btn default','title' => 'Click here to Filter'),array('escape'=>'false')); ?>
						 <?php echo $this->Html->link("Remove Filter", array('action'=>'index'),array('class'=>'btn default','title' => 'Click here to Cancel')); ?> </td>
                     </tr>
            </tbody>
            </table>
            <?php
                            echo $this->Form->end(); ?>
        </div>
        <div style="clear:both"> </div>
     </div>
    </div>
</div>
</br>
<!--End Search -->
<div class="row">
    <div class="col-md-12">
      <div class="table-wrap">
      	<div class="table-head">
            <div class="table-head-lt"><i class="fa fa-group"></i><?php echo __('Add Subscriber'); ?></div>
            <?php echo $this->element('admin/table_toolbar');?>
            <div style="clear:both"></div>
        </div>
        <div style="padding:10px 10px 0px 10px;" class="table-responsive">
        	<?php echo $this->Form->create('Subscribe',array('type'=>'file','novalidate'=>true)); ?>
			<div class="form-body">
				 <div class="row">
				 	<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Name</label>						
							<?php echo $this->Form->input('Subscribe.name', array('class'=>'form-control','placeholder'=>'Name','label'=>false)); ?>									
						</div>					
                    </div>
					<div class="col-md-4">
						<div class="form-group"> 
							<label class="control-label">Email</label>                  
						 <?php  echo $this->Form->input('Subscribe.email', array('class'=>'form-control','placeholder'=>'Email','label'=>false));   ?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group"> 
						<label class="control-label">Phone</label>
						<?php echo $this->Form->input('Subscribe.phone', array('class'=>'form-control','placeholder'=>'Phone','label'=>false)); ?>               	
						</div>
					</div>
				</div>
				<?php //echo $this->Form->input('Subscribe.file',array('type'=>'file','class'=>'btn default'));?>
				<div class="row">		
					<div class="col-md-4">
						<div class="form-group">   
						<label class="control-label">Status</label>                
						<?php echo $this->Form->input('Subscribe.status', array('type'=>'checkbox','class'=>'make-switch','data-on-text'=>'<i class="fa fa-check"></i>' ,'data-off-text'=>'<i class="fa fa-times"></i>','label'=>false));?>
						</div>
					</div>
					<div class="col-md-4">
					  <div class="form-actions right">
					     <br/>
						 <?php echo $this->Form->button('Save', array('class' => 'btn default','title' => 'Click here to add the Subscribe'),array('escape'=>false) );?>	
						 <?php echo $this->Html->link('<button type="button" class="btn default">'.__('Cancel').'</button>', array('action' => 'index'),array('escape'=> false));?>
					  </div>                
					</div> 
			   </div>                              	               
			</div>                      
		<?php echo $this->Form->end(); ?>
        </div>
        <div style="clear:both"> </div>
     </div>
    </div>
</div>
<br />

<div class="row">
    <div class="col-md-12">
    	<div class="table-wrap">
            <div class="table-head">
                <div class="table-head-lt"><i class="fa fa-group"></i><?php echo __('Subscribers List') ?></div>
                <?php echo $this->element('admin/table_toolbar');?>
                <div style="clear:both"></div>
            </div>
            <div style="padding:20px 10px 0px 10px;" class="table-responsive">
               <table cellspacing="0" cellpadding="0" border="0" class=" table">
                  <thead>
                    <tr>
                        <th>S.No.</th>                  
                        <th><?php echo $this->Paginator->sort('email',"Email [Name]"); ?></th>                                  
                        <th><?php echo $this->Paginator->sort('status'); ?></th> 
                        <th><?php echo $this->Paginator->sort('modified'); ?></th>                                 
                        <th class="actions"><?php echo __('Actions'); ?></th>                            
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                             if(count($subscribes)>0){
								$currentPage = empty($this->Paginator->params['paging']['Subscribe']['page']) ? 1 : $this->Paginator->params['paging']['Subscribe']['page'];
								$limit = $this->Paginator->params['paging']['Subscribe']['limit'];	
								$startSN = (($currentPage * $limit) + 1) - $limit; 
                               foreach ($subscribes as $subscribe): ?>
					<tr>
									<td><?php echo $startSN++; ?></td>   
									<td><?php echo h($subscribe['Subscribe']['email']."[".$subscribe['Subscribe']['name']."]"); ?></td>  
									 <td>
									 <?php
										$changStatus = ( $subscribe['Subscribe']['status'] == 1) ? 0 : 1;
										if( $subscribe['Subscribe']['status']== 0)
											echo __('<i class="fa fa-times"></i>');
										else
											echo __('<i class="fa fa-check"></i>');
									?>
								   
									</td>  
									 <td><?php echo h(date(Configure::read('Reading.date_time_format'), strtotime($subscribe['Subscribe']['modified']))); ?></td>				                                       
									 <td>
										<?php echo $this->Html->link('<i class="fa fa-fw fa-search"></i>', array('action' => 'view', $subscribe['Subscribe']['id']),array('escape' => false ,'title'=>'View',"class" => "btn default btn-sm" )); ?>
										 <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',   array('action'=>'edit', $subscribe['Subscribe']['id']),array('escape' => false ,'title'=>'Edit',"class" => "btn default btn-sm") ); ?>  
										 <?php echo $this->Form->postLink('<i class="fa fa-trash-o"></i>',  array('action'=>'delete', $subscribe['Subscribe']['id']), array('escape' => false,"class" => "btn default btn-sm",'title'=>'Delete'), __('Are you sure you want to delete # %s?', $subscribe['Subscribe']['id']));  ?>
									 </td>						
                                 </tr>
				<?php 
								    endforeach; 
                                    unset($subscribe); 
                                    }
                             else
                             {
                                    ?>
								 <tr>
                                    <td align="center" colspan="7"><?php echo NO_RECORD ?></td>
								 </tr>
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
