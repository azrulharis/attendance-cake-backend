<div class="projectDepartments index">
	<h2><?php echo __('Project Departments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('company_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('start'); ?></th>
			<th><?php echo $this->Paginator->sort('end'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($projectDepartments as $projectDepartment): ?>
	<tr>
		<td><?php echo h($projectDepartment['ProjectDepartment']['id']); ?>&nbsp;</td>
		<td><?php echo h($projectDepartment['ProjectDepartment']['name']); ?>&nbsp;</td>
		<td><?php echo h($projectDepartment['ProjectDepartment']['code']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($projectDepartment['Company']['name'], array('controller' => 'companies', 'action' => 'view', $projectDepartment['Company']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($projectDepartment['User']['id'], array('controller' => 'users', 'action' => 'view', $projectDepartment['User']['id'])); ?>
		</td>
		<td><?php echo h($projectDepartment['ProjectDepartment']['created']); ?>&nbsp;</td>
		<td><?php echo h($projectDepartment['ProjectDepartment']['modified']); ?>&nbsp;</td>
		<td><?php echo h($projectDepartment['ProjectDepartment']['start']); ?>&nbsp;</td>
		<td><?php echo h($projectDepartment['ProjectDepartment']['end']); ?>&nbsp;</td>
		<td><?php echo h($projectDepartment['ProjectDepartment']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $projectDepartment['ProjectDepartment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $projectDepartment['ProjectDepartment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $projectDepartment['ProjectDepartment']['id']), array(), __('Are you sure you want to delete # %s?', $projectDepartment['ProjectDepartment']['id'])); ?>
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
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Project Department'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Resource Requests'), array('controller' => 'project_resource_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Resource Request'), array('controller' => 'project_resource_requests', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Resources'), array('controller' => 'project_resources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Resource'), array('controller' => 'project_resources', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Attendances'), array('controller' => 'user_attendances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Attendance'), array('controller' => 'user_attendances', 'action' => 'add')); ?> </li>
	</ul>
</div>
