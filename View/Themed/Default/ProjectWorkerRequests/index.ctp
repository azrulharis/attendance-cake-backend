
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Project Worker Requests'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>
<div class="projectWorkerRequests index">
	
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('project_id'); ?></th>
			<th><?php echo $this->Paginator->sort('project_group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('from'); ?></th>
			<th><?php echo $this->Paginator->sort('to'); ?></th>
			<th><?php echo $this->Paginator->sort('note'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($projectWorkerRequests as $projectWorkerRequest): ?>
	<tr>
		<td><?php echo h($projectWorkerRequest['ProjectWorkerRequest']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($projectWorkerRequest['Project']['name'], array('controller' => 'projects', 'action' => 'view', $projectWorkerRequest['Project']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($projectWorkerRequest['ProjectGroup']['name'], array('controller' => 'project_groups', 'action' => 'view', $projectWorkerRequest['ProjectGroup']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($projectWorkerRequest['User']['name'], array('controller' => 'users', 'action' => 'view', $projectWorkerRequest['User']['id'])); ?>
		</td>
		<td><?php echo h($projectWorkerRequest['ProjectWorkerRequest']['created']); ?>&nbsp;</td>
		<td><?php echo h($projectWorkerRequest['ProjectWorkerRequest']['modified']); ?>&nbsp;</td>
		<td><?php echo h($projectWorkerRequest['ProjectWorkerRequest']['status']); ?>&nbsp;</td>
		<td><?php echo h($projectWorkerRequest['ProjectWorkerRequest']['from']); ?>&nbsp;</td>
		<td><?php echo h($projectWorkerRequest['ProjectWorkerRequest']['to']); ?>&nbsp;</td>
		<td><?php echo h($projectWorkerRequest['ProjectWorkerRequest']['note']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $projectWorkerRequest['ProjectWorkerRequest']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $projectWorkerRequest['ProjectWorkerRequest']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $projectWorkerRequest['ProjectWorkerRequest']['id']), array(), __('Are you sure you want to delete # %s?', $projectWorkerRequest['ProjectWorkerRequest']['id'])); ?>
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