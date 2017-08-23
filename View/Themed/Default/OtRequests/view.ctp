
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Ot Request'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
      
<div class="otRequests view-data">

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($otRequest['OtRequest']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otRequest['User']['name'], array('controller' => 'users', 'action' => 'view', $otRequest['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project Manager'); ?></dt>
		<dd>
			<?php echo h($otRequest['OtRequest']['project_manager']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otRequest['Project']['name'], array('controller' => 'projects', 'action' => 'view', $otRequest['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otRequest['Company']['name'], array('controller' => 'companies', 'action' => 'view', $otRequest['Company']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otRequest['ProjectGroup']['name'], array('controller' => 'project_groups', 'action' => 'view', $otRequest['ProjectGroup']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attendance'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otRequest['Attendance']['id'], array('controller' => 'attendances', 'action' => 'view', $otRequest['Attendance']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ot From'); ?></dt>
		<dd>
			<?php echo h($otRequest['OtRequest']['ot_from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ot To'); ?></dt>
		<dd>
			<?php echo h($otRequest['OtRequest']['ot_to']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($otRequest['OtRequest']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($otRequest['OtRequest']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sv Remark'); ?></dt>
		<dd>
			<?php echo h($otRequest['OtRequest']['sv_remark']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pm Remark'); ?></dt>
		<dd>
			<?php echo h($otRequest['OtRequest']['pm_remark']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($otRequest['OtRequest']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($otRequest['OtRequest']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ot Request'), array('action' => 'edit', $otRequest['OtRequest']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ot Request'), array('action' => 'delete', $otRequest['OtRequest']['id']), array(), __('Are you sure you want to delete # %s?', $otRequest['OtRequest']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ot Requests'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ot Request'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Groups'), array('controller' => 'project_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Group'), array('controller' => 'project_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attendances'), array('controller' => 'attendances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendance'), array('controller' => 'attendances', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ot Request Machines'), array('controller' => 'ot_request_machines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ot Request Machine'), array('controller' => 'ot_request_machines', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ot Request Workers'), array('controller' => 'ot_request_workers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ot Request Worker'), array('controller' => 'ot_request_workers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Ot Request Machines'); ?></h3>
	<?php if (!empty($otRequest['OtRequestMachine'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Ot Request Id'); ?></th>
		<th><?php echo __('Machine Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Attendance Machine Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($otRequest['OtRequestMachine'] as $otRequestMachine): ?>
		<tr>
			<td><?php echo $otRequestMachine['id']; ?></td>
			<td><?php echo $otRequestMachine['ot_request_id']; ?></td>
			<td><?php echo $otRequestMachine['machine_id']; ?></td>
			<td><?php echo $otRequestMachine['status']; ?></td>
			<td><?php echo $otRequestMachine['attendance_machine_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ot_request_machines', 'action' => 'view', $otRequestMachine['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ot_request_machines', 'action' => 'edit', $otRequestMachine['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ot_request_machines', 'action' => 'delete', $otRequestMachine['id']), array(), __('Are you sure you want to delete # %s?', $otRequestMachine['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ot Request Machine'), array('controller' => 'ot_request_machines', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Ot Request Workers'); ?></h3>
	<?php if (!empty($otRequest['OtRequestWorker'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Ot Request Id'); ?></th>
		<th><?php echo __('Worker Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Attendance Worker Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($otRequest['OtRequestWorker'] as $otRequestWorker): ?>
		<tr>
			<td><?php echo $otRequestWorker['id']; ?></td>
			<td><?php echo $otRequestWorker['ot_request_id']; ?></td>
			<td><?php echo $otRequestWorker['worker_id']; ?></td>
			<td><?php echo $otRequestWorker['status']; ?></td>
			<td><?php echo $otRequestWorker['attendance_worker_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ot_request_workers', 'action' => 'view', $otRequestWorker['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ot_request_workers', 'action' => 'edit', $otRequestWorker['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ot_request_workers', 'action' => 'delete', $otRequestWorker['id']), array(), __('Are you sure you want to delete # %s?', $otRequestWorker['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ot Request Worker'), array('controller' => 'ot_request_workers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>


</div>
    </div>
  </div> 
</div>