<?php
echo $this->Html->script('/acl/js/acl_plugin');
?>
			<table class="col-md-12 table-bordered   table-condensed cf">
        		<thead class="cf">
        			<tr>
        				<th>Action</th>
                        <td>Permission</td>
                    </tr>
                </thead>
        		<tbody>
        			
        		
<?php
$js_init_done = array();
foreach($actions as $controller_name => $values)
{
	foreach($values as $action) {
				echo '<tr>';
	    		
	    		echo '<td data-title="' . $action['name'].'">' . $action['name'].'</td>';
	    		
		    	    echo '<td data-title="Price" class="numeric" >';
		    	    
					if(!empty($action['plugin']))
					{
						$plugin_name =  $action['plugin'];
						$full_action = $plugin_name . '_' . $controller_name . '_' . $user[$user_model_name][$user_pk_name];
						echo '<span id="right_' . $plugin_name . '_' . $user[$user_model_name][$user_pk_name] . '_' . $controller_name . '_' .$action['name'] . '">';
					}
					else
					{
						$plugin_name =  "";
						$full_action = $controller_name . '_' . $user[$user_model_name][$user_pk_name];
						echo '<span id="right__' . $user[$user_model_name][$user_pk_name] . '_' . $controller_name . '_' . $action['name'] . '">';
					}
					
					echo $this->Html->image('/acl/img/ajax/waiting16.gif', array('title' => __d('acl', 'loading')));
					
					
					if(!in_array($full_action , $js_init_done))
					{
						
						
						$js_init_done[] = $full_action;		
						$this->Js->buffer('init_register_user_controller_toggle_right("' . $this->Html->url('/', true) . '", "' . $user[$user_model_name][$user_pk_name] . '", "'. $plugin_name .'" , "' . $controller_name . '", "' . __d('acl', 'The ACO node is probably missing. Please try to rebuild the ACOs first.') . '");');
					
					}		
							
					echo '</span>';
							
					echo $this->Html->image('/acl/img/ajax/waiting16.gif', array('id' => 'right__' . $user[$user_model_name][$user_pk_name] . '_' . $controller_name . '_' . $action['name'] . '_spinner', 'style' => 'display:none;'));
				
					echo '</td>';
		    	
	    		
		    	echo '</tr>';
			}
}
 echo $this->Js->writeBuffer();
?>
</tbody>
</table>
<script type="text/javascript">
//jQuery("[name='my-checkbox']").bootstrapSwitch();
</script>