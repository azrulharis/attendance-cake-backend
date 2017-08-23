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
			<a href="javascript:void();">Role Permission</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			Role Permissions
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
            <div class="table-head-lt"><i class="fa fa-cogs"></i><?php echo __('Role Permissions'); ?></div>
           <?php echo $this->element('table_toolbar'); ?>
            <div style="clear:both"></div>
        </div>
			<div style="padding:20px 10px 0px 10px;" class="table-responsive">
				<table cellspacing="0" cellpadding="0" border="0" class=" table">
				<thead class="flip-content">
					<tr>
						<th></th>
						<th style="text-align:center"><?php echo __d('acl', 'Allow access to <em>all</em>'); ?></th>
						<th style="text-align:center"><?php echo __d('acl', 'Deny access to <em>all</em>'); ?></th>
					</tr>
				</thead>
				<tbody>
      
     
<?php
$i = 0;
foreach($roles as $role)
{
    $color = ($i % 2 == 0) ? 'color1' : 'color2';
    echo '<tr class="' . $color . '">';
    echo '  <td>' . $role[$role_model_name][$role_display_field] . '</td>';
    echo '  <td style="text-align:center">' . $this->Html->link($this->Html->image('/acl/img/design/tick.png'), '/admin/acl/aros/grant_all_controllers/' . $role[$role_model_name][$role_pk_name], array('escape' => false, 'confirm' => sprintf(__d('acl', "Are you sure you want to grant access to all actions of each controller to the role '%s' ?"), $role[$role_model_name][$role_display_field]))) . '</td>';
    echo '  <td style="text-align:center">' . $this->Html->link($this->Html->image('/acl/img/design/cross.png'), '/admin/acl/aros/deny_all_controllers/' . $role[$role_model_name][$role_pk_name], array('escape' => false, 'confirm' => sprintf(__d('acl', "Are you sure you want to deny access to all actions of each controller to the role '%s' ?"), $role[$role_model_name][$role_display_field]))) . '</td>';
    echo '<tr>';
    
    $i++;
}
?>			
				</tbody>
				</table>
			</div>
		</div>
		<!-- END SAMPLE TABLE PORTLET-->
		
        <div class="margin-top-15"></div>
		
		<!-- BEGIN SAMPLE TABLE PORTLET-->
		<div class="table-wrap">
      	<div class="table-head">
            <div class="table-head-lt"><i class="fa fa-cogs"></i><?php echo __('Acl Action'); ?></div>
            <?php echo $this->element('table_toolbar'); ?>
            <div style="clear:both"></div>
        </div>
			<div style="padding:20px 10px 0px 10px;" class="table-responsive">
				<table cellspacing="0" cellpadding="0" border="0" class=" table">
				<thead class="flip-content">
					<tr>
						<?php
						
						$column_count = 1;
						
						$headers = array(__d('acl', 'Action'));
						
						foreach($roles as $role)
						{
							$headers[] = $role[$role_model_name][$role_display_field];
							$column_count++;
						}
						
						echo $this->Html->tableHeaders($headers);
						?>
					</tr>
				</thead>
				<tbody>

