<div class="projectResourceRequests index">
	<h2><?php echo __('Project Resource Requests'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('project_id'); ?></th>
			<th><?php echo $this->Paginator->sort('project_department_id'); ?></th>
			<th><?php echo $this->Paginator->sort('company_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('date_from'); ?></th>
			<th><?php echo $this->Paginator->sort('date_to'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($projectResourceRequests as $projectResourceRequest): ?>
	<tr>
		<td><?php echo h($projectResourceRequest['ProjectResourceRequest']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($projectResourceRequest['Project']['name'], array('controller' => 'projects', 'action' => 'view', $projectResourceRequest['Project']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($projectResourceRequest['ProjectDepartment']['name'], array('controller' => 'project_departments', 'action' => 'view', $projectResourceRequest['ProjectDepartment']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($projectResourceRequest['Company']['name'], array('controller' => 'companies', 'action' => 'view', $projectResourceRequest['Company']['id'])); ?>
		</td>
		<td><?php echo h($projectResourceRequest['ProjectResourceRequest']['created']); ?>&nbsp;</td>
		<td><?php echo h($projectResourceRequest['ProjectResourceRequest']['modified']); ?>&nbsp;</td>
		<td><?php echo h($projectResourceRequest['ProjectResourceRequest']['status']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($projectResourceRequest['User']['id'], array('controller' => 'users', 'action' => 'view', $projectResourceRequest['User']['id'])); ?>
		</td>
		<td><?php echo h($projectResourceRequest['ProjectResourceRequest']['date_from']); ?>&nbsp;</td>
		<td><?php echo h($projectResourceRequest['ProjectResourceRequest']['date_to']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $projectResourceRequest['ProjectResourceRequest']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $projectResourceRequest['ProjectResourceRequest']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $projectResourceRequest['ProjectResourceRequest']['id']), array(), __('Are you sure you want to delete # %s?', $projectResourceRequest['ProjectResourceRequest']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Project Resource Request'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Departments'), array('controller' => 'project_departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Department'), array('controller' => 'project_departments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Resource Request Users'), array('controller' => 'project_resource_request_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Resource Request User'), array('controller' => 'project_resource_request_users', 'action' => 'add')); ?> </li>
	</ul>
</div>
