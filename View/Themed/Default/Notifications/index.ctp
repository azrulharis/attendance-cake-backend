
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Notifications'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo ->flash(); ?>
<div class="notifications index">
	
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('body'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('link'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($notifications as $notification): ?>
	<tr>
		<td><?php echo h($notification['Notification']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($notification['User']['name'], array('controller' => 'users', 'action' => 'view', $notification['User']['id'])); ?>
		</td>
		<td><?php echo h($notification['Notification']['body']); ?>&nbsp;</td>
		<td><?php echo h($notification['Notification']['created']); ?>&nbsp;</td>
		<td><?php echo h($notification['Notification']['status']); ?>&nbsp;</td>
		<td><?php echo h($notification['Notification']['type']); ?>&nbsp;</td>
		<td><?php echo h($notification['Notification']['link']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $notification['Notification']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $notification['Notification']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $notification['Notification']['id']), array(), __('Are you sure you want to delete # %s?', $notification['Notification']['id'])); ?>
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