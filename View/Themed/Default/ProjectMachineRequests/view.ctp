
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Project Machine Request'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
      
<div class="projectMachineRequests view-data">

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($projectMachineRequest['ProjectMachineRequest']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectMachineRequest['Project']['name'], array('controller' => 'projects', 'action' => 'view', $projectMachineRequest['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectMachineRequest['ProjectGroup']['name'], array('controller' => 'project_groups', 'action' => 'view', $projectMachineRequest['ProjectGroup']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectMachineRequest['User']['name'], array('controller' => 'users', 'action' => 'view', $projectMachineRequest['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($projectMachineRequest['ProjectMachineRequest']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($projectMachineRequest['ProjectMachineRequest']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($projectMachineRequest['ProjectMachineRequest']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('From'); ?></dt>
		<dd>
			<?php echo h($projectMachineRequest['ProjectMachineRequest']['from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('To'); ?></dt>
		<dd>
			<?php echo h($projectMachineRequest['ProjectMachineRequest']['to']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($projectMachineRequest['ProjectMachineRequest']['note']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project Machine Request'), array('action' => 'edit', $projectMachineRequest['ProjectMachineRequest']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Project Machine Request'), array('action' => 'delete', $projectMachineRequest['ProjectMachineRequest']['id']), array(), __('Are you sure you want to delete # %s?', $projectMachineRequest['ProjectMachineRequest']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Machine Requests'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Machine Request'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Groups'), array('controller' => 'project_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Group'), array('controller' => 'project_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>


</div>
    </div>
  </div> 
</div>