<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo h($user['User']['username']); ?> Profile</h2> 
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>

<div class="users view-data">
<h2><?php echo __('User'); ?></h2>
	<dl> 
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		 
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['firstname']); ?>
			&nbsp;
		</dd>
		 
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile Phone'); ?></dt>
		<dd>
			<?php echo h($user['User']['mobile_number']); ?>
			&nbsp;
		</dd>
		  
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd> 
		 
		 
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
 	


 	</div>
</div></div>
</div>
