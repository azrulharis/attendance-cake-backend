<div class="row">
<div class="col-md-12">
          <div class="form">
               <div class="form-head">
                       <div class="form-head-lt"><i class="fa fa-gear"></i>Newsletter Setting</div>
                        <div style="clear:both"></div>
               </div>
                  <?php echo $this->Form->create('NewsletterSetting',array('type' => 'file','novalidate'=>true)); 
                      echo $this->Form->hidden('NewsletterSetting.id');
                  ?>
               <div class="form-art">
                 <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Transport</label>
                            <?php echo $this->Form->input('NewsletterSetting.transport', array('class' => 'form-control','placeholder'=>'transport','label' => false)); ?> 
                             </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <label class="control-label">Port</label>
                            <?php 
                                echo $this->Form->input('NewsletterSetting.port', array('class' => 'form-control', 'placeholder'=>'Port','label' => false));
                            ?>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Host</label>
                                <?php echo $this->Form->input('NewsletterSetting.host', array('class' => 'form-control','label' => false)); ?> 			
                                </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                                <label class="control-label">Username</label>
                                <?php echo $this->Form->input('NewsletterSetting.username', array('class' => 'form-control','label' => false)); ?> 
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <?php echo $this->Form->input('NewsletterSetting.password', array('class' => 'form-control','label' => false)); ?> 			
                                </div>
                        </div>
                        <!--/span-->
                    </div>
   				<!--/row-->
        
               </div>
               <div class="form-foot">
                    <?php echo $this->Form->button('Save',array('class'=>'btn default')); ?>
               </div>
               <?php echo $this->Form->end(); ?>
           </div>
     </div>
</div>