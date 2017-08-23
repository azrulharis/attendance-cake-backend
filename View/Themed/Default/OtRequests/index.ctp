
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Ot Requests'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>
<div class="otRequests index">
	
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('project_manager'); ?></th>
			<th><?php echo $this->Paginator->sort('project_id'); ?></th> 
			<th><?php echo $this->Paginator->sort('project_group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('attendance_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ot_from'); ?></th>
			<th><?php echo $this->Paginator->sort('ot_to'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('sv_remark'); ?></th>
			<th><?php echo $this->Paginator->sort('pm_remark'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($otRequests as $otRequest): ?>
	<tr>
		<td><?php echo h($otRequest['OtRequest']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($otRequest['User']['name'], array('controller' => 'users', 'action' => 'view', $otRequest['User']['id'])); ?>
		</td>
		<td><?php echo h($otRequest['ProjectManager']['username']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($otRequest['Project']['name'], array('controller' => 'projects', 'action' => 'view', $otRequest['Project']['id'])); ?>
		</td>
		 
		<td>
			<?php echo $this->Html->link($otRequest['ProjectGroup']['name'], array('controller' => 'project_groups', 'action' => 'view', $otRequest['ProjectGroup']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($otRequest['Attendance']['id'], array('controller' => 'attendances', 'action' => 'view', $otRequest['Attendance']['id'])); ?>
		</td>
		<td><?php echo h($otRequest['OtRequest']['ot_from']); ?>&nbsp;</td>
		<td><?php echo h($otRequest['OtRequest']['ot_to']); ?>&nbsp;</td>
		<td><?php echo h($otRequest['OtRequest']['status']); ?>&nbsp;</td>
		<td><?php echo h($otRequest['OtRequest']['type']); ?>&nbsp;</td>
		<td><?php echo h($otRequest['OtRequest']['sv_remark']); ?>&nbsp;</td>
		<td><?php echo h($otRequest['OtRequest']['pm_remark']); ?>&nbsp;</td>
		<td><?php echo h($otRequest['OtRequest']['created']); ?>&nbsp;</td>
		<td><?php echo h($otRequest['OtRequest']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $otRequest['OtRequest']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $otRequest['OtRequest']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $otRequest['OtRequest']['id']), array(), __('Are you sure you want to delete # %s?', $otRequest['OtRequest']['id'])); ?>
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