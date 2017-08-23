<!-- BEGIN PAGE HEADER-->
<h3 class="page-header"><?php echo __('ACL Plugin'); ?></h3>
<div class="bram">
	<ul class="breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<?php echo $this->Html->link('Home',array('controller'=>'users','action'=>'dashboard','plugin'=>false));?>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="javascript:void();">Access Manager</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="javascript:void();">Action</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			Prune Action ACOs
		</li>
	</ul>
	<div style="clear:both"></div>

</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row" style="margin-bottom:10px;">
	<div class="col-md-12">
		<div class="clearfix  right">
		<?php 
				echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('Synchronize ACOs').'</button>', array('controller' => 'acos','action' => 'synchronize','plugin' => 'acl', 'admin'=>true), array('escape' => false));
				echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('Clear Action ACOs').'</button>', array('controller' => 'acos','action' => 'empty_acos','plugin' => 'acl', 'admin'=>true), array('escape' => false)); 
				echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('Bulid Action ACOs').'</button>', array('controller' => 'acos','action' => 'build_acl','plugin' => 'acl', 'admin'=>true), array('escape' => false)); 
				echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('Prune Action ACOs').'</button>', array('controller' => 'acos','action' => 'prune_acos','plugin' => 'acl', 'admin'=>true), array('escape' => false)); 
			?>
		</div>
	</div>
</div>				

<div class="row">
	<div class="col-md-12">
		<?php echo $this->Session->flash(); ?>
		<!-- BEGIN SAMPLE TABLE PORTLET-->
         <div class="table-wrap">
			<div class="table-head">
				<div class="table-head-lt"><i class="fa fa-cogs"></i><?php echo __('Prune acos') ?></div>

				<?php echo $this->element('table_toolbar'); ?>
                <div style="clear:both"></div>
			</div>
		<div style="padding:20px 10px 0px 10px;" class="table-responsive">

<?php
if($run)
{
    if(count($logs) > 0)
    {
        echo '<p>';
        echo __d('acl', 'The following actions ACOs have been pruned');
        echo '<p>';
        echo $this->Html->nestedList($logs);
    }
    else
    {
        echo '<p>';
        echo __d('acl', 'There was no actions ACOs to prune');
        echo '</p>';
    }
}
else
{
    echo '<p>';
    echo __d('acl', 'This page allows you to prune obsolete ACOs.');
    echo '</p>';
    
    echo '<p>&nbsp;</p>';
    
    if(count($nodes_to_prune) > 0)
    {
        echo '<h3>' . __d('acl', 'Obsolete ACO nodes') . '</h3>';
	    
	    echo '<p>';
    	echo $this->Html->nestedList($nodes_to_prune);
    	echo '</p>';
    
    	echo '<p>&nbsp;</p>';
    	
        echo '<p>';
        echo __d('acl', 'Clicking the link will not change or remove permissions for actions ACOs that are not obsolete.');
        echo '</p>';
        
        echo '<p>';
        echo $this->Html->link($this->Html->image('/acl/img/design/clean.png') . ' ' . __d('acl', 'Prune'), '/admin/acl/acos/prune_acos/run', array('escape' => false));
        echo '</p>';
    }
    else
    {
        echo '<p style="font-style:italic;">';
        echo $this->Html->image('/acl/img/design/tick.png') . ' ' . __d('acl', 'There is no ACO node to delete');
        echo '</p>';
    }
}
?>			
			</div>
		</div>
		<!-- END SAMPLE TABLE PORTLET-->
	</div>
</div>
