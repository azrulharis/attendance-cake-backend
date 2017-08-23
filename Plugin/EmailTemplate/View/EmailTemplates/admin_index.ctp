<?php echo $this->Html->link('<button type="button" class="btn btn-success"><i class="fa fa-plus"></i> '.__('Add Email Template').'</button>', array('action' => 'add'), array('escape' => false)); ?>

<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2>Email Template</h2> 
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>
 

        <?php echo $this->Form->create('EmailTemplate', array('controller' => 'email_templates', 'action' => 'index','novalidate'=>true)); ?>
        	<table cellspacing="0" cellpadding="0" border="0" class="table table-bordered">
            <tbody>
                    <tr>
                       
                       <td style="padding-left:1%"><?php echo $this->Form->input('EmailTemplate.title', array('type' => 'text','placeholder'=>'Title','label' => false,'class'=>'form-control'));?></td>
                       
                      <td  style="padding-left:1%" class="sandbox-container">
                                <?php echo $this->Form->input('EmailTemplate.from', array('type'=> 'text' , 'class'=> 'form-control', 'placeholder' => 'From Created','label'=> false , 'div' => false,'hiddenField'=>false)); ?>
                        </td>
						<td  style="padding-left:1%" class="sandbox-container">
                                <?php echo $this->Form->input('EmailTemplate.to', array('type'=> 'text' , 'class'=> 'form-control', 'placeholder' => 'To Created','label'=> false , 'div' => false,'hiddenField'=>false)); ?>
                        </td>         
                       <td style="padding-left:1%"><?php echo $this->Form->button('<i class="fa fa-search"></i>Filter', array('class' => 'btn default','title' => 'Click here to Search'),array('escape'=>false) );?></td>
            </tbody>
            </table>
            <?php
                            echo $this->Form->end(); ?> 
         
 
<!--End Search -->
 
         
                <?php echo $this->element('admin/table_toolbar');?>
              
            <div style="padding:20px 10px 0px 10px;" class="table-responsive">
               <table cellspacing="0" cellpadding="0" border="0" class=" table">
                  <thead>
                    <tr>
                      <th><?php echo __('S.No'); ?></th>
                      <th><?php echo $this->Paginator->sort('title'); ?></th>                                                
                      <th><?php echo $this->Paginator->sort('status'); ?></th>                                                
                      <th><?php echo $this->Paginator->sort('created'); ?></th>
                      <th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
                  </thead>
                  <tbody>
                    <?php 
					   if(count($emailTemplates))
							{
							$currentPage = empty($this->Paginator->params['paging']['EmailTemplate']['page']) ? 1 : $this->Paginator->params['paging']['EmailTemplate']['page'];
							$limit = $this->Paginator->params['paging']['EmailTemplate']['limit'];	
							
							$startSN = (($currentPage * $limit) + 1) - $limit; 
					   foreach ($emailTemplates as $emailTemplate){ ?>
						<tr>
							<td>
								<?php echo $startSN++; ?>
							</td>
							<td>
								<?php echo h($emailTemplate['EmailTemplate']['title']); ?>
							</td>
							<td>
							<?php
									$changStatus = ($emailTemplate['EmailTemplate']['status'] == 1) ? 0 : 1;
									if( $emailTemplate['EmailTemplate']['status'] == 0)
										 echo $this->Html->link(__('<i class="fa fa-times"></i>'), array('action'=>'status',$emailTemplate['EmailTemplate']['id'],$changStatus),array('class' => 'btn purple','escape'=>false,'title'=>'Active'));
									else
										 echo $this->Html->link(__('<i class="fa fa-check"></i>'), array('action'=>'status',$emailTemplate['EmailTemplate']['id'],$changStatus),array('class' => 'btn blue','escape'=>false,'title'=>'Active'));
								?>
								 
							</td>
							<td>
							<?php echo h(date(Configure::read('Reading.date_time_format'),strtotime($emailTemplate['EmailTemplate']['created']))); ?>
							</td>
						<td class="actions">
							<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $emailTemplate['EmailTemplate']['id']), array("class" => "btn default btn-sm", "escape" => false, "alt" => "Edit Detail", "title" => "Edit Detail")); ?>
							<?php echo $this->Form->postLink('<i class="fa fa-trash-o"></i>', array('action' => 'delete', $emailTemplate['EmailTemplate']['id']), array("class" => "btn default btn-sm", "escape" => false, "alt" => "Delete Record", "title" => "Delete Record"), __('Are you sure you want to delete # %s?', $emailTemplate['EmailTemplate']['id'])); ?>
						</td>
					</tr>
				<?php } 
					}
					else{
					?>
					<tr><td colspan='6' align='center'><?php echo NO_RECORD; ?></td></tr>
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
</div>  