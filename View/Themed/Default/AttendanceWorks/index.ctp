
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Attendance Works'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>
<div class="attendanceWorks index">
	
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('attendance_worker_id'); ?></th>
			<th><?php echo $this->Paginator->sort('work_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($attendanceWorks as $attendanceWork): ?>
	<tr>
		<td><?php echo h($attendanceWork['AttendanceWork']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($attendanceWork['AttendanceWorker']['id'], array('controller' => 'attendance_workers', 'action' => 'view', $attendanceWork['AttendanceWorker']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($attendanceWork['Work']['name'], array('controller' => 'works', 'action' => 'view', $attendanceWork['Work']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $attendanceWork['AttendanceWork']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $attendanceWork['AttendanceWork']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $attendanceWork['AttendanceWork']['id']), array(), __('Are you sure you want to delete # %s?', $attendanceWork['AttendanceWork']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<ul class="pagination">
	<?php
		echo $this->Paginator->prev('<i class="fa fa-angle-left"></i>', array('tag' => 'li', 'escape' => false), '<i class="fa fa-angle-left"></i>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
		echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
		echo $this->Paginator->next('<i class="fa fa-angle-right"></i>', array('tag' => 'li', 'escape' => false), '<i class="fa fa-angle-right"></i>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
	?>
	</ul>
</div>
 
</div>
</div>
</div>
</div> 