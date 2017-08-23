
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Ot Request Worker'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
      
<div class="otRequestWorkers view-data">

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($otRequestWorker['OtRequestWorker']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ot Request'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otRequestWorker['OtRequest']['id'], array('controller' => 'ot_requests', 'action' => 'view', $otRequestWorker['OtRequest']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Worker'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otRequestWorker['Worker']['name'], array('controller' => 'workers', 'action' => 'view', $otRequestWorker['Worker']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($otRequestWorker['OtRequestWorker']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attendance Worker'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otRequestWorker['AttendanceWorker']['id'], array('controller' => 'attendance_workers', 'action' => 'view', $otRequestWorker['AttendanceWorker']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ot Request Worker'), array('action' => 'edit', $otRequestWorker['OtRequestWorker']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ot Request Worker'), array('action' => 'delete', $otRequestWorker['OtRequestWorker']['id']), array(), __('Are you sure you want to delete # %s?', $otRequestWorker['OtRequestWorker']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ot Request Workers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ot Request Worker'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ot Requests'), array('controller' => 'ot_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ot Request'), array('controller' => 'ot_requests', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workers'), array('controller' => 'workers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Worker'), array('controller' => 'workers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attendance Workers'), array('controller' => 'attendance_workers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendance Worker'), array('controller' => 'attendance_workers', 'action' => 'add')); ?> </li>
	</ul>
</div>


</div>
    </div>
  </div> 
</div>