<?php echo $this->Html->link('Add Machine', array('action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?> 
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Machines'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>
<div class="machines index">
	
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('machine_category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('cost'); ?></th>
			<th><?php echo $this->Paginator->sort('source'); ?></th>
			<th><?php echo $this->Paginator->sort('worker_id'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('note'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($machines as $machine): ?>
	<tr>
		<td><?php echo h($machine['Machine']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($machine['MachineCategory']['name'], array('controller' => 'machine_categories', 'action' => 'view', $machine['MachineCategory']['id'])); ?>
		</td>
		<td><?php echo h($machine['Machine']['name']); ?>&nbsp;</td>
		<td><?php echo h($machine['Machine']['cost']); ?>&nbsp;</td>
		<td><?php echo h($machine['Machine']['source']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($machine['Worker']['name'], array('controller' => 'workers', 'action' => 'view', $machine['Worker']['id'])); ?>
		</td>
		<td><?php echo h($machine['Machine']['code']); ?>&nbsp;</td>
		<td><?php echo h($machine['Machine']['note']); ?>&nbsp;</td>
		<td><?php echo h($machine['Machine']['created']); ?>&nbsp;</td>
		<td><?php echo h($machine['Machine']['modified']); ?>&nbsp;</td>
		<td><?php echo h($machine['Machine']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $machine['Machine']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $machine['Machine']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $machine['Machine']['id']), array(), __('Are you sure you want to delete # %s?', $machine['Machine']['id'])); ?>
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