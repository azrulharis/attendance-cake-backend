
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Attendance Machine'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
      <?php echo $this->Session->flash(); ?>
<div class="attendanceMachines view-data">

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($attendanceMachine['AttendanceMachine']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attendance'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attendanceMachine['Attendance']['id'], array('controller' => 'attendances', 'action' => 'view', $attendanceMachine['Attendance']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Machine'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attendanceMachine['Machine']['name'], array('controller' => 'machines', 'action' => 'view', $attendanceMachine['Machine']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project Machine'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attendanceMachine['ProjectMachine']['id'], array('controller' => 'project_machines', 'action' => 'view', $attendanceMachine['ProjectMachine']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Worker'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attendanceMachine['Worker']['name'], array('controller' => 'workers', 'action' => 'view', $attendanceMachine['Worker']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('In'); ?></dt>
		<dd>
			<?php echo h($attendanceMachine['AttendanceMachine']['in']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Out'); ?></dt>
		<dd>
			<?php echo h($attendanceMachine['AttendanceMachine']['out']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Hours'); ?></dt>
		<dd>
			<?php echo h($attendanceMachine['AttendanceMachine']['total_hours']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Adjusted Time'); ?></dt>
		<dd>
			<?php echo h($attendanceMachine['AttendanceMachine']['adjusted_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remark'); ?></dt>
		<dd>
			<?php echo h($attendanceMachine['AttendanceMachine']['remark']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Working Location'); ?></dt>
		<dd>
			<?php echo h($attendanceMachine['AttendanceMachine']['working_location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ot'); ?></dt>
		<dd>
			<?php echo h($attendanceMachine['AttendanceMachine']['ot']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($attendanceMachine['AttendanceMachine']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($attendanceMachine['AttendanceMachine']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($attendanceMachine['AttendanceMachine']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('In Fuel'); ?></dt>
		<dd>
			<?php echo h($attendanceMachine['AttendanceMachine']['in_fuel']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Out Fuel'); ?></dt>
		<dd>
			<?php echo h($attendanceMachine['AttendanceMachine']['out_fuel']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Attendance Machine'), array('action' => 'edit', $attendanceMachine['AttendanceMachine']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Attendance Machine'), array('action' => 'delete', $attendanceMachine['AttendanceMachine']['id']), array(), __('Are you sure you want to delete # %s?', $attendanceMachine['AttendanceMachine']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Attendance Machines'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendance Machine'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attendances'), array('controller' => 'attendances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendance'), array('controller' => 'attendances', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Machines'), array('controller' => 'machines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Machine'), array('controller' => 'machines', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Machines'), array('controller' => 'project_machines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Machine'), array('controller' => 'project_machines', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workers'), array('controller' => 'workers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Worker'), array('controller' => 'workers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ot Request Machines'), array('controller' => 'ot_request_machines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ot Request Machine'), array('controller' => 'ot_request_machines', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Ot Request Machines'); ?></h3>
	<?php if (!empty($attendanceMachine['OtRequestMachine'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Ot Request Id'); ?></th>
		<th><?php echo __('Machine Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Attendance Machine Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($attendanceMachine['OtRequestMachine'] as $otRequestMachine): ?>
		<tr>
			<td><?php echo $otRequestMachine['id']; ?></td>
			<td><?php echo $otRequestMachine['ot_request_id']; ?></td>
			<td><?php echo $otRequestMachine['machine_id']; ?></td>
			<td><?php echo $otRequestMachine['status']; ?></td>
			<td><?php echo $otRequestMachine['attendance_machine_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ot_request_machines', 'action' => 'view', $otRequestMachine['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ot_request_machines', 'action' => 'edit', $otRequestMachine['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ot_request_machines', 'action' => 'delete', $otRequestMachine['id']), array(), __('Are you sure you want to delete # %s?', $otRequestMachine['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ot Request Machine'), array('controller' => 'ot_request_machines', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>


</div>
    </div>
  </div> 
</div>