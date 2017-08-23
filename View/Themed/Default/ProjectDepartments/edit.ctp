<div class="projectDepartments form">
<?php echo $this->Form->create('ProjectDepartment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Project Department'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('code');
		echo $this->Form->input('company_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('start');
		echo $this->Form->input('end');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ProjectDepartment.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ProjectDepartment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Project Departments'), array('action' => 'index')); ?></li>
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
