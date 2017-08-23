<?php echo $this->Html->link('Add Project', array('action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?> 

<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Projects'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>
<div class="projects index">
	<?php echo $this->Form->create('Project', array('class' => 'form-horizontal', 'type' => 'GET')); ?>
		<table cellpadding="0" cellspacing="0" class="table">
			<tr>
			<td><?php echo $this->Form->input('name', array('placeholder' => 'Project name', 'class' => 'form-control', 'required' => false, 'id' => 'findProduct', 'label' => false)); ?>  
			</td>
			<td><?php echo $this->Form->input('address', array('type' => 'text', 'placeholder' => 'Address', 'class' => 'form-control', 'required' => false, 'label' => false)); ?>  
			</td>
			 
			<td><?php echo $this->Form->submit('Search', array('type' => 'submit', 'name' => 'search', 'class' => 'btn btn-success pull-right')); ?></td> 
			</tr>
		</table>
	<?php $this->end(); ?>
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	<thead>
	<tr> 
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('postcode'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('state_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('start'); ?></th>
			<th><?php echo $this->Paginator->sort('end'); ?></th>
			<th><?php echo $this->Paginator->sort('note'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($projects as $project): ?>
	<tr> 
		<td><?php echo h($project['Project']['name']); ?>&nbsp;</td>
		<td><?php echo h($project['Project']['address']); ?>&nbsp;</td>
		<td><?php echo h($project['Project']['postcode']); ?>&nbsp;</td>
		<td><?php echo h($project['Project']['city']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($project['State']['name'], array('controller' => 'states', 'action' => 'view', $project['State']['id'])); ?>
		</td>
		<td><?php echo h($project['Project']['created']); ?>&nbsp;</td>
		<td><?php echo h($project['Project']['modified']); ?>&nbsp;</td>
		<td><?php echo h($project['Project']['start']); ?>&nbsp;</td>
		<td><?php echo h($project['Project']['end']); ?>&nbsp;</td>
		<td><?php echo h($project['Project']['note']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($project['User']['name'], array('controller' => 'users', 'action' => 'view', $project['User']['id'])); ?>
		</td>
		<td><?php echo h($project['Project']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $project['Project']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $project['Project']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $project['Project']['id']), array(), __('Are you sure you want to delete # %s?', $project['Project']['name'])); ?>
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