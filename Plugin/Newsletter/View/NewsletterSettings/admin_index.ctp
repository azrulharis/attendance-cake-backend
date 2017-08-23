<!-- BEGIN PAGE HEADER-->
<h1 class="page-header">
Settings </h1>
<div class="bram">
	<ul>
		<li>
			<i class="fa fa-home"></i>
			<?php echo $this->Html->link(__('Home'), array('plugin' => false, 'controller' => 'users','action' => 'dashboard')); ?>
			<i class="fa fa-angle-right"></i>
		</li>
        <li>
        	<?php echo $this->Html->link(__('Newsletter Setting'), array('action' => 'index')); ?>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<?php echo __('List'); ?>
		</li>
	</ul>
	<div style="clear:both;"></div>
</div>
<!-- END PAGE HEADER--><!-- BEGIN PAGE CONTENT-->
<!-- Flash Messages -->   
<?php echo $this->Session->flash(); ?> 
<!-- Flash Messages --> 
<div class="row">
    <div class="col-md-12">
    		<div class="mart-b">
            <div class="row mart-b">
                <div class="col-md-6">
				<?php
                echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('New Setting').'</button>', array('action' => 'add'),array('escape'=> false));
                ?>
                        </div>
                    </div>
                </div>
				<div class="table-wrap">
          			<div class="table-head">		
		<!-- BEGIN SAMPLE TABLE PORTLET-->
	
			<div class="table-head">
                <div class="table-head-lt"><i class="fa fa-gear"></i><?php echo __('Newsleetter Settings') ?></div>
                <?php echo $this->element('admin/table_toolbar');?>
                <div style="clear:both"></div>
            </div>
            <div style="padding:20px 10px 0px 10px;" class="table-responsive filter-responsive">
               <table cellspacing="0" cellpadding="0" border="0" class=" table">
                  <thead>
                    <tr>
                        <th>S.No.</th>                                
                        <th><?php echo $this->Paginator->sort('transport'); ?></th> 
                        <th><?php echo $this->Paginator->sort('host'); ?></th>
                        <th><?php echo $this->Paginator->sort('port'); ?></th>
                        <th><?php echo $this->Paginator->sort('username'); ?></th>
                        <th><?php echo $this->Paginator->sort('password'); ?></th>                                
                        <th><?php echo __('Actions'); ?></th>                            
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
				
			
                             if(count($newsletterSettings)>0){
								$currentPage = empty($this->Paginator->params['paging']['NewsletterSetting']['page']) ? 1 : $this->Paginator->params['paging']['NewsletterSetting']['page'];
								$limit = $this->Paginator->params['paging']['NewsletterSetting']['limit'];	
								$startSN = (($currentPage * $limit) + 1) - $limit; 
           	                  foreach ($newsletterSettings as $newsletter){ ?>			
                                <tr>
                                        <td><?php echo $startSN++; ?></td>                            
                                        <td><?php echo h($newsletter['NewsletterSetting']['transport']); ?></td>                            			<td><?php echo h($newsletter['NewsletterSetting']['host']); ?></td>
                                        <td><?php echo $newsletter['NewsletterSetting']['port']; ?></td>
                                        <td><?php echo h($newsletter['NewsletterSetting']['username']); ?></td>                            			<td><?php echo h($newsletter['NewsletterSetting']['password']); ?></td>
                                        <td class="actions">
                                           <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',   array('action'=>'edit', $newsletter['NewsletterSetting']['id']),array('escape' => false ,'title'=>'Edit',"class" => "btn default btn-sm",  'alt' => 'Edit Detail') ); ?> 
                                          <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',   array('action'=>'delete', $newsletter['NewsletterSetting']['id']), array('escape' => false,"class" => "btn default btn-sm", 'title'=>'Delete'), __('Are you sure you want to delete # %s?', $newsletter['NewsletterSetting']['id']));  ?>
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
		             </div>
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
               <div style="clear:both"> </div>		
                </div>
            </div>
      </div>
</div>
