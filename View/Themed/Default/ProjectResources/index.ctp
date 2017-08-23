<div class="projectResources index">
	<h2><?php echo __('Project Resources'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('project_id'); ?></th>
			<th><?php echo $this->Paginator->sort('project_department_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('company_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($projectResources as $projectResource): ?>
	<tr>
		<td><?php echo h($projectResource['ProjectResource']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($projectResource['Project']['name'], array('controller' => 'projects', 'action' => 'view', $projectResource['Project']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($projectResource['ProjectDepartment']['name'], array('controller' => 'project_departments', 'action' => 'view', $projectResource['ProjectDepartment']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($projectResource['User']['id'], array('controller' => 'users', 'action' => 'view', $projectResource['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($projectResource['Company']['name'], array('controller' => 'companies', 'action' => 'view', $projectResource['Company']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $projectResource['ProjectResource']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $projectResource['ProjectResource']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $projectResource['ProjectResource']['id']), array(), __('Are you sure you want to delete # %s?', $projectResource['ProjectResource']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Project Resource'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Departments'), array('controller' => 'project_departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Department'), array('controller' => 'project_departments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
	</ul>
</div>
