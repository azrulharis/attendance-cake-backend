
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Project Worker Transfer'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
      
<div class="projectWorkerTransfers view-data">

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($projectWorkerTransfer['ProjectWorkerTransfer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('From Project'); ?></dt>
		<dd>
			<?php echo h($projectWorkerTransfer['ProjectWorkerTransfer']['from_project']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectWorkerTransfer['Project']['name'], array('controller' => 'projects', 'action' => 'view', $projectWorkerTransfer['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('From Group'); ?></dt>
		<dd>
			<?php echo h($projectWorkerTransfer['ProjectWorkerTransfer']['from_group']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectWorkerTransfer['ProjectGroup']['name'], array('controller' => 'project_groups', 'action' => 'view', $projectWorkerTransfer['ProjectGroup']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project Worker'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectWorkerTransfer['ProjectWorker']['id'], array('controller' => 'project_workers', 'action' => 'view', $projectWorkerTransfer['ProjectWorker']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Worker'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectWorkerTransfer['Worker']['name'], array('controller' => 'workers', 'action' => 'view', $projectWorkerTransfer['Worker']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectWorkerTransfer['User']['name'], array('controller' => 'users', 'action' => 'view', $projectWorkerTransfer['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Received By'); ?></dt>
		<dd>
			<?php echo h($projectWorkerTransfer['ProjectWorkerTransfer']['received_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($projectWorkerTransfer['ProjectWorkerTransfer']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($projectWorkerTransfer['ProjectWorkerTransfer']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($projectWorkerTransfer['ProjectWorkerTransfer']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($projectWorkerTransfer['ProjectWorkerTransfer']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project Worker Transfer'), array('action' => 'edit', $projectWorkerTransfer['ProjectWorkerTransfer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Project Worker Transfer'), array('action' => 'delete', $projectWorkerTransfer['ProjectWorkerTransfer']['id']), array(), __('Are you sure you want to delete # %s?', $projectWorkerTransfer['ProjectWorkerTransfer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Worker Transfers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Worker Transfer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Groups'), array('controller' => 'project_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Group'), array('controller' => 'project_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Workers'), array('controller' => 'project_workers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Worker'), array('controller' => 'project_workers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workers'), array('controller' => 'workers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Worker'), array('controller' => 'workers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>


</div>
    </div>
  </div> 
</div>