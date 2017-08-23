<?php echo $this->Html->link('Worker Attendance', array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false)); ?> 

<?php echo $this->Html->link('Edit', array('action' => 'edit', $attendanceWorker['AttendanceWorker']['id']), array('class' => 'btn btn-warning', 'escape' => false)); ?> 
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Attendance Worker'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
      
<div class="attendanceWorkers view-data">

	<dl>
		<dt><?php echo __('Worker ID'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attendanceWorker['User']['username'], array('controller' => 'users', 'action' => 'view', $attendanceWorker['User']['id'])); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Worker Name'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attendanceWorker['User']['name'], array('controller' => 'users', 'action' => 'view', $attendanceWorker['User']['id'])); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($attendanceWorker['AttendanceWorker']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($attendanceWorker['AttendanceWorker']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('In'); ?></dt>
		<dd>
			<?php echo h($attendanceWorker['AttendanceWorker']['time_in']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Out'); ?></dt>
		<dd>
			<?php echo h($attendanceWorker['AttendanceWorker']['time_out']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Hours'); ?></dt>
		<dd>
			<?php echo h($attendanceWorker['AttendanceWorker']['total_hours']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Adjusted Time'); ?></dt>
		<dd>
			<?php echo h($attendanceWorker['AttendanceWorker']['adjusted_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remark'); ?></dt>
		<dd>
			<?php echo h($attendanceWorker['AttendanceWorker']['remark']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Working Location'); ?></dt>
		<dd>
			<?php echo h($attendanceWorker['AttendanceWorker']['working_location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ot'); ?></dt>
		<dd>
			<?php echo h($attendanceWorker['AttendanceWorker']['ot']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($attendanceWorker['AttendanceWorker']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
 
<div class="related">
	<h3><?php echo __('Related Attendance Works'); ?></h3>
	<?php if (!empty($attendanceWorker['AttendanceWork'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Attendance Worker Id'); ?></th>
		<th><?php echo __('Work Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($attendanceWorker['AttendanceWork'] as $attendanceWork): ?>
		<tr>
			<td><?php echo $attendanceWork['id']; ?></td>
			<td><?php echo $attendanceWork['attendance_worker_id']; ?></td>
			<td><?php echo $attendanceWork['work_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'attendance_works', 'action' => 'view', $attendanceWork['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'attendance_works', 'action' => 'edit', $attendanceWork['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'attendance_works', 'action' => 'delete', $attendanceWork['id']), array(), __('Are you sure you want to delete # %s?', $attendanceWork['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Attendance Work'), array('controller' => 'attendance_works', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Ot Request Workers'); ?></h3>
	<?php if (!empty($attendanceWorker['OtRequestWorker'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Ot Request Id'); ?></th>
		<th><?php echo __('Worker Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Attendance Worker Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($attendanceWorker['OtRequestWorker'] as $otRequestWorker): ?>
		<tr>
			<td><?php echo $otRequestWorker['id']; ?></td>
			<td><?php echo $otRequestWorker['ot_request_id']; ?></td>
			<td><?php echo $otRequestWorker['worker_id']; ?></td>
			<td><?php echo $otRequestWorker['status']; ?></td>
			<td><?php echo $otRequestWorker['attendance_worker_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ot_request_workers', 'action' => 'view', $otRequestWorker['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ot_request_workers', 'action' => 'edit', $otRequestWorker['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ot_request_workers', 'action' => 'delete', $otRequestWorker['id']), array(), __('Are you sure you want to delete # %s?', $otRequestWorker['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ot Request Worker'), array('controller' => 'ot_request_workers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>


	  </div>
    </div>
  </div> 
</div>