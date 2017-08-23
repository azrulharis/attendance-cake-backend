<div class="projectResourceRequests form">
<?php echo $this->Form->create('ProjectResourceRequest'); ?>
	<fieldset>
		<legend><?php echo __('Edit Project Resource Request'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('project_id');
		echo $this->Form->input('project_department_id');
		echo $this->Form->input('company_id');
		echo $this->Form->input('status');
		echo $this->Form->input('user_id');
		echo $this->Form->input('date_from');
		echo $this->Form->input('date_to');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ProjectResourceRequest.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ProjectResourceRequest.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Project Resource Requests'), array('action' => 'index')); ?></li>
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
