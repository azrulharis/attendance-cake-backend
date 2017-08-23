
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Attendance Machines'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>
<div class="attendanceMachines index">
	
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('attendance_id'); ?></th>
			<th><?php echo $this->Paginator->sort('machine_id'); ?></th>
			<th><?php echo $this->Paginator->sort('project_machine_id'); ?></th>
			<th><?php echo $this->Paginator->sort('worker_id'); ?></th>
			<th><?php echo $this->Paginator->sort('in'); ?></th>
			<th><?php echo $this->Paginator->sort('out'); ?></th>
			<th><?php echo $this->Paginator->sort('total_hours'); ?></th>
			<th><?php echo $this->Paginator->sort('adjusted_time'); ?></th>
			<th><?php echo $this->Paginator->sort('remark'); ?></th>
			<th><?php echo $this->Paginator->sort('working_location'); ?></th>
			<th><?php echo $this->Paginator->sort('ot'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('in_fuel'); ?></th>
			<th><?php echo $this->Paginator->sort('out_fuel'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($attendanceMachines as $attendanceMachine): ?>
	<tr>
		<td><?php echo h($attendanceMachine['AttendanceMachine']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($attendanceMachine['Attendance']['id'], array('controller' => 'attendances', 'action' => 'view', $attendanceMachine['Attendance']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($attendanceMachine['Machine']['name'], array('controller' => 'machines', 'action' => 'view', $attendanceMachine['Machine']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($attendanceMachine['ProjectMachine']['id'], array('controller' => 'project_machines', 'action' => 'view', $attendanceMachine['ProjectMachine']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($attendanceMachine['Worker']['name'], array('controller' => 'workers', 'action' => 'view', $attendanceMachine['Worker']['id'])); ?>
		</td>
		<td><?php echo h($attendanceMachine['AttendanceMachine']['in']); ?>&nbsp;</td>
		<td><?php echo h($attendanceMachine['AttendanceMachine']['out']); ?>&nbsp;</td>
		<td><?php echo h($attendanceMachine['AttendanceMachine']['total_hours']); ?>&nbsp;</td>
		<td><?php echo h($attendanceMachine['AttendanceMachine']['adjusted_time']); ?>&nbsp;</td>
		<td><?php echo h($attendanceMachine['AttendanceMachine']['remark']); ?>&nbsp;</td>
		<td><?php echo h($attendanceMachine['AttendanceMachine']['working_location']); ?>&nbsp;</td>
		<td><?php echo h($attendanceMachine['AttendanceMachine']['ot']); ?>&nbsp;</td>
		<td><?php echo h($attendanceMachine['AttendanceMachine']['status']); ?>&nbsp;</td>
		<td><?php echo h($attendanceMachine['AttendanceMachine']['created']); ?>&nbsp;</td>
		<td><?php echo h($attendanceMachine['AttendanceMachine']['modified']); ?>&nbsp;</td>
		<td><?php echo h($attendanceMachine['AttendanceMachine']['in_fuel']); ?>&nbsp;</td>
		<td><?php echo h($attendanceMachine['AttendanceMachine']['out_fuel']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $attendanceMachine['AttendanceMachine']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $attendanceMachine['AttendanceMachine']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $attendanceMachine['AttendanceMachine']['id']), array(), __('Are you sure you want to delete # %s?', $attendanceMachine['AttendanceMachine']['id'])); ?>
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