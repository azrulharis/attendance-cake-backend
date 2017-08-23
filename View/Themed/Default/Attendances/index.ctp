
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Attendances'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>
<div class="attendances index">
	
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('project_group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('project_id'); ?></th>
			<th><?php echo $this->Paginator->sort('company_id'); ?></th> 
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('time_in'); ?></th>
			<th><?php echo $this->Paginator->sort('time_out'); ?></th>
			<th><?php echo $this->Paginator->sort('photo'); ?></th>
			<th><?php echo $this->Paginator->sort('dir'); ?></th>
			<th><?php echo $this->Paginator->sort('gps'); ?></th>
			<th><?php echo $this->Paginator->sort('remark'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($attendances as $attendance): ?>
	<tr>
		<td><?php echo h($attendance['Attendance']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($attendance['ProjectGroup']['name'], array('controller' => 'project_groups', 'action' => 'view', $attendance['ProjectGroup']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($attendance['User']['name'], array('controller' => 'users', 'action' => 'view', $attendance['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($attendance['Project']['name'], array('controller' => 'projects', 'action' => 'view', $attendance['Project']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($attendance['Company']['name'], array('controller' => 'companies', 'action' => 'view', $attendance['Company']['id'])); ?>
		</td>
		
		<td><?php echo h($attendance['Attendance']['created']); ?>&nbsp;</td>
		<td><?php echo h($attendance['Attendance']['modified']); ?>&nbsp;</td>
		<td><?php echo h($attendance['Attendance']['time_in']); ?>&nbsp;</td>
		<td><?php echo h($attendance['Attendance']['time_out']); ?>&nbsp;</td>
		<td><?php echo h($attendance['Attendance']['photo']); ?>&nbsp;</td>
		<td><?php echo h($attendance['Attendance']['dir']); ?>&nbsp;</td>
		<td><?php echo h($attendance['Attendance']['gps']); ?>&nbsp;</td>
		<td><?php echo h($attendance['Attendance']['remark']); ?>&nbsp;</td>
		<td><?php echo h($attendance['Attendance']['status']); ?>&nbsp;</td>
		<td><?php echo h($attendance['Attendance']['type']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $attendance['Attendance']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $attendance['Attendance']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $attendance['Attendance']['id']), array(), __('Are you sure you want to delete # %s?', $attendance['Attendance']['id'])); ?>
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