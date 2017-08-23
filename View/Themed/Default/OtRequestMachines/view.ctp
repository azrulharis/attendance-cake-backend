
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Ot Request Machine'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
      
<div class="otRequestMachines view-data">

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($otRequestMachine['OtRequestMachine']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ot Request'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otRequestMachine['OtRequest']['id'], array('controller' => 'ot_requests', 'action' => 'view', $otRequestMachine['OtRequest']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Machine'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otRequestMachine['Machine']['name'], array('controller' => 'machines', 'action' => 'view', $otRequestMachine['Machine']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($otRequestMachine['OtRequestMachine']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attendance Machine'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otRequestMachine['AttendanceMachine']['id'], array('controller' => 'attendance_machines', 'action' => 'view', $otRequestMachine['AttendanceMachine']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ot Request Machine'), array('action' => 'edit', $otRequestMachine['OtRequestMachine']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ot Request Machine'), array('action' => 'delete', $otRequestMachine['OtRequestMachine']['id']), array(), __('Are you sure you want to delete # %s?', $otRequestMachine['OtRequestMachine']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ot Request Machines'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ot Request Machine'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ot Requests'), array('controller' => 'ot_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ot Request'), array('controller' => 'ot_requests', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Machines'), array('controller' => 'machines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Machine'), array('controller' => 'machines', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attendance Machines'), array('controller' => 'attendance_machines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendance Machine'), array('controller' => 'attendance_machines', 'action' => 'add')); ?> </li>
	</ul>
</div>


</div>
    </div>
  </div> 
</div>