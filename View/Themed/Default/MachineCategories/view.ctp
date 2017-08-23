
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Machine Category'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
      
<div class="machineCategories view-data">

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($machineCategory['MachineCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($machineCategory['MachineCategory']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Machine Category'), array('action' => 'edit', $machineCategory['MachineCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Machine Category'), array('action' => 'delete', $machineCategory['MachineCategory']['id']), array(), __('Are you sure you want to delete # %s?', $machineCategory['MachineCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Machine Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Machine Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Machines'), array('controller' => 'machines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Machine'), array('controller' => 'machines', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Machines'); ?></h3>
	<?php if (!empty($machineCategory['Machine'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Machine Category Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Cost'); ?></th>
		<th><?php echo __('Source'); ?></th>
		<th><?php echo __('Worker Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($machineCategory['Machine'] as $machine): ?>
		<tr>
			<td><?php echo $machine['id']; ?></td>
			<td><?php echo $machine['machine_category_id']; ?></td>
			<td><?php echo $machine['name']; ?></td>
			<td><?php echo $machine['cost']; ?></td>
			<td><?php echo $machine['source']; ?></td>
			<td><?php echo $machine['worker_id']; ?></td>
			<td><?php echo $machine['code']; ?></td>
			<td><?php echo $machine['note']; ?></td>
			<td><?php echo $machine['created']; ?></td>
			<td><?php echo $machine['modified']; ?></td>
			<td><?php echo $machine['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'machines', 'action' => 'view', $machine['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'machines', 'action' => 'edit', $machine['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'machines', 'action' => 'delete', $machine['id']), array(), __('Are you sure you want to delete # %s?', $machine['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Machine'), array('controller' => 'machines', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>


</div>
    </div>
  </div> 
</div>