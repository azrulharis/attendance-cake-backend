<?php echo $this->Html->link(__('News List'), array('action' => 'index'), array('class' => 'btn btn-default')); ?>
<?php echo $this->Html->link(__('Add News'), array('action' => 'add'), array('class' => 'btn btn-success')); ?>
<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $news['News']['id']), array('class' => 'btn btn-warning')); ?>
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo h($news['News']['title']); ?></h2> 
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>

<div class="news view-data"> 
	<dl> 
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($news['News']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<p class="wrapper"><?php echo h($news['News']['body']); ?></p>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($news['News']['created']); ?>
			&nbsp;
		</dd> 
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($news['User']['username'], array('controller' => 'users', 'action' => 'view', $news['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo status($news['News']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
 
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