<?php echo $this->Html->link('All User', array('action' => 'index'), array('class' => 'btn btn-primary')); ?>

<?php echo $this->Html->link('Change Password', array('action' => 'editpassword', $this->request->data['User']['id']), array('class' => 'btn btn-danger')); ?>

<div class="row"> 
 <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2>Edit</h2> 
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->element('Users/edit_form');?> 
      </div>
    </div>
  </div> 
</div>