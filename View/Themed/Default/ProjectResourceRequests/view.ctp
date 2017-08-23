<div class="projectResourceRequests view">
<h2><?php echo __('Project Resource Request'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($projectResourceRequest['ProjectResourceRequest']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectResourceRequest['Project']['name'], array('controller' => 'projects', 'action' => 'view', $projectResourceRequest['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project Department'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectResourceRequest['ProjectDepartment']['name'], array('controller' => 'project_departments', 'action' => 'view', $projectResourceRequest['ProjectDepartment']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectResourceRequest['Company']['name'], array('controller' => 'companies', 'action' => 'view', $projectResourceRequest['Company']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($projectResourceRequest['ProjectResourceRequest']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($projectResourceRequest['ProjectResourceRequest']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($projectResourceRequest['ProjectResourceRequest']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectResourceRequest['User']['id'], array('controller' => 'users', 'action' => 'view', $projectResourceRequest['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date From'); ?></dt>
		<dd>
			<?php echo h($projectResourceRequest['ProjectResourceRequest']['date_from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date To'); ?></dt>
		<dd>
			<?php echo h($projectResourceRequest['ProjectResourceRequest']['date_to']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project Resource Request'), array('action' => 'edit', $projectResourceRequest['ProjectResourceRequest']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Project Resource Request'), array('action' => 'delete', $projectResourceRequest['ProjectResourceRequest']['id']), array(), __('Are you sure you want to delete # %s?', $projectResourceRequest['ProjectResourceRequest']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Resource Requests'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Resource Request'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Project Resource Request Users'); ?></h3>
	<?php if (!empty($projectResourceRequest['ProjectResourceRequestUser'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Project Resource Request Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($projectResourceRequest['ProjectResourceRequestUser'] as $projectResourceRequestUser): ?>
		<tr>
			<td><?php echo $projectResourceRequestUser['id']; ?></td>
			<td><?php echo $projectResourceRequestUser['user_id']; ?></td>
			<td><?php echo $projectResourceRequestUser['project_resource_request_id']; ?></td>
			<td><?php echo $projectResourceRequestUser['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'project_resource_request_users', 'action' => 'view', $projectResourceRequestUser['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'project_resource_request_users', 'action' => 'edit', $projectResourceRequestUser['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'project_resource_request_users', 'action' => 'delete', $projectResourceRequestUser['id']), array(), __('Are you sure you want to delete # %s?', $projectResourceRequestUser['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Project Resource Request User'), array('controller' => 'project_resource_request_users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
