
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Group'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
      
<div class="groups view-data">

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($group['Group']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($group['Group']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($group['Group']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($group['Group']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Group'), array('action' => 'edit', $group['Group']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Group'), array('action' => 'delete', $group['Group']['id']), array(), __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($group['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Firstname'); ?></th>
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
	<?php foreach ($group['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['group_id']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['firstname']; ?></td>
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


</div>
    </div>
  </div> 
</div>