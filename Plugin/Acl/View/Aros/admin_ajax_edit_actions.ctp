<div style="overflow-y: scroll;">
<table class="col-md-12 table-bordered table-condensed cf table">


<?php

foreach($actions as $id	=>	$action)
{
			echo '<tr>';
			echo '<td style="padding-left:52px;">'.$action.'</td>';
			echo '<td style="text-align:center;width:100px;padding: 8px 8px;" >'.$this->Html->link('Edit',array('action'=>'edit_action',$id),array('target'=>'blank')).'</td>';
			echo '<td style="text-align:center;width:100px;padding: 8px 8px;" >'.$this->Html->link('Delete','javascript:void(0)',array('rel'=>'delete','class'=>'cakeReadyAjax','cakeready-link'=>BASE_URL.'admin/acl/aros/delete_action/'.$id)).'</td>';
			echo '<td style="text-align:center;width:100px;padding: 8px 8px;" >'.$this->Html->link('Move Up','javascript:void(0)',array('rel'=>'move up','class'=>'cakeReadyAjax','cakeready-link'=>BASE_URL.'admin/acl/aros/moveup/'.$id.'/1')).'</td>';
			echo '<td style="text-align:center;width:100px;padding: 8px 8px;" >'.$this->Html->link('Move Down','javascript:void(0)',array('rel'=>'move down','class'=>'cakeReadyAjax','cakeready-link'=>BASE_URL.'admin/acl/aros/movedown/'.$id.'/1')).'</td>';
		    echo '</tr>';
}

?>
</table>
</div>
