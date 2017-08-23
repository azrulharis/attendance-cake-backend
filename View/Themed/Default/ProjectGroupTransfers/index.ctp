
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Project Group Transfers'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo ->flash(); ?>
<div class="projectGroupTransfers index">
	
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('from_project'); ?></th>
			<th><?php echo $this->Paginator->sort('project_id'); ?></th>
			<th><?php echo $this->Paginator->sort('project_group_id'); ?></th>
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
	<?php foreach ($projectGroupTransfers as $projectGroupTransfer): ?>
	<tr>
		<td><?php echo h($projectGroupTransfer['ProjectGroupTransfer']['id']); ?>&nbsp;</td>
		<td><?php echo h($projectGroupTransfer['ProjectGroupTransfer']['from_project']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($projectGroupTransfer['Project']['name'], array('controller' => 'projects', 'action' => 'view', $projectGroupTransfer['Project']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($projectGroupTransfer['ProjectGroup']['name'], array('controller' => 'project_groups', 'action' => 'view', $projectGroupTransfer['ProjectGroup']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($projectGroupTransfer['User']['name'], array('controller' => 'users', 'action' => 'view', $projectGroupTransfer['User']['id'])); ?>
		</td>
		<td><?php echo h($projectGroupTransfer['ProjectGroupTransfer']['received_by']); ?>&nbsp;</td>
		<td><?php echo h($projectGroupTransfer['ProjectGroupTransfer']['type']); ?>&nbsp;</td>
		<td><?php echo h($projectGroupTransfer['ProjectGroupTransfer']['created']); ?>&nbsp;</td>
		<td><?php echo h($projectGroupTransfer['ProjectGroupTransfer']['modified']); ?>&nbsp;</td>
		<td><?php echo h($projectGroupTransfer['ProjectGroupTransfer']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $projectGroupTransfer['ProjectGroupTransfer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $projectGroupTransfer['ProjectGroupTransfer']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $projectGroupTransfer['ProjectGroupTransfer']['id']), array(), __('Are you sure you want to delete # %s?', $projectGroupTransfer['ProjectGroupTransfer']['id'])); ?>
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