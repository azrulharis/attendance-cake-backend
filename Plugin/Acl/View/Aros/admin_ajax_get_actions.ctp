<?php
echo $this->Html->script('/acl/js/acl_plugin');
?>
			<table class="col-md-12 table-bordered   table-condensed cf">
        		<thead class="cf">
        			<tr>
        				<th>Action</th>
                        <?php foreach($roles as $role) { 
                        echo '<th class="numeric">'.$role[$role_model_name][$role_display_field].'</th>';
                         } ?>
                    </tr>
                </thead>
        		<tbody>
        			
        		
<?php

foreach($actions as $controller_name => $values)
{
	foreach($values as $action) {
				echo '<tr>';
	    		
	    		echo '<td data-title="' . $action['name'].'">' . $action['name'].'</td>';
	    		
		    	foreach($roles as $role)
		    	{
		    	    echo '<td data-title="Price" class="numeric" >';
		    	    echo '<span id="right__' . $role[$role_model_name][$role_pk_name] . '_' . $controller_name . '_' . $action['name'] . '">';
	    		
		    	    if(isset($action['permissions'][$role[$role_model_name][$role_pk_name]]))
		    	    {
    		    		if($action['permissions'][$role[$role_model_name][$role_pk_name]] == 1)
    		    		{
							$this->Js->buffer('register_role_toggle_right(true, "' . $this->Html->url('/') . '", "right__' . $role[$role_model_name][$role_pk_name] . '_' . $controller_name . '_' . $action['name'] . '", "' . $role[$role_model_name][$role_pk_name] . '", "", "' . $controller_name . '", "' . $action['name'] . '")');
        		    
    		    			//echo '<input type="checkbox" name="my-checkbox" checked>';
							//echo $this->Form->input('',array('type'=>'checkbox','name'=>'my-checkbox','class' => 'pointer','checked'));
    		    			echo $this->Html->image('/acl/img/design/tick.png', array('class' => 'pointer', 'alt' => 'granted'));

						}
    		    		else
    		    		{
    		    			$this->Js->buffer('register_role_toggle_right(false, "' . $this->Html->url('/') . '", "right__' . $role[$role_model_name][$role_pk_name] . '_' . $controller_name . '_' . $action['name'] . '", "' . $role[$role_model_name][$role_pk_name] . '", "", "' . $controller_name . '", "' . $action['name'] . '")');
    		    		   //echo '<input type="checkbox" name="my-checkbox" >';
						    //echo $this->Form->input('',array('type'=>'checkbox','name'=>'my-checkbox','class' => 'pointer'));
    		    		        echo $this->Html->image('/acl/img/design/cross.png', array('class' => 'pointer', 'alt' => 'denied'));

						}
						
						//register_role_toggle_right(start_granted, app_root_url, span_id, role_id, plugin, controller, action);
		    	    }
		    	    else
		    	    {
		    	        /*
		    	         * The right of the action for the role is unknown
		    	         */
		    	        echo $this->Html->image('/acl/img/design/important16.png', array('title' => __d('acl', 'The ACO node is probably missing. Please try to rebuild the ACOs first.')));
		    	    }
		    		
		    		echo '</span>';
	    	
        	    	echo ' ';
        	    	echo $this->Html->image('/acl/img/ajax/waiting16.gif', array('id' => 'right__' . $role[$role_model_name][$role_pk_name] . '_' . $controller_name . '_' . $action['name'] . '_spinner', 'style' => 'display:none;'));
            		
        	    	echo '</td>';
		    	}
	    		
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