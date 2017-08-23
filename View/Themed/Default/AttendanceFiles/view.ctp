
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Attendance File'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
      
<div class="attendanceFiles view-data">

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($attendanceFile['AttendanceFile']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attendance'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attendanceFile['Attendance']['id'], array('controller' => 'attendances', 'action' => 'view', $attendanceFile['Attendance']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($attendanceFile['AttendanceFile']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dir'); ?></dt>
		<dd>
			<?php echo h($attendanceFile['AttendanceFile']['dir']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Attendance File'), array('action' => 'edit', $attendanceFile['AttendanceFile']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Attendance File'), array('action' => 'delete', $attendanceFile['AttendanceFile']['id']), array(), __('Are you sure you want to delete # %s?', $attendanceFile['AttendanceFile']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Attendance Files'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendance File'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attendances'), array('controller' => 'attendances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendance'), array('controller' => 'attendances', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attendance Workers'), array('controller' => 'attendance_workers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendance Worker'), array('controller' => 'attendance_workers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Attendance Workers'); ?></h3>
	<?php if (!empty($attendanceFile['AttendanceWorker'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Attendance Id'); ?></th>
		<th><?php echo __('Attendance File Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Time In'); ?></th>
		<th><?php echo __('Time Out'); ?></th>
		<th><?php echo __('Total Hours'); ?></th>
		<th><?php echo __('Adjusted Time'); ?></th>
		<th><?php echo __('Remark'); ?></th>
		<th><?php echo __('Working Location'); ?></th>
		<th><?php echo __('Ot'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($attendanceFile['AttendanceWorker'] as $attendanceWorker): ?>
		<tr>
			<td><?php echo $attendanceWorker['id']; ?></td>
			<td><?php echo $attendanceWorker['attendance_id']; ?></td>
			<td><?php echo $attendanceWorker['attendance_file_id']; ?></td>
			<td><?php echo $attendanceWorker['user_id']; ?></td>
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


</div>
    </div>
  </div> 
</div>