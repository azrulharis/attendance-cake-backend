
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Project Machine Transfer'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
      
<div class="projectMachineTransfers view-data">

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($projectMachineTransfer['ProjectMachineTransfer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('From Project'); ?></dt>
		<dd>
			<?php echo h($projectMachineTransfer['ProjectMachineTransfer']['from_project']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectMachineTransfer['Project']['name'], array('controller' => 'projects', 'action' => 'view', $projectMachineTransfer['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project Machine'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectMachineTransfer['ProjectMachine']['id'], array('controller' => 'project_machines', 'action' => 'view', $projectMachineTransfer['ProjectMachine']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectMachineTransfer['User']['name'], array('controller' => 'users', 'action' => 'view', $projectMachineTransfer['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Machine'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectMachineTransfer['Machine']['name'], array('controller' => 'machines', 'action' => 'view', $projectMachineTransfer['Machine']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($projectMachineTransfer['ProjectMachineTransfer']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($projectMachineTransfer['ProjectMachineTransfer']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($projectMachineTransfer['ProjectMachineTransfer']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Received By'); ?></dt>
		<dd>
			<?php echo h($projectMachineTransfer['ProjectMachineTransfer']['received_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($projectMachineTransfer['ProjectMachineTransfer']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project Machine Transfer'), array('action' => 'edit', $projectMachineTransfer['ProjectMachineTransfer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Project Machine Transfer'), array('action' => 'delete', $projectMachineTransfer['ProjectMachineTransfer']['id']), array(), __('Are you sure you want to delete # %s?', $projectMachineTransfer['ProjectMachineTransfer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Machine Transfers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Machine Transfer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Machines'), array('controller' => 'project_machines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Machine'), array('controller' => 'project_machines', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Machines'), array('controller' => 'machines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Machine'), array('controller' => 'machines', 'action' => 'add')); ?> </li>
	</ul>
</div>


</div>
    </div>
  </div> 
</div>