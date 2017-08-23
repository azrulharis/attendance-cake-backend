<div class="row">
    <div class="col-md-12">
    <?php if($user && $payment) { ?>
    <div class="table-responsive">
    <?php echo $this->Form->create('Payment', array('class'=>'horizontal-form','novalidate'=>true)); 
          echo $this->Form->hidden('id');
        ?>
                
        <div style="display: none">
          <?php echo $this->Form->input("status", array('value' => 1)); ?> 
          <?php echo $this->Form->input("Tree.status", array('value' => 1)); ?>
        </div>
               
        <?php echo $this->Form->button('Activate',array('class'=>'btn btn-success')); ?>
         <?php echo $this->Html->link(__('Cancel'), array('plugin' => false, 'controller' => 'payments',
   'action' => 'index'),array('escape'=>false,'class'=>'btn btn-warning')); ?>
         
        <?php echo $this->Form->end(); ?>
      <h4>User Information</h4>
      <table class="table">
        <tr>
          <td width="30%">Full Name:</td><td><?php echo $user['User']['firstname']; ?></td>
        </tr> 
        <tr>
          <td>Username:</td><td><?php echo $user['User']['username']; ?></td>
        </tr>
        <tr>
          <td>Email:</td><td><?php echo $user['User']['email']; ?></td>
        </tr>
        <tr>
          <td>Phone:</td><td><?php echo $user['User']['mobile_number']; ?></td>
        </tr> 
      </table> 

      <h4>Payment Information</h4>
      <table class="table"> 
        <tr>
          <td width="30%">Payment Date:</td><td><?php echo $payment['Payment']['payment_date']; ?></td>
        </tr>
        <tr>
          <td>Payment Time:</td><td><?php echo $payment['Payment']['payment_time']; ?></td>
        </tr>  
        <tr>
          <td>Created:</td><td><?php echo $payment['Payment']['created']; ?></td> 
        </tr> 
        <tr>
          <td>Transaction No:</td><td><?php echo $payment['Payment']['transaction_number']; ?></td>
        </tr>
        <tr>
          <td>Remark:</td><td><?php echo $payment['Payment']['remark']; ?></td>
        </tr>
        <?php if($payment['Payment']['image']) { ?> 
          <tr>
            <td colspan="2"><?php 
            if(is_numeric($payment['Payment']['file_dir'])) {
              if(strpos($payment['Payment']['image'], 'pdf')) { ?>
                <a href="/dashboard/files/payment/image/<?php echo $payment['Payment']['file_dir']; ?>/<?php echo $payment['Payment']['image']; ?>" target="_blank">View PDF Attach: <?php echo $payment['Payment']['image']; ?></a>
              <?php } else {
                echo $this->Html->image('/files/payment/image/'.$payment['Payment']['file_dir'].'/'.$payment['Payment']['image']); 
              } 
            } else {
              echo $this->Html->image('/img/Payments/'.$payment['Payment']['image']); 
            }
            ?></td>
          </tr>
        <?php } ?>
      </table> 

    </div>
    <?php } else { ?>
      <div class="alert alert-danger">Data not found</div>
    <?php } ?>
         
        
            
  </div>   
</div>					 