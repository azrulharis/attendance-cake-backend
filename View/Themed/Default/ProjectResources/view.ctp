<div class="projectResources view">
<h2><?php echo __('Project Resource'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($projectResource['ProjectResource']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectResource['Project']['name'], array('controller' => 'projects', 'action' => 'view', $projectResource['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project Department'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectResource['ProjectDepartment']['name'], array('controller' => 'project_departments', 'action' => 'view', $projectResource['ProjectDepartment']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectResource['User']['id'], array('controller' => 'users', 'action' => 'view', $projectResource['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectResource['Company']['name'], array('controller' => 'companies', 'action' => 'view', $projectResource['Company']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project Resource'), array('action' => 'edit', $projectResource['ProjectResource']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Project Resource'), array('action' => 'delete', $projectResource['ProjectResource']['id']), array(), __('Are you sure you want to delete # %s?', $projectResource['ProjectResource']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Resources'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Resource'), array('action' => 'add')); ?> </li>
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
