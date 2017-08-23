<!-- BEGIN PAGE HEADER-->
<h1 class="page-header"><?php echo __('Contents');
?></h1>
 <div style="margin-bottom:15px;margin-top:10px;" class="btn-group btn-breadcrumb" id="bc1">
    <?php echo $this->Html->link('<i class="fa fa-home"></i>', array('plugin' => false, 'controller' => 'Contents','action' => 'dashboard'),array('style'=>'background:#000000;','escape'=>false,'class'=>'btn btn-default')); ?>
     <?php echo $this->Html->link(__('Content'), array('plugin' => false, 'controller' => 'Contents','action' => 'index'),array('escape'=>false,'class'=>'btn btn-default')); ?>
    <a class="btn btn-default active" href="javascript::void();" style="display: block;"><div>List</div></a> 
    <a class="" href="#"><div></div></a> 
 </div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE Content-->
<!--For Search -->
<?php echo $this->Session->flash(); ?> 
 
<div class="row">
    <div class="col-md-12">
    	<div class="mart-b">
            <div class="row mart-b">
                <div class="col-md-6">
                 <?php echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('New Content').'</button>', array('controller' => 'contents','action'=>'add', 'label'=>'true', 'plugin'=>'content'), array('escape' => false)); ?>
                </div>
            </div>
    	</div>
        <div class="table-wrap">
            <div class="table-head">
                <div class="table-head-lt"><i class="icon-Content"></i><?php echo __('Contents List') ?></div>
                <?php echo $this->element('admin/table_toolbar');?>
                <div style="clear:both"></div>
            </div>
            <div style="padding:20px 10px 0px 10px;" class="table-responsive">
               <table cellspacing="0" cellpadding="0" border="0" class=" table">
                  <thead>
                    <tr>
                        <th><?php echo __('S.N.'); ?></th>
                        <th>Type</th>
                        <th><?php echo $this->Paginator->sort('title'); ?></th>
                        <th><?php echo $this->Paginator->sort('status'); ?></th>
                        <th><?php echo $this->Paginator->sort('created'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                         			 <?php 
									 if(count($contents))
									 {
										 	$currentPage = empty($this->Paginator->params['paging']['Content']['page']) ? 1 : $this->Paginator->params['paging']['Content']['page'];
										$limit = $this->Paginator->params['paging']['Content']['limit'];	
										$startSN = (($currentPage * $limit) + 1) - $limit;
									 foreach ($contents as $content): ?>
											<tr>
												<td><?php echo $startSN++; ?></td>
                        <td><?php if($content['Content']['type'] == 1) { echo 'News'; } elseif($content['Content']['type'] == 2) { echo 'Training'; } else {
                          echo 'Others';
                          } ?></td>
												<td><?php echo h($content['Content']['title']); ?></td>
												<td>
													<?php	
													
														if($content['Content']['status'] == 1)
															{ echo $status = 'Published'; }
														elseif($content['Content']['status'] == 2)
															{ echo $status = 'Draft';  }
														elseif($content['Content']['status'] == 3)
															{ echo $status = 'Trash'; }
														elseif($content['Content']['status'] == 4)
															{ echo $status = 'Private'; }
														elseif($content['Content']['status'] == 5)
															{ echo $status = 'Pending'; }
																
													?>
												
												</td>
								
								<td><?php echo h(date(Configure::read('Reading.date_time_format'),strtotime($content['Content']['created']))); ?></td>
								
								<td class="actions">
						<?php echo $this->Html->link(__('<i class="fa fa-fw fa-pencil"></i></span>'), array('action' => 'edit', $content['Content']['id']),array("class" => "btn default btn-sm", "escape" => false, "alt" => "Edit Detail", "title" => "Edit Detail")); ?> 
                        
                                                    <?php echo $this->Form->postLink(__('<i class="fa fa-trash-o"></i></span>'), array('action' => 'delete', $content['Content']['id']),array("class" => "btn default btn-sm",'escape' => false ,'title'=>'Delete'), __('Are you sure you want to delete # %s?', $content['Content']['id'])); ?>		
								</td>
								
							</tr>
                     <?php endforeach; 
								}
								else{
								?>
								<tr><td colspan='8' align='center'><?php echo 'NO RECORD Found'; ?></td></tr>
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



