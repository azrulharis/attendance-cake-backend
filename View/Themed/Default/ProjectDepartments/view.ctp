<div class="projectDepartments view">
<h2><?php echo __('Project Department'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($projectDepartment['ProjectDepartment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($projectDepartment['ProjectDepartment']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($projectDepartment['ProjectDepartment']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectDepartment['Company']['name'], array('controller' => 'companies', 'action' => 'view', $projectDepartment['Company']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectDepartment['User']['id'], array('controller' => 'users', 'action' => 'view', $projectDepartment['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($projectDepartment['ProjectDepartment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($projectDepartment['ProjectDepartment']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start'); ?></dt>
		<dd>
			<?php echo h($projectDepartment['ProjectDepartment']['start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End'); ?></dt>
		<dd>
			<?php echo h($projectDepartment['ProjectDepartment']['end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($projectDepartment['ProjectDepartment']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project Department'), array('action' => 'edit', $projectDepartment['ProjectDepartment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Project Department'), array('action' => 'delete', $projectDepartment['ProjectDepartment']['id']), array(), __('Are you sure you want to delete # %s?', $projectDepartment['ProjectDepartment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Departments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Department'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Project Resource Requests'); ?></h3>
	<?php if (!empty($projectDepartment['ProjectResourceRequest'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Project Department Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Date From'); ?></th>
		<th><?php echo __('Date To'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($projectDepartment['ProjectResourceRequest'] as $projectResourceRequest): ?>
		<tr>
			<td><?php echo $projectResourceRequest['id']; ?></td>
			<td><?php echo $projectResourceRequest['project_id']; ?></td>
			<td><?php echo $projectResourceRequest['project_department_id']; ?></td>
			<td><?php echo $projectResourceRequest['company_id']; ?></td>
			<td><?php echo $projectResourceRequest['created']; ?></td>
			<td><?php echo $projectResourceRequest['modified']; ?></td>
			<td><?php echo $projectResourceRequest['status']; ?></td>
			<td><?php echo $projectResourceRequest['user_id']; ?></td>
			<td><?php echo $projectResourceRequest['date_from']; ?></td>
			<td><?php echo $projectResourceRequest['date_to']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'project_resource_requests', 'action' => 'view', $projectResourceRequest['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'project_resource_requests', 'action' => 'edit', $projectResourceRequest['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'project_resource_requests', 'action' => 'delete', $projectResourceRequest['id']), array(), __('Are you sure you want to delete # %s?', $projectResourceRequest['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Project Resource Request'), array('controller' => 'project_resource_requests', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Project Resources'); ?></h3>
	<?php if (!empty($projectDepartment['ProjectResource'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Project Department Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($projectDepartment['ProjectResource'] as $projectResource): ?>
		<tr>
			<td><?php echo $projectResource['id']; ?></td>
			<td><?php echo $projectResource['project_id']; ?></td>
			<td><?php echo $projectResource['project_department_id']; ?></td>
			<td><?php echo $projectResource['user_id']; ?></td>
			<td><?php echo $projectResource['company_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'project_resources', 'action' => 'view', $projectResource['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'project_resources', 'action' => 'edit', $projectResource['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'project_resources', 'action' => 'delete', $projectResource['id']), array(), __('Are you sure you want to delete # %s?', $projectResource['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Project Resource'), array('controller' => 'project_resources', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related User Attendances'); ?></h3>
	<?php if (!empty($projectDepartment['UserAttendance'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('Project Department Id'); ?></th>
		<th><?php echo __('In'); ?></th>
		<th><?php echo __('Out'); ?></th>
		<th><?php echo __('Photo In'); ?></th>
		<th><?php echo __('Dir In'); ?></th>
		<th><?php echo __('Photo Out'); ?></th>
		<th><?php echo __('Dir Out'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($projectDepartment['UserAttendance'] as $userAttendance): ?>
		<tr>
			<td><?php echo $userAttendance['id']; ?></td>
			<td><?php echo $userAttendance['project_id']; ?></td>
			<td><?php echo $userAttendance['company_id']; ?></td>
			<td><?php echo $userAttendance['project_department_id']; ?></td>
			<td><?php echo $userAttendance['in']; ?></td>
			<td><?php echo $userAttendance['out']; ?></td>
			<td><?php echo $userAttendance['photo_in']; ?></td>
			<td><?php echo $userAttendance['dir_in']; ?></td>
			<td><?php echo $userAttendance['photo_out']; ?></td>
			<td><?php echo $userAttendance['dir_out']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'user_attendances', 'action' => 'view', $userAttendance['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'user_attendances', 'action' => 'edit', $userAttendance['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_attendances', 'action' => 'delete', $userAttendance['id']), array(), __('Are you sure you want to delete # %s?', $userAttendance['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User Attendance'), array('controller' => 'user_attendances', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
