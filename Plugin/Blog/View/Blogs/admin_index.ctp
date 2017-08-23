<!-- BEGIN PAGE HEADER-->
		<?php  $screenOption = Configure::read('Content.ScreenOption'); ?>
			<script type="text/javascript">
				var screenOptionArray = '<?php echo json_encode($screenOption) ?>';
			</script>
<h1 class="page-header"><?php echo __('Blog');
?></h1>
 <div style="margin-bottom:15px;margin-top:10px;" class="btn-group btn-breadcrumb" id="bc1">
    <?php echo $this->Html->link('<i class="fa fa-home"></i>', array('plugin' => false, 'controller' => 'Contents','action' => 'dashboard'),array('style'=>'background:#000000;','escape'=>false,'class'=>'btn btn-default')); ?>
     <?php echo $this->Html->link(__('Blog'), array('plugin' => false, 'controller' => 'blogs','action' => 'index'),array('escape'=>false,'class'=>'btn btn-default')); ?>
    <a class="btn btn-default active" href="javascript::void();" style="display: block;"><div>List</div></a> 
    <a class="" href="#"><div></div></a> 
 </div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE Content-->
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
        <div style="padding:10px 10px 0px 10px;" class="table-responsive filter-responsive new">
        	<?php echo $this->Form->create('Blog', array('controller' => 'blogs', 'action' => 'index','novalidate' => true)); ?>
            
            
        	<table cellspacing="0" cellpadding="0" border="0" class="filt-tab table">
            <tbody>
                    <tr>
                       <td style="padding-left:1%">
					  <?php echo $this->Form->input('Blog.title', array('type' => 'text','placeholder'=>'Title','label' => false,'class'=>'form-control','required'=>false));?></td>
                       <td style="padding-left:1%">
					  <?php echo $this->Form->input('Blog.status', array('label' => false,'class'=>'form-control','options'=>array('1' => 'Published' , '2' => 'Draft','3' => 'Trash' , '4' => 'Private','5' => 'Private' ),'empty'=>'Select Status','required'=>false));?></td> 
              
                         <td  style="padding-left:1%">
						 <div class="input text sandbox-container">
                                <?php echo $this->Form->input('Blog.from', array('type'=> 'text' , 'class'=> 'form-control', 'placeholder' => 'From Created','label'=> false , 'div' => false,'hiddenField'=>false)); ?>
								</div>
                        </td>
						<td  style="padding-left:1%">
						 <div class="input text sandbox-container">
                                <?php echo $this->Form->input('Blog.to', array('type'=> 'text' , 'class'=> 'form-control', 'placeholder' => 'To Created','label'=> false , 'div' => false,'hiddenField'=>false)); ?>
								</div>
                        </td>        
                       <td style="padding-left:1%">
					   
					   <?php echo $this->Form->button('<i class="fa fa-search"></i>Filter', array('class' => 'btn blue','title' => 'Click here to Search'),array('escape'=>false) );?>
					   </td>
                                            </tr>
                      
            </tbody>
            </table>
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
                 <?php echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('New Blog').'</button>', array('controller' => 'blogs','action'=>'add', 'label'=>'true', 'plugin'=>'blog'), array('escape' => false)); ?>
                 
                 <?php echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-list"></i> '.__('List Category').'</button>', array('controller' => 'blog_categories', 'action' => 'index'), array('escape' => false)); ?>
                </div>
            </div>
    	</div>
        <div class="table-wrap">
            <div class="table-head">
                <div class="table-head-lt"><i class="icon-Content"></i><?php echo __('Blogs List') ?></div>
                <?php echo $this->element('admin/table_toolbar');?>
                <div style="clear:both"></div>
            </div>
            <div style="padding:20px 10px 0px 10px;" class="table-responsive">
               <table cellspacing="0" cellpadding="0" border="0" class=" table">
                  <thead>
                    <tr>
                        <th><?php echo __('S.N.'); ?></th>
                        <th><?php echo $this->Paginator->sort('title'); ?></th>
                        <th><?php echo $this->Paginator->sort('status'); ?></th>
                        <th><?php echo $this->Paginator->sort('created'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                         			 <?php 
									 if(count($blogs))
									 {
										$currentPage = empty($this->Paginator->params['paging']['Blog']['page']) ? 1 : $this->Paginator->params['paging']['Blog']['page'];
										$limit = $this->Paginator->params['paging']['Blog']['limit'];	
										$startSN = (($currentPage * $limit) + 1) - $limit;
									 foreach ($blogs as $blog){ ?>
											<tr>
												<td><?php echo $startSN++; ?></td>
												<td><?php echo h($blog['Blog']['title']); ?></td>
												<td>
													<?php	
													
														if($blog['Blog']['status'] == 1)
															{ echo $status = 'Published'; }
														elseif($blog['Blog']['status'] == 2)
															{ echo $status = 'Draft';  }
														elseif($blog['Blog']['status'] == 3)
															{ echo $status = 'Trash'; }
														elseif($blog['Blog']['status'] == 4)
															{ echo $status = 'Private'; }
														elseif($blog['Blog']['status'] == 5)
															{ echo $status = 'Pending'; }
																
													?>
												
												</td>
								
								<td><?php echo h(date(Configure::read('Reading.date_time_format'),strtotime($blog['Blog']['created']))); ?></td>
								
								<td class="actions">
						<?php echo $this->Html->link(__('<i class="fa fa-fw fa-pencil"></i></span>'), array('action' => 'edit', $blog['Blog']['id']),array("class" => "btn default btn-sm", "escape" => false, "alt" => "Edit Detail", "title" => "Edit Detail")); ?> 
                        
                                                    <?php echo $this->Form->postLink(__('<i class="fa fa-trash-o"></i></span>'), array('action' => 'delete', $blog['Blog']['id']),array("class" => "btn default btn-sm",'escape' => false ,'title'=>'Delete'), __('Are you sure you want to delete # %s?', $blog['Blog']['id'])); ?>		
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
