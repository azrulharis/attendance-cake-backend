<?php echo $this->Html->link('Machine List', array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false)); ?> 
<?php echo $this->Html->link('Edit', array('action' => 'edit', $machine['Machine']['id']), array('class' => 'btn btn-warning', 'escape' => false)); ?> 
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Machine'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
      <?php echo $this->Session->flash(); ?>
<div class="machines view-data">

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($machine['Machine']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Machine Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($machine['MachineCategory']['name'], array('controller' => 'machine_categories', 'action' => 'view', $machine['MachineCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($machine['Machine']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cost'); ?></dt>
		<dd>
			<?php echo h($machine['Machine']['cost']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Source'); ?></dt>
		<dd>
			<?php echo h($machine['Machine']['source']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Worker'); ?></dt>
		<dd>
			<?php echo $this->Html->link($machine['Worker']['name'], array('controller' => 'workers', 'action' => 'view', $machine['Worker']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($machine['Machine']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($machine['Machine']['note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($machine['Machine']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($machine['Machine']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($machine['Machine']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Machine'), array('action' => 'edit', $machine['Machine']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Machine'), array('action' => 'delete', $machine['Machine']['id']), array(), __('Are you sure you want to delete # %s?', $machine['Machine']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Machines'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Machine'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Machine Categories'), array('controller' => 'machine_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Machine Category'), array('controller' => 'machine_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workers'), array('controller' => 'workers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Worker'), array('controller' => 'workers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Machine Transfers'), array('controller' => 'project_machine_transfers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Machine Transfer'), array('controller' => 'project_machine_transfers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Project Machine Transfers'); ?></h3>
	<?php if (!empty($machine['ProjectMachineTransfer'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('From Project'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Project Machine Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Machine Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Received By'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($machine['ProjectMachineTransfer'] as $projectMachineTransfer): ?>
		<tr>
			<td><?php echo $projectMachineTransfer['id']; ?></td>
			<td><?php echo $projectMachineTransfer['from_project']; ?></td>
			<td><?php echo $projectMachineTransfer['project_id']; ?></td>
			<td><?php echo $projectMachineTransfer['project_machine_id']; ?></td>
			<td><?php echo $projectMachineTransfer['user_id']; ?></td>
			<td><?php echo $projectMachineTransfer['machine_id']; ?></td>
			<td><?php echo $projectMachineTransfer['type']; ?></td>
			<td><?php echo $projectMachineTransfer['created']; ?></td>
			<td><?php echo $projectMachineTransfer['modified']; ?></td>
			<td><?php echo $projectMachineTransfer['received_by']; ?></td>
			<td><?php echo $projectMachineTransfer['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'project_machine_transfers', 'action' => 'view', $projectMachineTransfer['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'project_machine_transfers', 'action' => 'edit', $projectMachineTransfer['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'project_machine_transfers', 'action' => 'delete', $projectMachineTransfer['id']), array(), __('Are you sure you want to delete # %s?', $projectMachineTransfer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Project Machine Transfer'), array('controller' => 'project_machine_transfers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>


</div>
    </div>
  </div> 
</div>