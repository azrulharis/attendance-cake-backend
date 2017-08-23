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
			<a href="javascript:void();">Permission</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			Build Missing Acos
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
			 echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('Bulid Missing AROs').'</button>', array('controller' => 'aros','action' => 'check','plugin' => 'acl', 'admin'=>true), array('escape' => false)); 
			 echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('User Roles').'</button>', array('controller' => 'aros','action' => 'users','plugin' => 'acl', 'admin'=>true), array('escape' => false));
			 echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('Roles Permissions').'</button>', array('controller' => 'aros','action' => 'ajax_role_permissions','plugin' => 'acl', 'admin'=>true), array('escape' => false)); 
			 echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('User Permissions').'</button>', array('controller' => 'aros','action' => 'user_permissions','plugin' => 'acl', 'admin'=>true), array('escape' => false)); 
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
            <div class="table-head-lt"><i class="fa fa-cogs"></i><?php echo __('Synchronize'); ?></div>
            <?php echo $this->element('table_toolbar'); ?>
            <div style="clear:both"></div>
        </div>
			<div style="padding:20px 10px 0px 10px;" class="table-responsive">

<?php
if(count($missing_aros['roles']) > 0)
{
	echo '<h3>' . __d('acl', 'Roles without corresponding Aro') . '</h3>';
	
	$list = array();
	foreach($missing_aros['roles'] as $missing_aro)
	{
		$list[] = $missing_aro[$role_model_name][$role_display_field];
	}
	
	echo $this->Html->nestedList($list);
}
?>

<?php
if(count($missing_aros['users']) > 0)
{
	echo '<h3>' . __d('acl', 'Users without corresponding Aro') . '</h3>';
	
	$list = array();
	foreach($missing_aros['users'] as $missing_aro)
	{
		$list[] = $missing_aro[$user_model_name][$user_display_field];
	}
	
	echo $this->Html->nestedList($list);
}
?>

<?php
if(count($missing_aros['roles']) > 0 || count($missing_aros['users']) > 0)
{
	echo '<p>';
	echo $this->Html->link(__d('acl', 'Build'), '/admin/acl/aros/check/run');
	echo '</p>';
}
else
{
	echo '<p>';
	echo __d('acl', 'There is no missing ARO.');
	echo '</p>';
}
?>
			</div>
		</div>
		<!-- END SAMPLE TABLE PORTLET-->
	</div>
</div>

