<?php echo $this->Html->link(__('Add News'), array('action' => 'add'), array('class' => 'btn btn-success')); ?>
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2>Company News</h2> 
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>

 
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	<thead>
	<tr> 
			<th><?php echo $this->Paginator->sort('title'); ?></th> 
			<th><?php echo $this->Paginator->sort('created'); ?></th> 
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($news as $news): ?>
	<tr> 
		<td><?php echo h($news['News']['title']); ?>&nbsp;</td> 
		<td><?php echo h($news['News']['created']); ?>&nbsp;</td> 
		<td>
			<?php echo $this->Html->link($news['User']['username'], array('controller' => 'users', 'action' => 'view', $news['User']['id'])); ?>
		</td>
		<td><?php echo status($news['News']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $news['News']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $news['News']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $news['News']['id']), array(), __('Are you sure you want to delete # %s?', $news['News']['id'])); ?>
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

<?php function status($status) {
	if($status == 1) {
		return 'Published';
	} else {
		return 'Draft';
	}
}
?>