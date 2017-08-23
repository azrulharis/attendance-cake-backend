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
			User Roles
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
            <div class="table-head-lt"><i class="fa fa-cogs"></i><?php echo __('User'); ?></div>
            <?php echo $this->element('table_toolbar'); ?>
            <div style="clear:both"></div>
        </div>
			<div style="padding:20px 10px 0px 10px;" class="table-responsive">
				<table cellspacing="0" cellpadding="0" border="0" class=" table">
            		<thead class="flip-content">
<tr>
	<?php
	$column_count = 1;
	
	$headers = array($this->Paginator->sort($user_display_field, __d('acl', 'name')));
	
	foreach($roles as $role)
	{
	    $headers[] = $role[$role_model_name][$role_display_field];
	    $column_count++;
	}
	
	echo $this->Html->tableHeaders($headers);
	
	?>
	
</tr>				</thead>
				<tbody>


<?php
foreach($users as $user)
{
	
    $style = isset($user['Aro']) ? '' : ' class="line-warning"';
    
    echo '<tr' . $style . '>';
    echo '  <td>' . $user[$user_model_name][$user_display_field] . '</td>';
    
    foreach($roles as $role)
	{
		
	   if(isset($user['Aro']) && $role[$role_model_name][$role_pk_name] == $user[$user_model_name][$role_fk_name])
	   {
	       echo '  <td>' . $this->Form->input('Allow'.$user[$user_model_name][$user_pk_name].$role['Group']['name'],array('type' => 'radio','options'=>'','class' => 'make-switch','data-size' => 'small','div'=>false,'disabled','checked'=>true,'label'=>false,'name' => $user[$user_model_name][$user_pk_name])) . '</td>';
	   }
	   else
	   {
	   	   $title = __d('acl', 'Update the user role');
	       echo '  <td>' . $this->Html->link($this->Form->input('Deny'.$user[$user_model_name][$user_pk_name].$role['Group']['name'],array('type' => 'radio','options'=>'','class' => 'make-switch','data-size' => 'small','div'=>false,'label'=>false,'name' => $user[$user_model_name][$user_pk_name])), '/admin/acl/aros/update_user_role/user:' . $user[$user_model_name][$user_pk_name] . '/role:' . $role[$role_model_name][$role_pk_name], array('title' => $title, 'alt' => $title, 'escape' => false)) . '</td>';
	   }
	}
	
    //echo '  <td>' . (isset($user['Aro']) ? $this->Html->image('/acl/img/design/tick.png') : $this->Html->image('/acl/img/design/cross.png')) . '</td>';
    
    echo '</tr>';
}
?>
				
				</tbody>
				</table>
				
				<p>
				<?php
				echo $this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
				));
				?>	</p>
				<div class="paging">
				<?php
					echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
					echo $this->Paginator->numbers(array('separator' => ''));
					echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
				?>
				</div>
				
			</div>
		</div>
		<!-- END SAMPLE TABLE PORTLET-->
	</div>
</div>
