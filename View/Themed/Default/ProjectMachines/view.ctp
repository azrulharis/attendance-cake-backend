
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Project Machine'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
      <?php echo $this->Session->flash(); ?>
<div class="projectMachines view-data">

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($projectMachine['ProjectMachine']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Machine'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectMachine['Machine']['name'], array('controller' => 'machines', 'action' => 'view', $projectMachine['Machine']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectMachine['Project']['name'], array('controller' => 'projects', 'action' => 'view', $projectMachine['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($projectMachine['ProjectMachine']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($projectMachine['ProjectMachine']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectMachine['User']['name'], array('controller' => 'users', 'action' => 'view', $projectMachine['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($projectMachine['ProjectMachine']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project Machine'), array('action' => 'edit', $projectMachine['ProjectMachine']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Project Machine'), array('action' => 'delete', $projectMachine['ProjectMachine']['id']), array(), __('Are you sure you want to delete # %s?', $projectMachine['ProjectMachine']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Machines'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Machine'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Machines'), array('controller' => 'machines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Machine'), array('controller' => 'machines', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attendance Machines'), array('controller' => 'attendance_machines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendance Machine'), array('controller' => 'attendance_machines', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Machine Transfers'), array('controller' => 'project_machine_transfers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Machine Transfer'), array('controller' => 'project_machine_transfers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Attendance Machines'); ?></h3>
	<?php if (!empty($projectMachine['AttendanceMachine'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Attendance Id'); ?></th>
		<th><?php echo __('Machine Id'); ?></th>
		<th><?php echo __('Project Machine Id'); ?></th>
		<th><?php echo __('Worker Id'); ?></th>
		<th><?php echo __('In'); ?></th>
		<th><?php echo __('Out'); ?></th>
		<th><?php echo __('Total Hours'); ?></th>
		<th><?php echo __('Adjusted Time'); ?></th>
		<th><?php echo __('Remark'); ?></th>
		<th><?php echo __('Working Location'); ?></th>
		<th><?php echo __('Ot'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('In Fuel'); ?></th>
		<th><?php echo __('Out Fuel'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($projectMachine['AttendanceMachine'] as $attendanceMachine): ?>
		<tr>
			<td><?php echo $attendanceMachine['id']; ?></td>
			<td><?php echo $attendanceMachine['attendance_id']; ?></td>
			<td><?php echo $attendanceMachine['machine_id']; ?></td>
			<td><?php echo $attendanceMachine['project_machine_id']; ?></td>
			<td><?php echo $attendanceMachine['worker_id']; ?></td>
			<td><?php echo $attendanceMachine['in']; ?></td>
			<td><?php echo $attendanceMachine['out']; ?></td>
			<td><?php echo $attendanceMachine['total_hours']; ?></td>
			<td><?php echo $attendanceMachine['adjusted_time']; ?></td>
			<td><?php echo $attendanceMachine['remark']; ?></td>
			<td><?php echo $attendanceMachine['working_location']; ?></td>
			<td><?php echo $attendanceMachine['ot']; ?></td>
			<td><?php echo $attendanceMachine['status']; ?></td>
			<td><?php echo $attendanceMachine['created']; ?></td>
			<td><?php echo $attendanceMachine['modified']; ?></td>
			<td><?php echo $attendanceMachine['in_fuel']; ?></td>
			<td><?php echo $attendanceMachine['out_fuel']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'attendance_machines', 'action' => 'view', $attendanceMachine['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'attendance_machines', 'action' => 'edit', $attendanceMachine['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'attendance_machines', 'action' => 'delete', $attendanceMachine['id']), array(), __('Are you sure you want to delete # %s?', $attendanceMachine['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Attendance Machine'), array('controller' => 'attendance_machines', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Project Machine Transfers'); ?></h3>
	<?php if (!empty($projectMachine['ProjectMachineTransfer'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('From Project'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Project Machine Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Machine Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Received By'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($projectMachine['ProjectMachineTransfer'] as $projectMachineTransfer): ?>
		<tr>
			<td><?php echo $projectMachineTransfer['id']; ?></td>
			<td><?php echo $projectMachineTransfer['from_project']; ?></td>
			<td><?php echo $projectMachineTransfer['project_id']; ?></td>
			<td><?php echo $projectMachineTransfer['project_machine_id']; ?></td>
			<td><?php echo $projectMachineTransfer['user_id']; ?></td>
			<td><?php echo $projectMachineTransfer['machine_id']; ?></td>
			<td><?php echo $projectMachineTransfer['type']; ?></td>
			<td><?php echo $projectMachineTransfer['created']; ?></td>
			<td><?php echo $projectMachineTransfer['modified']; ?></td>
			<td><?php echo $projectMachineTransfer['received_by']; ?></td>
			<td><?php echo $projectMachineTransfer['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'project_machine_transfers', 'action' => 'view', $projectMachineTransfer['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'project_machine_transfers', 'action' => 'edit', $projectMachineTransfer['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'project_machine_transfers', 'action' => 'delete', $projectMachineTransfer['id']), array(), __('Are you sure you want to delete # %s?', $projectMachineTransfer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Project Machine Transfer'), array('controller' => 'project_machine_transfers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>


</div>
    </div>
  </div> 
</div>