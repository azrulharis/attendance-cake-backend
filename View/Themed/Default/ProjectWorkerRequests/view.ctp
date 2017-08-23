
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Project Worker Request'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
      
<div class="projectWorkerRequests view-data">

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($projectWorkerRequest['ProjectWorkerRequest']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectWorkerRequest['Project']['name'], array('controller' => 'projects', 'action' => 'view', $projectWorkerRequest['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectWorkerRequest['ProjectGroup']['name'], array('controller' => 'project_groups', 'action' => 'view', $projectWorkerRequest['ProjectGroup']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectWorkerRequest['User']['name'], array('controller' => 'users', 'action' => 'view', $projectWorkerRequest['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($projectWorkerRequest['ProjectWorkerRequest']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($projectWorkerRequest['ProjectWorkerRequest']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($projectWorkerRequest['ProjectWorkerRequest']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('From'); ?></dt>
		<dd>
			<?php echo h($projectWorkerRequest['ProjectWorkerRequest']['from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('To'); ?></dt>
		<dd>
			<?php echo h($projectWorkerRequest['ProjectWorkerRequest']['to']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($projectWorkerRequest['ProjectWorkerRequest']['note']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project Worker Request'), array('action' => 'edit', $projectWorkerRequest['ProjectWorkerRequest']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Project Worker Request'), array('action' => 'delete', $projectWorkerRequest['ProjectWorkerRequest']['id']), array(), __('Are you sure you want to delete # %s?', $projectWorkerRequest['ProjectWorkerRequest']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Worker Requests'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Worker Request'), array('action' => 'add')); ?> </li>
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