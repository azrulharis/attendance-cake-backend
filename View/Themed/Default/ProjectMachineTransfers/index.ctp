
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Project Machine Transfers'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo ->flash(); ?>
<div class="projectMachineTransfers index">
	
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('from_project'); ?></th>
			<th><?php echo $this->Paginator->sort('project_id'); ?></th>
			<th><?php echo $this->Paginator->sort('project_machine_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('machine_id'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('received_by'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($projectMachineTransfers as $projectMachineTransfer): ?>
	<tr>
		<td><?php echo h($projectMachineTransfer['ProjectMachineTransfer']['id']); ?>&nbsp;</td>
		<td><?php echo h($projectMachineTransfer['ProjectMachineTransfer']['from_project']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($projectMachineTransfer['Project']['name'], array('controller' => 'projects', 'action' => 'view', $projectMachineTransfer['Project']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($projectMachineTransfer['ProjectMachine']['id'], array('controller' => 'project_machines', 'action' => 'view', $projectMachineTransfer['ProjectMachine']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($projectMachineTransfer['User']['name'], array('controller' => 'users', 'action' => 'view', $projectMachineTransfer['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($projectMachineTransfer['Machine']['name'], array('controller' => 'machines', 'action' => 'view', $projectMachineTransfer['Machine']['id'])); ?>
		</td>
		<td><?php echo h($projectMachineTransfer['ProjectMachineTransfer']['type']); ?>&nbsp;</td>
		<td><?php echo h($projectMachineTransfer['ProjectMachineTransfer']['created']); ?>&nbsp;</td>
		<td><?php echo h($projectMachineTransfer['ProjectMachineTransfer']['modified']); ?>&nbsp;</td>
		<td><?php echo h($projectMachineTransfer['ProjectMachineTransfer']['received_by']); ?>&nbsp;</td>
		<td><?php echo h($projectMachineTransfer['ProjectMachineTransfer']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $projectMachineTransfer['ProjectMachineTransfer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $projectMachineTransfer['ProjectMachineTransfer']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $projectMachineTransfer['ProjectMachineTransfer']['id']), array(), __('Are you sure you want to delete # %s?', $projectMachineTransfer['ProjectMachineTransfer']['id'])); ?>
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