<!-- BEGIN PAGE HEADER-->
<h1 class="page-header"><?php echo __('Configurations'); ?> </h1>
   <div style="margin-bottom:15px;margin-top:10px;" class="btn-group btn-breadcrumb" id="bc1">
    <?php echo $this->Html->link('<i class="fa fa-home"></i>', array('plugin' => false, 'controller' => 'users','action' => 'dashboard'),array('style'=>'background:#000000;','escape'=>false,'class'=>'btn btn-default')); ?>
     <?php echo $this->Html->link(__('Configuration'), array('plugin' => 'configuration', 'controller' => 'configurations','action' => 'index'),array('escape'=>false,'class'=>'btn btn-default')); ?>
    <a class="btn btn-default active" href="javascript::void();" style="display: block;"><div>List</div></a> 
    <a class="" href="#"><div></div></a> 
 </div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<?php echo $this->Session->flash(); ?> 
<div class="row">
    <div class="col-md-12">
    	<div class="mart-b">
            <div class="row mart-b">
                <div class="col-md-6">
                 <?php echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('New Configuration').'</button>', array('action' => 'add'), array('escape' => false)); ?>
                 </div>
            </div>
    	</div>
        <div class="table-wrap">
            <div class="table-head">
                <div class="table-head-lt"><i class="fa fa-cogs"></i><?php echo __('Configurations List') ?></div>
                <?php echo $this->element('admin/table_toolbar');?>
                <div style="clear:both"></div>
            </div>
            <div style="padding:20px 10px 0px 10px;" class="table-responsive ">
               <table cellspacing="0" cellpadding="0" border="0" class="table">
                  <thead>
                    <tr>
                      <th><?php echo __('S.No.');?></th>
					  <th><?php echo $this->Paginator->sort('name');?></th>
                      <th><?php echo $this->Paginator->sort('value');?></th>
					  <th class="actions"><?php echo __('Actions');?></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
				
					if(count($configurations))
					{
						$currentPage = empty($this->Paginator->params['paging']['Configuration']['page']) ? 1 : $this->Paginator->params['paging']['Configuration']['page'];
						$limit = $this->Paginator->params['paging']['Configuration']['limit'];	
						$startSN = (($currentPage * $limit) + 1) - $limit;
				
				foreach ($configurations as $configuration){ ?>

					<tr>
						<td ><?php echo $startSN++; ?></td>
						<td><?php echo $configuration['Configuration']['name']; ?></td>
						<td ><?php echo __($configuration['Configuration']['value']); ?></td>
						<td class="actions" >
							<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $configuration['Configuration']['id']), array("class" => "btn default btn-sm", "escape" => false, "alt" => "Edit Detail", "title" => "Edit Detail")); ?>
							<?php echo $this->Form->postLink('<i class="fa fa-trash-o"></i>', array('action' => 'delete', $configuration['Configuration']['id']), array("class" => "btn default btn-sm", "escape" => false, "alt" => "Delete Record", "title" => "Delete Record"), __('Are you sure you want to delete # %s?', $configuration['Configuration']['id'])); ?>
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
	
