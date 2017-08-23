<?php echo $this->Html->link(__('My Feedback'), array('action' => 'index'), array('class' => 'btn btn-primary btn-sm')); ?>
<?php echo $this->Html->link(__('Add New Feedback'), array('action' => 'add'), array('class' => 'btn btn-success btn-sm')); ?>
<div class="row"> 
  <div class="col-xs-12"> 
    <div class="x_panel tile">
      <div class="x_title">
        <h2>User Feedback</h2> 
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>

<div class="userFeedbacks index"> 
	<table cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
	<thead>
	<tr> 
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('body'); ?></th> 
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($userFeedbacks as $userFeedback): ?>
	<tr> 
		<td>
			<?php echo $this->Html->link($userFeedback['User']['firstname'], array('controller' => 'users', 'action' => 'view', $userFeedback['User']['id'])); ?>
		</td>
		<td><?php echo h($userFeedback['UserFeedback']['name']); ?>&nbsp;</td>
		<td><?php echo h($userFeedback['UserFeedback']['body']); ?>&nbsp;</td> 
		<td><?php echo h($userFeedback['UserFeedback']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userFeedback['UserFeedback']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userFeedback['UserFeedback']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userFeedback['UserFeedback']['id']), array(), __('Are you sure you want to delete # %s?', $userFeedback['UserFeedback']['id'])); ?>
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
		  echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
		  echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
		  echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
		?>
	</ul>
</div>
 
</div>
</div>
</div>
</div>