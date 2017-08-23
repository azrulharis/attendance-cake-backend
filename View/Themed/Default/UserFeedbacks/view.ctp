<?php echo $this->Html->link(__('My Feedback'), array('action' => 'index'), array('class' => 'btn btn-primary btn-sm')); ?> 
<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userFeedback['UserFeedback']['id']), array('class' => 'btn btn-warning btn-sm')); ?> 
<div class="row"> 
  <div class="col-xs-12"> 
    <div class="x_panel tile">
      <div class="x_title">
        <h2>View User Feedback</h2> 
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>  

<div class="userFeedbacks view-data">
<h2><?php echo __('User Feedback'); ?></h2>
	<dl>
		 
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userFeedback['User']['id'], array('controller' => 'users', 'action' => 'view', $userFeedback['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subject'); ?></dt>
		<dd>
			<?php echo h($userFeedback['UserFeedback']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($userFeedback['UserFeedback']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attachment'); ?></dt>
		<dd> 
			<?php echo $this->Html->link($userFeedback['UserFeedback']['file'], BASE_URL.'files/user_feedback/file/'.$userFeedback['UserFeedback']['dir'] . '/' . $userFeedback['UserFeedback']['file'], array('target' => '_blank')); ?>
			&nbsp;
		</dd>
		 
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($userFeedback['UserFeedback']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
 
</div>
</div>
</div>
</div>