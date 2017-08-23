
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Notification'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
      
<div class="notifications view-data">

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($notification['Notification']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($notification['User']['name'], array('controller' => 'users', 'action' => 'view', $notification['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($notification['Notification']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($notification['Notification']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($notification['Notification']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($notification['Notification']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($notification['Notification']['link']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Notification'), array('action' => 'edit', $notification['Notification']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Notification'), array('action' => 'delete', $notification['Notification']['id']), array(), __('Are you sure you want to delete # %s?', $notification['Notification']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Notifications'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Notification'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>


</div>
    </div>
  </div> 
</div>