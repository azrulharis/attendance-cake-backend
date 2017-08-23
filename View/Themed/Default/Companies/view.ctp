<?php echo $this->Html->link('Company', array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false)); ?> 
<?php echo $this->Html->link('Edit', array('action' => 'edit', $company['Company']['id']), array('class' => 'btn btn-warning', 'escape' => false)); ?> 

<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Company'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
      
<div class="companies view-data">

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($company['Company']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($company['Company']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($company['Company']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($company['Company']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Company'), array('action' => 'edit', $company['Company']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Company'), array('action' => 'delete', $company['Company']['id']), array(), __('Are you sure you want to delete # %s?', $company['Company']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attendances'), array('controller' => 'attendances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendance'), array('controller' => 'attendances', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ot Requests'), array('controller' => 'ot_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ot Request'), array('controller' => 'ot_requests', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Groups'), array('controller' => 'project_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Group'), array('controller' => 'project_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workers'), array('controller' => 'workers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Worker'), array('controller' => 'workers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Attendances'); ?></h3>
	<?php if (!empty($company['Attendance'])): ?>
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
	<?php foreach ($company['Attendance'] as $attendance): ?>
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
	<?php if (!empty($company['OtRequest'])): ?>
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
	<?php foreach ($company['OtRequest'] as $otRequest): ?>
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
	<h3><?php echo __('Related Project Groups'); ?></h3>
	<?php if (!empty($company['ProjectGroup'])): ?>
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
	<?php foreach ($company['ProjectGroup'] as $projectGroup): ?>
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
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($company['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Lastname'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Mobile Number'); ?></th>
		<th><?php echo __('Dob'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('About Us'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('State Id'); ?></th>
		<th><?php echo __('City Id'); ?></th>
		<th><?php echo __('Activation Code'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Paid'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Role'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($company['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['group_id']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['lastname']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['mobile_number']; ?></td>
			<td><?php echo $user['dob']; ?></td>
			<td><?php echo $user['image']; ?></td>
			<td><?php echo $user['about_us']; ?></td>
			<td><?php echo $user['country_id']; ?></td>
			<td><?php echo $user['state_id']; ?></td>
			<td><?php echo $user['city_id']; ?></td>
			<td><?php echo $user['activation_code']; ?></td>
			<td><?php echo $user['status']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td><?php echo $user['paid']; ?></td>
			<td><?php echo $user['gender']; ?></td>
			<td><?php echo $user['role']; ?></td>
			<td><?php echo $user['company_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array(), __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Workers'); ?></h3>
	<?php if (!empty($company['Worker'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Cost'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($company['Worker'] as $worker): ?>
		<tr>
			<td><?php echo $worker['id']; ?></td>
			<td><?php echo $worker['company_id']; ?></td>
			<td><?php echo $worker['name']; ?></td>
			<td><?php echo $worker['code']; ?></td>
			<td><?php echo $worker['phone']; ?></td>
			<td><?php echo $worker['cost']; ?></td>
			<td><?php echo $worker['type']; ?></td>
			<td><?php echo $worker['user_id']; ?></td>
			<td><?php echo $worker['created']; ?></td>
			<td><?php echo $worker['modified']; ?></td>
			<td><?php echo $worker['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'workers', 'action' => 'view', $worker['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'workers', 'action' => 'edit', $worker['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'workers', 'action' => 'delete', $worker['id']), array(), __('Are you sure you want to delete # %s?', $worker['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Worker'), array('controller' => 'workers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>


</div>
    </div>
  </div> 
</div>