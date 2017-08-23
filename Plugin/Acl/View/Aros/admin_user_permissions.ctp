<!-- BEGIN PAGE HEADER-->
<h3 class="page-header"><?php echo __('User Permission'); ?></h3>
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
			User Permissions
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
			 echo  $this->Html->link('&nbsp;<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('Generate Actions').'</button>', array('controller' => 'aros','action' => 'generate','plugin' => 'acl', 'admin'=>true), array('escape' => false)); 
		    echo  $this->Html->link('&nbsp;<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('Group Permissions').'</button>', array('controller' => 'aros','action' => 'group_permissions','plugin' => 'acl', 'admin'=>true), array('escape' => false)); 
			   echo  $this->Html->link('&nbsp;<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('Edit Group Permissions').'</button>', array('controller' => 'aros','action' => 'edit_group_permissions','plugin' => 'acl', 'admin'=>true), array('escape' => false)); 
             ?>
		</div>
	</div>
</div>				

<div class="row">
	<div class="col-md-12">
		<?php echo $this->Session->flash(); ?>

<?php
if(isset($users))
{
?>
	<?php
    echo $this->Form->create('User', array('class' => 'form-horizontal form-label-left')); 

    echo $this->Form->input($user_display_field, array('label' => false, 'div' => array('class'=>'col-xs-8'),'class'=>'form-control input-medium'));
    echo ' ';
    echo $this->Form->end(array('label' =>__d('acl', 'filter'), 'div' => false,'class'=>'btn btn-primary'));
  
    ?>
		<!-- BEGIN SAMPLE TABLE PORTLET-->
		<div class="table-wrap"> 
			<div style="padding:20px 10px 0px 10px;" class="table-responsive">
			<?php echo __('User Permission'); ?>
				<table cellspacing="0" cellpadding="0" border="0" class=" table">
				<thead class="flip-content">
					<tr>
						<?php
						$column_count = 1;
						
						//$headers = array($this->Paginator->sort(__d('acl', 'user'), $user_display_field));
						
						//echo $this->Html->tableHeaders($headers);
						
						?>
                        <th colspan="2">Username</th>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach($users as $user)
				{
					echo '<tr>';
					echo '  <td>' . $user[$user_model_name][$user_display_field] . '</td>';
					$title = __d('acl', 'Manage user specific rights');
				
					$link = '/admin/acl/aros/user_permissions/' . $user[$user_model_name][$user_pk_name];
					if(Configure :: read('acl.gui.users_permissions.ajax') === true)
					{
						 $link .= '/ajax:true';
					}
					
					echo '  <td>' . $this->Html->link($this->Html->image('/acl/img/design/lock.png'), $link, array('alt' => $title, 'title' => $title, 'escape' => false)) . '</td>';
				
					echo '</tr>';
				}
				?>	
				</tbody>
				</table>
			</div>
		</div>
		<!-- END SAMPLE TABLE PORTLET-->
<?php
}
else
{
?>

		<!-- BEGIN SAMPLE TABLE PORTLET-->
		<div class="table-wrap">
      	<div class="table-head">
            <div class="table-head-lt"><i class="fa fa-cogs"></i><?php echo __('User  Permissions'); ?></div>
            <?php echo $this->element('table_toolbar'); ?>
            <div style="clear:both"></div>
        </div>
			<div style="padding:20px 10px 0px 10px;" class="table-responsive">
				<table cellspacing="0" cellpadding="0" border="0" class=" table">
				<thead class="flip-content">
					<tr>
					<?php
					foreach($roles as $role)
					{
						echo '<td>';
			
						echo $role[$role_model_name][$role_display_field];
						if($role[$role_model_name][$role_pk_name] == $user[$user_model_name][$role_fk_name])
						{
							echo $this->Html->image('/acl/img/design/tick.png');
						}
						else
						{
							$title = __d('acl', 'Update the user role');
							echo $this->Html->link($this->Html->image('/acl/img/design/tick_disabled.png'), array('plugin' => 'acl', 'controller' => 'aros', 'action' => 'update_user_role', 'user' => $user[$user_model_name][$user_pk_name], 'role' => $role[$role_model_name][$role_pk_name]), array('title' => $title, 'alt' => $title, 'escape' => false));
						}
			
						echo '</td>';
					}
					?>
				</tr>
				</thead>
				</table>
			</div>
		</div>
		<!-- END SAMPLE TABLE PORTLET-->
		
		
		<?php
		if($user_has_specific_permissions)
		{
			echo '<div class="separator"></div>';
			echo $this->Html->image('/acl/img/design/bulb24.png') . __d('acl', 'This user has specific permissions');
			echo ' (';
			echo $this->Html->link($this->Html->image('/acl/img/design/cross2.png', array('style' => 'vertical-align:middle;')) . ' ' . __d('acl', 'Clear'), '/admin/acl/aros/clear_user_specific_permissions/' . $user[$user_model_name][$user_pk_name], array('confirm' => __d('acl', 'Are you sure you want to clear the permissions specific to this user ?'), 'escape' => false));
			echo ')';
			echo '<div class="separator"></div>';
		}
		?>
		<!-- BEGIN SAMPLE TABLE PORTLET-->
		<div class="table-wrap">
      	<div class="table-head">
            <div class="table-head-lt"><i class="fa fa-cogs"></i><?php echo __('Acl Authorization'); ?></div>
            <div class="table-head-rt">
               <ul>
                 <li><a href="javascript:;"><?php echo $this->Html->image('btn.png');?></a></li>
                 <li><a href="javascript:;"><?php echo $this->Html->image('btn.png');?></a></li>
                 <li><a href="javascript:;"><?php echo $this->Html->image('btn.png');?></a></li>
               </ul>
            </div>
            <div style="clear:both"></div>
        </div>
			<div style="padding:20px 10px 0px 10px;" class="table-responsive">
				<table cellspacing="0" cellpadding="0" border="0" class=" table">
				<thead class="flip-content">
					<tr>
						<?php
				
						$column_count = 1;
				
						$headers = array(__d('acl', 'action'), __d('acl', 'authorization'));
				
						echo $this->Html->tableHeaders($headers);
						?>
					</tr>
				</thead>

				<tbody>
				<?php
				$js_init_done = array();
				$previous_ctrl_name = '';
				
				if(isset($actions['app']) && is_array($actions['app']))
				{
					foreach($actions['app'] as $controller_name => $ctrl_infos)
					{
						if($previous_ctrl_name != $controller_name)
						{
							$previous_ctrl_name = $controller_name;
				
							$color = (isset($color) && $color == 'color1') ? 'color2' : 'color1';
						}
				
						foreach($ctrl_infos as $ctrl_info)
						{
							echo '<tr class="' . $color . '">';
				
							echo '<td>' . $controller_name . '->' . $ctrl_info['name'] . '</td>';
				
							echo '<td>';
							echo '<span id="right__' . $user[$user_model_name][$user_pk_name] . '_' . $controller_name . '_' . $ctrl_info['name'] . '">';
				
							/*
							* The right of the action for the role must still be loaded
							*/
							echo $this->Html->image('/acl/img/ajax/waiting16.gif', array('title' => __d('acl', 'loading')));
				
							if(!in_array($controller_name . '_' . $user[$user_model_name][$user_pk_name], $js_init_done))
							{
								$js_init_done[] = $controller_name . '_' . $user[$user_model_name][$user_pk_name];
								$this->Js->buffer('init_register_user_controller_toggle_right("' . $this->Html->url('/', true) . '", "' . $user[$user_model_name][$user_pk_name] . '", "", "' . $controller_name . '", "' . __d('acl', 'The ACO node is probably missing. Please try to rebuild the ACOs first.') . '");');
							}
							
							echo '</span>';
				
							echo ' ';
							echo $this->Html->image('/acl/img/ajax/waiting16.gif', array('id' => 'right__' . $user[$user_model_name][$user_pk_name] . '_' . $controller_name . '_' . $ctrl_info['name'] . '_spinner', 'style' => 'display:none;'));
				
							echo '</td>';
							echo '</tr>';
						}
					}
				}
				?>
				<?php
				if(isset($actions['plugin']) && is_array($actions['plugin']))
				{
					foreach($actions['plugin'] as $plugin_name => $plugin_ctrler_infos)
					{
						echo '<tr class="title"><td colspan="2">' . __d('acl', 'Plugin') . ' ' . $plugin_name . '</td></tr>';
			
						foreach($plugin_ctrler_infos as $plugin_ctrler_name => $plugin_methods)
						{
							if($previous_ctrl_name != $plugin_ctrler_name)
							{
								$previous_ctrl_name = $plugin_ctrler_name;
			
								$color = (isset($color) && $color == 'color1') ? 'color2' : 'color1';
							}
			
							foreach($plugin_methods as $method)
							{
								echo '<tr class="' . $color . '">';
			
								echo '<td>' . $plugin_ctrler_name . '->' . $method['name'] . '</td>';
			
								echo '<td>';
								echo '<span id="right_' . $plugin_name . '_' . $user[$user_model_name][$user_pk_name] . '_' . $plugin_ctrler_name . '_' . $method['name'] . '">';
			
								/*
								* The right of the action for the role must still be loaded
								*/
								echo $this->Html->image('/acl/img/ajax/waiting16.gif', array('title' => __d('acl', 'loading')));
			
								if(!in_array($plugin_name . "_" . $plugin_ctrler_name . '_' . $user[$user_model_name][$user_pk_name], $js_init_done))
								{
									$js_init_done[] = $plugin_name . "_" . $plugin_ctrler_name . '_' . $user[$user_model_name][$user_pk_name];
									$this->Js->buffer('init_register_user_controller_toggle_right("' . $this->Html->url('/', true) . '", "' . $user[$user_model_name][$user_pk_name] . '", "' . $plugin_name . '", "' . $plugin_ctrler_name . '", "' . __d('acl', 'The ACO node is probably missing. Please try to rebuild the ACOs first.') . '");');
								}
								
								echo '</span>';
			
								echo ' ';
								echo $this->Html->image('/acl/img/ajax/waiting16.gif', array('id' => 'right_' . $plugin_name . '_' . $user[$user_model_name][$user_pk_name] . '_' . $plugin_ctrler_name . '_' . $method['name'] . '_spinner', 'style' => 'display:none;'));
			
								echo '</td>';
								echo '</tr>';
							}
						}
					}
				}
				?>
				</tbody>
				</table>
			</div>
		</div>
		<!-- END SAMPLE TABLE PORTLET-->

		
<?php
}
?>

	</div>
</div>
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				 Widget settings form goes here
			</div>
			<div class="modal-footer">
				<button type="button" class="btn blue">Save changes</button>
				<button type="button" class="btn default" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<?php
echo $this->Html->script('/acl/js/jquery');
echo $this->Html->script('/acl/js/acl_plugin');

echo $this->element('design/footer');
?>