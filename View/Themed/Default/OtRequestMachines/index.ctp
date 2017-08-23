
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Ot Request Machines'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo ->flash(); ?>
<div class="otRequestMachines index">
	
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('ot_request_id'); ?></th>
			<th><?php echo $this->Paginator->sort('machine_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('attendance_machine_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($otRequestMachines as $otRequestMachine): ?>
	<tr>
		<td><?php echo h($otRequestMachine['OtRequestMachine']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($otRequestMachine['OtRequest']['id'], array('controller' => 'ot_requests', 'action' => 'view', $otRequestMachine['OtRequest']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($otRequestMachine['Machine']['name'], array('controller' => 'machines', 'action' => 'view', $otRequestMachine['Machine']['id'])); ?>
		</td>
		<td><?php echo h($otRequestMachine['OtRequestMachine']['status']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($otRequestMachine['AttendanceMachine']['id'], array('controller' => 'attendance_machines', 'action' => 'view', $otRequestMachine['AttendanceMachine']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $otRequestMachine['OtRequestMachine']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $otRequestMachine['OtRequestMachine']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $otRequestMachine['OtRequestMachine']['id']), array(), __('Are you sure you want to delete # %s?', $otRequestMachine['OtRequestMachine']['id'])); ?>
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