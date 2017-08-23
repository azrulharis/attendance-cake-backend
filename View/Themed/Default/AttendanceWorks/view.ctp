
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Attendance Work'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
      
<div class="attendanceWorks view-data">

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($attendanceWork['AttendanceWork']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attendance Worker'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attendanceWork['AttendanceWorker']['id'], array('controller' => 'attendance_workers', 'action' => 'view', $attendanceWork['AttendanceWorker']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Work'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attendanceWork['Work']['name'], array('controller' => 'works', 'action' => 'view', $attendanceWork['Work']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Attendance Work'), array('action' => 'edit', $attendanceWork['AttendanceWork']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Attendance Work'), array('action' => 'delete', $attendanceWork['AttendanceWork']['id']), array(), __('Are you sure you want to delete # %s?', $attendanceWork['AttendanceWork']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Attendance Works'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendance Work'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attendance Workers'), array('controller' => 'attendance_workers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendance Worker'), array('controller' => 'attendance_workers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Works'), array('controller' => 'works', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work'), array('controller' => 'works', 'action' => 'add')); ?> </li>
	</ul>
</div>


</div>
    </div>
  </div> 
</div>