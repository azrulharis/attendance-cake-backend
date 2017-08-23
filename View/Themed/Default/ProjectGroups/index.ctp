<?php echo $this->Html->link('Add Project Group', array('action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?> 

<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Project Groups'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
       <?php echo $this->Session->flash(); ?>
<div class="projectGroups index">
	<?php echo $this->Form->create('Project', array('class' => 'form-horizontal', 'type' => 'GET')); ?>
		<table cellpadding="0" cellspacing="0" class="table table-bordered">
			<tr>
			<td><?php echo $this->Form->input('name', array('placeholder' => 'Group name', 'class' => 'form-control', 'required' => false, 'id' => 'findProduct', 'label' => false)); ?>  
			</td>
			<td><?php echo $this->Form->input('project', array('placeholder' => 'Project Name', 'class' => 'form-control', 'required' => false, 'label' => false)); ?>  
			</td>
			<td><?php 
			$status = array('Active', 'Closed'); 	
			echo $this->Form->input('status', array('options' => $status, 'empty' => '-All Status-', 'class' => 'form-control', 'required' => false, 'label' => false)); 
			?>  
			</td> 
			<td><?php echo $this->Form->submit('Search', array('type' => 'submit', 'name' => 'search', 'class' => 'btn btn-success pull-right')); ?></td> 
			</tr>
		</table>
	<?php $this->end(); ?>
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	<thead>
	<tr> 
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('company_id'); ?></th>
			<th><?php echo $this->Paginator->sort('project_id'); ?></th>  
			<th><?php echo $this->Paginator->sort('created'); ?></th> 
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($projectGroups as $projectGroup): ?>
	<tr> 
		<td><?php echo h($projectGroup['ProjectGroup']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($projectGroup['Company']['name'], array('controller' => 'companies', 'action' => 'view', $projectGroup['Company']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($projectGroup['Project']['name'], array('controller' => 'projects', 'action' => 'view', $projectGroup['Project']['id'])); ?>
		</td>  
		<td><?php echo h($projectGroup['ProjectGroup']['created']); ?>&nbsp;</td> 
		<td>
			<?php echo $this->Html->link($projectGroup['User']['name'], array('controller' => 'users', 'action' => 'view', $projectGroup['User']['id'])); ?>
		</td>
		<td><?php echo h($projectGroup['ProjectGroup']['type']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $projectGroup['ProjectGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $projectGroup['ProjectGroup']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $projectGroup['ProjectGroup']['id']), array(), __('Are you sure you want to delete # %s?', $projectGroup['ProjectGroup']['id'])); ?>
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