<?php
	$js_init_done = array();
	$previous_ctrl_name = '';
	$i = 0;
	
	if(isset($actions['app']) && is_array($actions['app']))
	{
		foreach($actions['app'] as $controller_name => $ctrl_infos)
		{
			if($previous_ctrl_name != $controller_name)
			{
				$previous_ctrl_name = $controller_name;
				
				$color = ($i % 2 == 0) ? 'color1' : 'color2';
			}
			
			foreach($ctrl_infos as $ctrl_info)
			{
	    		echo '<tr class="' . $color . '">
	    		';
	    		
	    		echo '<td>' . $controller_name . '->' . $ctrl_info['name'] . '</td>';
	    		
		    	foreach($roles as $role)
		    	{
		    	    echo '<td>';
		    	    echo '<span id="right__' . $role[$role_model_name][$role_pk_name] . '_' . $controller_name . '_' . $ctrl_info['name'] . '">';
	    			
		    	   /*
					* The right of the action for the role must still be loaded
    		    	*/
    		        echo $this->Html->image('/acl/img/ajax/waiting16.gif', array('title' => __d('acl', 'loading')));
    		    	
    		        if(!in_array($controller_name . '_' . $role[$role_model_name][$role_pk_name], $js_init_done))
    		        {
    		        	$js_init_done[] = $controller_name . '_' . $role[$role_model_name][$role_pk_name];
    		        	$this->Js->buffer('init_register_role_controller_toggle_right("' . $this->Html->url('/', true) . '", "' . $role[$role_model_name][$role_pk_name] . '", "", "' . $controller_name . '", "' . __d('acl', 'The ACO node is probably missing. Please try to rebuild the ACOs first.') . '");');
    		        }
    		        
		    		echo '</span>';
	    	
        	    	echo ' ';
        	    	echo $this->Html->image('/acl/img/ajax/waiting16.gif', array('id' => 'right__' . $role[$role_model_name][$role_pk_name] . '_' . $controller_name . '_' . $ctrl_info['name'] . '_spinner', 'style' => 'display:none;'));
            		
        	    	echo '</td>';
		    	}
	    		
		    	echo '</tr>';
			}
	
			$i++;
		}
	}
	?>
	<?php
	if(isset($actions['plugin']) && is_array($actions['plugin']))
	{
	    foreach($actions['plugin'] as $plugin_name => $plugin_ctrler_infos)
    	{
//    	    debug($plugin_name);
//    	    debug($plugin_ctrler_infos);

    	    $color = null;
    	    
    	    echo '<tr class="title"><td colspan="' . $column_count . '">' . __d('acl', 'Plugin') . ' ' . $plugin_name . '</td></tr>';
    	    
    	    $i = 0;
    	    foreach($plugin_ctrler_infos as $plugin_ctrler_name => $plugin_methods)
    	    {
    	        //debug($plugin_ctrler_name);
    	        //echo '<tr style="background-color:#888888;color:#ffffff;"><td colspan="' . $column_count . '">' . $plugin_ctrler_name . '</td></tr>';
    	        
        	    if($previous_ctrl_name != $plugin_ctrler_name)
        		{
        			$previous_ctrl_name = $plugin_ctrler_name;
        			
        			$color = ($i % 2 == 0) ? 'color1' : 'color2';
        		}
    		
        		
    	        foreach($plugin_methods as $method)
    	        {
    	            echo '<tr class="' . $color . '">
    	            ';
    	            
    	            echo '<td>' . $plugin_ctrler_name . '->' . $method['name'] . '</td>';
    	            //debug($method['name']);
    	            
        	        foreach($roles as $role)
    		    	{
    		    	    echo '<td>';
    		    	    echo '<span id="right_' . $plugin_name . '_' . $role[$role_model_name][$role_pk_name] . '_' . $plugin_ctrler_name . '_' . $method['name'] . '">';
    		    	    
    		    	    /*
    		    	    * The right of the action for the role must still be loaded
    		    	    */
    		    	    echo $this->Html->image('/acl/img/ajax/waiting16.gif', array('title' => __d('acl', 'loading')));
    		    	    
	    		    	if(!in_array($plugin_name . "_" . $plugin_ctrler_name . '_' . $role[$role_model_name][$role_pk_name], $js_init_done))
	    		        {
	    		        	$js_init_done[] = $plugin_name . "_" . $plugin_ctrler_name . '_' . $role[$role_model_name][$role_pk_name];
	    		        	$this->Js->buffer('init_register_role_controller_toggle_right("' . $this->Html->url('/', true) . '", "' . $role[$role_model_name][$role_pk_name] . '", "' . $plugin_name . '", "' . $plugin_ctrler_name . '", "' . __d('acl', 'The ACO node is probably missing. Please try to rebuild the ACOs first.') . '");');
	    		        }
    		        
    		    		echo '</span>';
	    	
            	    	echo ' ';
            	    	echo $this->Html->image('/acl/img/ajax/waiting16.gif', array('id' => 'right_' . $plugin_name . '_' . $role[$role_model_name][$role_pk_name] . '_' . $plugin_ctrler_name . '_' . $method['name'] . '_spinner', 'style' => 'display:none;'));
                		
            	    	echo '</td>';
    		    	}
    		    	
    	            echo '</tr>
    	            ';
    	        }
    	        
    	        $i++;
    	    }
    	}
	}
    ?>			
				</tbody>
				</table>
				
			</div>
		</div>
		<!-- END SAMPLE TABLE PORTLET-->		
		
	</div>
</div>

<?php

echo $this->Html->script('/acl/js/jquery');
echo $this->Html->script('/acl/js/acl_plugin');
?>
<?php
echo $this->element('design/footer');
?>

