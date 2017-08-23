
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Attendance'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
      
<div class="attendances view-data">
	
	<dl>
		<dt><?php echo __('Project Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attendance['ProjectGroup']['name'], array('controller' => 'project_groups', 'action' => 'view', $attendance['ProjectGroup']['id'])); ?>
			&nbsp;
		</dd> 
		<dt><?php echo __('Supervisor'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attendance['User']['name'], array('controller' => 'users', 'action' => 'view', $attendance['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attendance['Project']['name'], array('controller' => 'projects', 'action' => 'view', $attendance['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attendance['Company']['name'], array('controller' => 'companies', 'action' => 'view', $attendance['Company']['id'])); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($attendance['Attendance']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($attendance['Attendance']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time In'); ?></dt>
		<dd>
			<?php echo h($attendance['Attendance']['time_in']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time Out'); ?></dt>
		<dd>
			<?php echo h($attendance['Attendance']['time_out']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photo'); ?></dt>
		<dd>
			<?php echo h($attendance['Attendance']['photo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dir'); ?></dt>
		<dd>
			<?php echo h($attendance['Attendance']['dir']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gps'); ?></dt>
		<dd>
			<?php echo h($attendance['Attendance']['gps']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remark'); ?></dt>
		<dd>
			<?php echo h($attendance['Attendance']['remark']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($attendance['Attendance']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($attendance['Attendance']['type']); ?>
			&nbsp;
		</dd>
	</dl>
</div> 
<div class="related">
	<h3><?php echo __('Related Attendance Machines'); ?></h3>
	<?php if (!empty($attendance['AttendanceMachine'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-bordered">
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
	<?php foreach ($attendance['AttendanceMachine'] as $attendanceMachine): ?>
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
	<h3><?php echo __('Related Attendance Workers'); ?></h3>
	<?php if (!empty($attendance['AttendanceWorker'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-bordered">
	<tr> 
		<th><?php echo __('Worker ID'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('In'); ?></th>
		<th><?php echo __('Out'); ?></th>
		<th><?php echo __('Total Hours'); ?></th>
		<th><?php echo __('Adjusted Time'); ?></th>
		<th><?php echo __('Remark'); ?></th>
		<th><?php echo __('Working Location'); ?></th>
		<th><?php echo __('Ot'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($attendance['AttendanceWorker'] as $attendanceWorker): ?>
		<tr> 
			<td><?php echo $attendanceWorker['User']['username']; ?></td>
			<td><?php echo $attendanceWorker['User']['name']; ?></td>
			<td><?php echo $attendanceWorker['created']; ?></td>
			<td><?php echo $attendanceWorker['modified']; ?></td>
			<td><?php echo $attendanceWorker['time_in']; ?></td>
			<td><?php echo $attendanceWorker['time_out']; ?></td>
			<td><?php echo $attendanceWorker['total_hours']; ?></td>
			<td><?php echo $attendanceWorker['adjusted_time']; ?></td>
			<td><?php echo $attendanceWorker['remark']; ?></td>
			<td><?php echo $attendanceWorker['working_location']; ?></td>
			<td><?php echo $attendanceWorker['ot']; ?></td>
			<td><?php echo $attendanceWorker['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'attendance_workers', 'action' => 'view', $attendanceWorker['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'attendance_workers', 'action' => 'edit', $attendanceWorker['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'attendance_workers', 'action' => 'delete', $attendanceWorker['id']), array(), __('Are you sure you want to delete # %s?', $attendanceWorker['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Attendance Worker'), array('controller' => 'attendance_workers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Ot Requests'); ?></h3>
	<?php if (!empty($attendance['OtRequest'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-bordered">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Project Manager'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('Project Group Id'); ?></th>
		<th><?php echo __('Attendance Id'); ?></th>
		<th><?php echo __('Ot From'); ?></th>
		<th><?php echo __('Ot To'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Sv Remark'); ?></th>
		<th><?php echo __('Pm Remark'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($attendance['OtRequest'] as $otRequest): ?>
		<tr>
			<td><?php echo $otRequest['id']; ?></td>
			<td><?php echo $otRequest['user_id']; ?></td>
			<td><?php echo $otRequest['project_manager']; ?></td>
			<td><?php echo $otRequest['project_id']; ?></td>
			<td><?php echo $otRequest['company_id']; ?></td>
			<td><?php echo $otRequest['project_group_id']; ?></td>
			<td><?php echo $otRequest['attendance_id']; ?></td>
			<td><?php echo $otRequest['ot_from']; ?></td>
			<td><?php echo $otRequest['ot_to']; ?></td>
			<td><?php echo $otRequest['status']; ?></td>
			<td><?php echo $otRequest['type']; ?></td>
			<td><?php echo $otRequest['sv_remark']; ?></td>
			<td><?php echo $otRequest['pm_remark']; ?></td>
			<td><?php echo $otRequest['created']; ?></td>
			<td><?php echo $otRequest['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ot_requests', 'action' => 'view', $otRequest['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ot_requests', 'action' => 'edit', $otRequest['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ot_requests', 'action' => 'delete', $otRequest['id']), array(), __('Are you sure you want to delete # %s?', $otRequest['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ot Request'), array('controller' => 'ot_requests', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>


</div>
    </div>
  </div> 
</div>