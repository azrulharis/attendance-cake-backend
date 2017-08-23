
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Project Worker Transfers'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo ->flash(); ?>
<div class="projectWorkerTransfers index">
	
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('from_project'); ?></th>
			<th><?php echo $this->Paginator->sort('project_id'); ?></th>
			<th><?php echo $this->Paginator->sort('from_group'); ?></th>
			<th><?php echo $this->Paginator->sort('project_group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('project_worker_id'); ?></th>
			<th><?php echo $this->Paginator->sort('worker_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('received_by'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($projectWorkerTransfers as $projectWorkerTransfer): ?>
	<tr>
		<td><?php echo h($projectWorkerTransfer['ProjectWorkerTransfer']['id']); ?>&nbsp;</td>
		<td><?php echo h($projectWorkerTransfer['ProjectWorkerTransfer']['from_project']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($projectWorkerTransfer['Project']['name'], array('controller' => 'projects', 'action' => 'view', $projectWorkerTransfer['Project']['id'])); ?>
		</td>
		<td><?php echo h($projectWorkerTransfer['ProjectWorkerTransfer']['from_group']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($projectWorkerTransfer['ProjectGroup']['name'], array('controller' => 'project_groups', 'action' => 'view', $projectWorkerTransfer['ProjectGroup']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($projectWorkerTransfer['ProjectWorker']['id'], array('controller' => 'project_workers', 'action' => 'view', $projectWorkerTransfer['ProjectWorker']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($projectWorkerTransfer['Worker']['name'], array('controller' => 'workers', 'action' => 'view', $projectWorkerTransfer['Worker']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($projectWorkerTransfer['User']['name'], array('controller' => 'users', 'action' => 'view', $projectWorkerTransfer['User']['id'])); ?>
		</td>
		<td><?php echo h($projectWorkerTransfer['ProjectWorkerTransfer']['received_by']); ?>&nbsp;</td>
		<td><?php echo h($projectWorkerTransfer['ProjectWorkerTransfer']['type']); ?>&nbsp;</td>
		<td><?php echo h($projectWorkerTransfer['ProjectWorkerTransfer']['created']); ?>&nbsp;</td>
		<td><?php echo h($projectWorkerTransfer['ProjectWorkerTransfer']['modified']); ?>&nbsp;</td>
		<td><?php echo h($projectWorkerTransfer['ProjectWorkerTransfer']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $projectWorkerTransfer['ProjectWorkerTransfer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $projectWorkerTransfer['ProjectWorkerTransfer']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $projectWorkerTransfer['ProjectWorkerTransfer']['id']), array(), __('Are you sure you want to delete # %s?', $projectWorkerTransfer['ProjectWorkerTransfer']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<ul class="pagination">
	<?php
		echo $this->Paginator->prev('<i class="fa fa-angle-left"></i>', array('tag' => 'li', 'escape' => false), '<i class="fa fa-angle-left"></i>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
		echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
		echo $this->Paginator->next('<i class="fa fa-angle-right"></i>', array('tag' => 'li', 'escape' => false), '<i class="fa fa-angle-right"></i>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
	?>
	</ul>
</div>
 
</div>
</div>
</div>
</div> 