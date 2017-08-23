
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Project Worker'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
      
<div class="projectWorkers view-data">

	<dl> 
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectWorker['Project']['name'], array('controller' => 'projects', 'action' => 'view', $projectWorker['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectWorker['ProjectGroup']['name'], array('controller' => 'project_groups', 'action' => 'view', $projectWorker['ProjectGroup']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Worker'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectWorker['User']['name'], array('controller' => 'users', 'action' => 'view', $projectWorker['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($projectWorker['ProjectWorker']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($projectWorker['ProjectWorker']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project Worker'), array('action' => 'edit', $projectWorker['ProjectWorker']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Project Worker'), array('action' => 'delete', $projectWorker['ProjectWorker']['id']), array(), __('Are you sure you want to delete # %s?', $projectWorker['ProjectWorker']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Workers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Worker'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Groups'), array('controller' => 'project_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Group'), array('controller' => 'project_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workers'), array('controller' => 'workers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Worker'), array('controller' => 'workers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Worker Transfers'), array('controller' => 'project_worker_transfers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Worker Transfer'), array('controller' => 'project_worker_transfers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Project Worker Transfers'); ?></h3>
	<?php if (!empty($projectWorker['ProjectWorkerTransfer'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('From Project'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('From Group'); ?></th>
		<th><?php echo __('Project Group Id'); ?></th>
		<th><?php echo __('Project Worker Id'); ?></th>
		<th><?php echo __('Worker Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Received By'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($projectWorker['ProjectWorkerTransfer'] as $projectWorkerTransfer): ?>
		<tr>
			<td><?php echo $projectWorkerTransfer['id']; ?></td>
			<td><?php echo $projectWorkerTransfer['from_project']; ?></td>
			<td><?php echo $projectWorkerTransfer['project_id']; ?></td>
			<td><?php echo $projectWorkerTransfer['from_group']; ?></td>
			<td><?php echo $projectWorkerTransfer['project_group_id']; ?></td>
			<td><?php echo $projectWorkerTransfer['project_worker_id']; ?></td>
			<td><?php echo $projectWorkerTransfer['worker_id']; ?></td>
			<td><?php echo $projectWorkerTransfer['user_id']; ?></td>
			<td><?php echo $projectWorkerTransfer['received_by']; ?></td>
			<td><?php echo $projectWorkerTransfer['type']; ?></td>
			<td><?php echo $projectWorkerTransfer['created']; ?></td>
			<td><?php echo $projectWorkerTransfer['modified']; ?></td>
			<td><?php echo $projectWorkerTransfer['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'project_worker_transfers', 'action' => 'view', $projectWorkerTransfer['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'project_worker_transfers', 'action' => 'edit', $projectWorkerTransfer['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'project_worker_transfers', 'action' => 'delete', $projectWorkerTransfer['id']), array(), __('Are you sure you want to delete # %s?', $projectWorkerTransfer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Project Worker Transfer'), array('controller' => 'project_worker_transfers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>


</div>
    </div>
  </div> 
</div>