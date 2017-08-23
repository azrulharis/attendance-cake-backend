<?php echo $this->Html->link('Change Profile', array('action' => 'edit', $this->request->data['User']['id']), array('class' => 'btn btn-primary')); ?>

<div class="row"> 
 <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h3><i class="icon-user"></i>Change Password</h3>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->element('Users/editpassword');?> 
      </div>
    </div>
  </div> 
</div>