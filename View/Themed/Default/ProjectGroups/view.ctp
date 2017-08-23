<?php echo $this->Html->link('Project Group', array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false)); ?> 
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Project Group'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
      
<div class="projectGroups view-data">

	<dl> 
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($projectGroup['ProjectGroup']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectGroup['Company']['name'], array('controller' => 'companies', 'action' => 'view', $projectGroup['Company']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectGroup['Project']['name'], array('controller' => 'projects', 'action' => 'view', $projectGroup['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($projectGroup['ProjectGroup']['note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start'); ?></dt>
		<dd>
			<?php echo h($projectGroup['ProjectGroup']['start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End'); ?></dt>
		<dd>
			<?php echo h($projectGroup['ProjectGroup']['end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($projectGroup['ProjectGroup']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($projectGroup['ProjectGroup']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectGroup['User']['name'], array('controller' => 'users', 'action' => 'view', $projectGroup['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($projectGroup['ProjectGroup']['type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
 

 <div class="related">
	<h3><?php echo __('Related Project Workers'); ?></h3>
	<?php if (!empty($projectGroup['ProjectWorker'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-bordered">
	<tr> 
		<th><?php echo __('Worker ID'); ?></th> 
		<th><?php echo __('Name'); ?></th> 
		<th><?php echo __('Created'); ?></th> 
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($projectGroup['ProjectWorker'] as $projectWorker): ?>
		<tr> 
			<td><?php echo $projectWorker['User']['username']; ?></td> 
			<td><?php echo $projectWorker['User']['name']; ?></td> 
			<td><?php echo $projectWorker['created']; ?></td> 
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'project_workers', 'action' => 'view', $projectWorker['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'project_workers', 'action' => 'edit', $projectWorker['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'project_workers', 'action' => 'delete', $projectWorker['id']), array(), __('Are you sure you want to delete # %s?', $projectWorker['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
 
</div>


</div>
    </div>
  </div> 
</div>