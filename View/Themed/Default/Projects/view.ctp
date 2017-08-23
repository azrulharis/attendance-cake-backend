
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Project'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
      
<div class="projects view-data">

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($project['Project']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($project['Project']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($project['Project']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Postcode'); ?></dt>
		<dd>
			<?php echo h($project['Project']['postcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($project['Project']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($project['State']['name'], array('controller' => 'states', 'action' => 'view', $project['State']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($project['Project']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($project['Project']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start'); ?></dt>
		<dd>
			<?php echo h($project['Project']['start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End'); ?></dt>
		<dd>
			<?php echo h($project['Project']['end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($project['Project']['note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($project['User']['name'], array('controller' => 'users', 'action' => 'view', $project['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($project['Project']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project'), array('action' => 'edit', $project['Project']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Project'), array('action' => 'delete', $project['Project']['id']), array(), __('Are you sure you want to delete # %s?', $project['Project']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attendances'), array('controller' => 'attendances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendance'), array('controller' => 'attendances', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ot Requests'), array('controller' => 'ot_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ot Request'), array('controller' => 'ot_requests', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Group Transfers'), array('controller' => 'project_group_transfers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Group Transfer'), array('controller' => 'project_group_transfers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Groups'), array('controller' => 'project_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Group'), array('controller' => 'project_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Machine Requests'), array('controller' => 'project_machine_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Machine Request'), array('controller' => 'project_machine_requests', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Machine Transfers'), array('controller' => 'project_machine_transfers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Machine Transfer'), array('controller' => 'project_machine_transfers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Machines'), array('controller' => 'project_machines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Machine'), array('controller' => 'project_machines', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Worker Requests'), array('controller' => 'project_worker_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Worker Request'), array('controller' => 'project_worker_requests', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Worker Transfers'), array('controller' => 'project_worker_transfers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Worker Transfer'), array('controller' => 'project_worker_transfers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Workers'), array('controller' => 'project_workers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Worker'), array('controller' => 'project_workers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Attendances'); ?></h3>
	<?php if (!empty($project['Attendance'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('Project Group Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Time In'); ?></th>
		<th><?php echo __('Time Out'); ?></th>
		<th><?php echo __('Photo'); ?></th>
		<th><?php echo __('Dir'); ?></th>
		<th><?php echo __('Gps'); ?></th>
		<th><?php echo __('Remark'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($project['Attendance'] as $attendance): ?>
		<tr>
			<td><?php echo $attendance['id']; ?></td>
			<td><?php echo $attendance['user_id']; ?></td>
			<td><?php echo $attendance['project_id']; ?></td>
			<td><?php echo $attendance['company_id']; ?></td>
			<td><?php echo $attendance['project_group_id']; ?></td>
			<td><?php echo $attendance['created']; ?></td>
			<td><?php echo $attendance['modified']; ?></td>
			<td><?php echo $attendance['time_in']; ?></td>
			<td><?php echo $attendance['time_out']; ?></td>
			<td><?php echo $attendance['photo']; ?></td>
			<td><?php echo $attendance['dir']; ?></td>
			<td><?php echo $attendance['gps']; ?></td>
			<td><?php echo $attendance['remark']; ?></td>
			<td><?php echo $attendance['status']; ?></td>
			<td><?php echo $attendance['type']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'attendances', 'action' => 'view', $attendance['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'attendances', 'action' => 'edit', $attendance['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'attendances', 'action' => 'delete', $attendance['id']), array(), __('Are you sure you want to delete # %s?', $attendance['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Attendance'), array('controller' => 'attendances', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Ot Requests'); ?></h3>
	<?php if (!empty($project['OtRequest'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Project Manager'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('Project Group Id'); ?></th>
		<th><?php echo __('Attendance Id'); ?></th>
		<th><?php echo __('Ot From'); ?></th>
		<th><?php echo __('Ot To'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Sv Remark'); ?></th>
		<th><?php echo __('Pm Remark'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($project['OtRequest'] as $otRequest): ?>
		<tr>
			<td><?php echo $otRequest['id']; ?></td>
			<td><?php echo $otRequest['user_id']; ?></td>
			<td><?php echo $otRequest['project_manager']; ?></td>
			<td><?php echo $otRequest['project_id']; ?></td>
			<td><?php echo $otRequest['company_id']; ?></td>
			<td><?php echo $otRequest['project_group_id']; ?></td>
			<td><?php echo $otRequest['attendance_id']; ?></td>
			<td><?php echo $otRequest['ot_from']; ?></td>
			<td><?php echo $otRequest['ot_to']; ?></td>
			<td><?php echo $otRequest['status']; ?></td>
			<td><?php echo $otRequest['type']; ?></td>
			<td><?php echo $otRequest['sv_remark']; ?></td>
			<td><?php echo $otRequest['pm_remark']; ?></td>
			<td><?php echo $otRequest['created']; ?></td>
			<td><?php echo $otRequest['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ot_requests', 'action' => 'view', $otRequest['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ot_requests', 'action' => 'edit', $otRequest['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ot_requests', 'action' => 'delete', $otRequest['id']), array(), __('Are you sure you want to delete # %s?', $otRequest['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ot Request'), array('controller' => 'ot_requests', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Project Group Transfers'); ?></h3>
	<?php if (!empty($project['ProjectGroupTransfer'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('From Project'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Project Group Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Received By'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($project['ProjectGroupTransfer'] as $projectGroupTransfer): ?>
		<tr>
			<td><?php echo $projectGroupTransfer['id']; ?></td>
			<td><?php echo $projectGroupTransfer['from_project']; ?></td>
			<td><?php echo $projectGroupTransfer['project_id']; ?></td>
			<td><?php echo $projectGroupTransfer['project_group_id']; ?></td>
			<td><?php echo $projectGroupTransfer['user_id']; ?></td>
			<td><?php echo $projectGroupTransfer['received_by']; ?></td>
			<td><?php echo $projectGroupTransfer['type']; ?></td>
			<td><?php echo $projectGroupTransfer['created']; ?></td>
			<td><?php echo $projectGroupTransfer['modified']; ?></td>
			<td><?php echo $projectGroupTransfer['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'project_group_transfers', 'action' => 'view', $projectGroupTransfer['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'project_group_transfers', 'action' => 'edit', $projectGroupTransfer['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'project_group_transfers', 'action' => 'delete', $projectGroupTransfer['id']), array(), __('Are you sure you want to delete # %s?', $projectGroupTransfer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Project Group Transfer'), array('controller' => 'project_group_transfers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Project Groups'); ?></h3>
	<?php if (!empty($project['ProjectGroup'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th><?php echo __('Start'); ?></th>
		<th><?php echo __('End'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($project['ProjectGroup'] as $projectGroup): ?>
		<tr>
			<td><?php echo $projectGroup['id']; ?></td>
			<td><?php echo $projectGroup['name']; ?></td>
			<td><?php echo $projectGroup['company_id']; ?></td>
			<td><?php echo $projectGroup['project_id']; ?></td>
			<td><?php echo $projectGroup['note']; ?></td>
			<td><?php echo $projectGroup['start']; ?></td>
			<td><?php echo $projectGroup['end']; ?></td>
			<td><?php echo $projectGroup['created']; ?></td>
			<td><?php echo $projectGroup['modified']; ?></td>
			<td><?php echo $projectGroup['user_id']; ?></td>
			<td><?php echo $projectGroup['type']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'project_groups', 'action' => 'view', $projectGroup['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'project_groups', 'action' => 'edit', $projectGroup['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'project_groups', 'action' => 'delete', $projectGroup['id']), array(), __('Are you sure you want to delete # %s?', $projectGroup['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Project Group'), array('controller' => 'project_groups', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Project Machine Requests'); ?></h3>
	<?php if (!empty($project['ProjectMachineRequest'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Project Group Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('From'); ?></th>
		<th><?php echo __('To'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($project['ProjectMachineRequest'] as $projectMachineRequest): ?>
		<tr>
			<td><?php echo $projectMachineRequest['id']; ?></td>
			<td><?php echo $projectMachineRequest['project_id']; ?></td>
			<td><?php echo $projectMachineRequest['project_group_id']; ?></td>
			<td><?php echo $projectMachineRequest['user_id']; ?></td>
			<td><?php echo $projectMachineRequest['created']; ?></td>
			<td><?php echo $projectMachineRequest['modified']; ?></td>
			<td><?php echo $projectMachineRequest['status']; ?></td>
			<td><?php echo $projectMachineRequest['from']; ?></td>
			<td><?php echo $projectMachineRequest['to']; ?></td>
			<td><?php echo $projectMachineRequest['note']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'project_machine_requests', 'action' => 'view', $projectMachineRequest['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'project_machine_requests', 'action' => 'edit', $projectMachineRequest['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'project_machine_requests', 'action' => 'delete', $projectMachineRequest['id']), array(), __('Are you sure you want to delete # %s?', $projectMachineRequest['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Project Machine Request'), array('controller' => 'project_machine_requests', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Project Machine Transfers'); ?></h3>
	<?php if (!empty($project['ProjectMachineTransfer'])): ?>
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
	<?php foreach ($project['ProjectMachineTransfer'] as $projectMachineTransfer): ?>
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
<div class="related">
	<h3><?php echo __('Related Project Machines'); ?></h3>
	<?php if (!empty($project['ProjectMachine'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Machine Id'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($project['ProjectMachine'] as $projectMachine): ?>
		<tr>
			<td><?php echo $projectMachine['id']; ?></td>
			<td><?php echo $projectMachine['machine_id']; ?></td>
			<td><?php echo $projectMachine['project_id']; ?></td>
			<td><?php echo $projectMachine['created']; ?></td>
			<td><?php echo $projectMachine['modified']; ?></td>
			<td><?php echo $projectMachine['user_id']; ?></td>
			<td><?php echo $projectMachine['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'project_machines', 'action' => 'view', $projectMachine['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'project_machines', 'action' => 'edit', $projectMachine['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'project_machines', 'action' => 'delete', $projectMachine['id']), array(), __('Are you sure you want to delete # %s?', $projectMachine['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Project Machine'), array('controller' => 'project_machines', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Project Worker Requests'); ?></h3>
	<?php if (!empty($project['ProjectWorkerRequest'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Project Group Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('From'); ?></th>
		<th><?php echo __('To'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($project['ProjectWorkerRequest'] as $projectWorkerRequest): ?>
		<tr>
			<td><?php echo $projectWorkerRequest['id']; ?></td>
			<td><?php echo $projectWorkerRequest['project_id']; ?></td>
			<td><?php echo $projectWorkerRequest['project_group_id']; ?></td>
			<td><?php echo $projectWorkerRequest['user_id']; ?></td>
			<td><?php echo $projectWorkerRequest['created']; ?></td>
			<td><?php echo $projectWorkerRequest['modified']; ?></td>
			<td><?php echo $projectWorkerRequest['status']; ?></td>
			<td><?php echo $projectWorkerRequest['from']; ?></td>
			<td><?php echo $projectWorkerRequest['to']; ?></td>
			<td><?php echo $projectWorkerRequest['note']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'project_worker_requests', 'action' => 'view', $projectWorkerRequest['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'project_worker_requests', 'action' => 'edit', $projectWorkerRequest['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'project_worker_requests', 'action' => 'delete', $projectWorkerRequest['id']), array(), __('Are you sure you want to delete # %s?', $projectWorkerRequest['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Project Worker Request'), array('controller' => 'project_worker_requests', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Project Worker Transfers'); ?></h3>
	<?php if (!empty($project['ProjectWorkerTransfer'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('From Project'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('From Group'); ?></th>
		<th><?php echo __('Project Group Id'); ?></th>
		<th><?php echo __('Project Worker Id'); ?></th>
		<th><?php echo __('Worker Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Received By'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($project['ProjectWorkerTransfer'] as $projectWorkerTransfer): ?>
		<tr>
			<td><?php echo $projectWorkerTransfer['id']; ?></td>
			<td><?php echo $projectWorkerTransfer['from_project']; ?></td>
			<td><?php echo $projectWorkerTransfer['project_id']; ?></td>
			<td><?php echo $projectWorkerTransfer['from_group']; ?></td>
			<td><?php echo $projectWorkerTransfer['project_group_id']; ?></td>
			<td><?php echo $projectWorkerTransfer['project_worker_id']; ?></td>
			<td><?php echo $projectWorkerTransfer['worker_id']; ?></td>
			<td><?php echo $projectWorkerTransfer['user_id']; ?></td>
			<td><?php echo $projectWorkerTransfer['received_by']; ?></td>
			<td><?php echo $projectWorkerTransfer['type']; ?></td>
			<td><?php echo $projectWorkerTransfer['created']; ?></td>
			<td><?php echo $projectWorkerTransfer['modified']; ?></td>
			<td><?php echo $projectWorkerTransfer['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'project_worker_transfers', 'action' => 'view', $projectWorkerTransfer['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'project_worker_transfers', 'action' => 'edit', $projectWorkerTransfer['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'project_worker_transfers', 'action' => 'delete', $projectWorkerTransfer['id']), array(), __('Are you sure you want to delete # %s?', $projectWorkerTransfer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Project Worker Transfer'), array('controller' => 'project_worker_transfers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Project Workers'); ?></h3>
	<?php if (!empty($project['ProjectWorker'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Project Group Id'); ?></th>
		<th><?php echo __('Worker Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($project['ProjectWorker'] as $projectWorker): ?>
		<tr>
			<td><?php echo $projectWorker['id']; ?></td>
			<td><?php echo $projectWorker['project_id']; ?></td>
			<td><?php echo $projectWorker['project_group_id']; ?></td>
			<td><?php echo $projectWorker['worker_id']; ?></td>
			<td><?php echo $projectWorker['created']; ?></td>
			<td><?php echo $projectWorker['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'project_workers', 'action' => 'view', $projectWorker['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'project_workers', 'action' => 'edit', $projectWorker['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'project_workers', 'action' => 'delete', $projectWorker['id']), array(), __('Are you sure you want to delete # %s?', $projectWorker['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Project Worker'), array('controller' => 'project_workers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>


</div>
    </div>
  </div> 
</div>