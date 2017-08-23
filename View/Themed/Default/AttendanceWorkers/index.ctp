
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Attendance Workers'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>
<div class="attendanceWorkers index">
	<?php echo $this->Form->create('AttendanceWorker', array('class' => 'form-horizontal', 'type' => 'GET')); ?>
		<table cellpadding="0" cellspacing="0" class="table table-bordered">
			<tr>
			<td><?php echo $this->Form->input('name', array('placeholder' => 'Worker name', 'class' => 'form-control', 'required' => false, 'id' => 'findProduct', 'label' => false)); ?>  
			</td>
			<td><?php echo $this->Form->input('from', array('type' => 'text', 'placeholder' => 'YYYY-MM-DD', 'class' => 'form-control', 'required' => false, 'label' => false, 'id' => 'dateonly')); ?>  
			</td>
			<td><?php echo $this->Form->input('to', array('type' => 'text', 'placeholder' => 'YYYY-MM-DD', 'class' => 'form-control', 'required' => false, 'label' => false, 'id' => 'dateonly_2')); ?>  
			</td> 
			<td><?php echo $this->Form->submit('Search', array('type' => 'submit', 'name' => 'search', 'class' => 'btn btn-success pull-right')); ?></td> 
			</tr>
		</table>
	<?php $this->end(); ?>
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	<thead>
	<tr>  
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th>Project</th>
			<th>Group</th>
			<th><?php echo $this->Paginator->sort('created'); ?></th> 
			<th><?php echo $this->Paginator->sort('in'); ?></th>
			<th><?php echo $this->Paginator->sort('out'); ?></th>
			<th><?php echo $this->Paginator->sort('total_hours'); ?></th>
			<th><?php echo $this->Paginator->sort('adjusted_time'); ?></th>
			<th><?php echo $this->Paginator->sort('remark'); ?></th>
			<th><?php echo $this->Paginator->sort('working_location'); ?></th>
			<th><?php echo $this->Paginator->sort('ot'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($attendanceWorkers as $attendanceWorker): ?>
	<tr> 
		<td>
			<?php echo $this->Html->link($attendanceWorker['User']['name'], array('controller' => 'users', 'action' => 'view', $attendanceWorker['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($attendanceWorker['Attendance']['Project']['name'], array('controller' => 'projects', 'action' => 'view', $attendanceWorker['Attendance']['Project']['id'])); ?>
		</td> 
		<td>
			<?php echo $this->Html->link($attendanceWorker['Attendance']['ProjectGroup']['name'], array('controller' => 'project_groups', 'action' => 'view', $attendanceWorker['Attendance']['ProjectGroup']['id'])); ?>
		</td> 
		<td><?php echo date("Y-m-d", strtotime($attendanceWorker['AttendanceWorker']['created'])); ?>&nbsp;</td> 
		<td><?php echo h($attendanceWorker['AttendanceWorker']['time_in']); ?>&nbsp;</td>
		<td><?php echo h($attendanceWorker['AttendanceWorker']['time_out']); ?>&nbsp;</td>
		<td><?php echo h($attendanceWorker['AttendanceWorker']['total_hours']); ?>&nbsp;</td>
		<td><?php echo h($attendanceWorker['AttendanceWorker']['adjusted_time']); ?>&nbsp;</td>
		<td><?php echo h($attendanceWorker['AttendanceWorker']['remark']); ?>&nbsp;</td>
		<td><?php echo h($attendanceWorker['AttendanceWorker']['working_location']); ?>&nbsp;</td>
		<td><?php echo h($attendanceWorker['AttendanceWorker']['ot']); ?>&nbsp;</td>
		<td><?php echo h($attendanceWorker['AttendanceWorker']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $attendanceWorker['AttendanceWorker']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $attendanceWorker['AttendanceWorker']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $attendanceWorker['AttendanceWorker']['id']), array(), __('Are you sure you want to delete # %s?', $attendanceWorker['AttendanceWorker']['id'])); ?>
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