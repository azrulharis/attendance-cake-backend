
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Project Group Transfer'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
      
<div class="projectGroupTransfers view-data">

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($projectGroupTransfer['ProjectGroupTransfer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('From Project'); ?></dt>
		<dd>
			<?php echo h($projectGroupTransfer['ProjectGroupTransfer']['from_project']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectGroupTransfer['Project']['name'], array('controller' => 'projects', 'action' => 'view', $projectGroupTransfer['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectGroupTransfer['ProjectGroup']['name'], array('controller' => 'project_groups', 'action' => 'view', $projectGroupTransfer['ProjectGroup']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectGroupTransfer['User']['name'], array('controller' => 'users', 'action' => 'view', $projectGroupTransfer['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Received By'); ?></dt>
		<dd>
			<?php echo h($projectGroupTransfer['ProjectGroupTransfer']['received_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($projectGroupTransfer['ProjectGroupTransfer']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($projectGroupTransfer['ProjectGroupTransfer']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($projectGroupTransfer['ProjectGroupTransfer']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($projectGroupTransfer['ProjectGroupTransfer']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project Group Transfer'), array('action' => 'edit', $projectGroupTransfer['ProjectGroupTransfer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Project Group Transfer'), array('action' => 'delete', $projectGroupTransfer['ProjectGroupTransfer']['id']), array(), __('Are you sure you want to delete # %s?', $projectGroupTransfer['ProjectGroupTransfer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Group Transfers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Group Transfer'), array('action' => 'add')); ?> </li>
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