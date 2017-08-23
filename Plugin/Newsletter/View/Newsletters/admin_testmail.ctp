<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
 Send Test Mail
</h3>
<div style="margin-bottom:15px;margin-top:10px;" class="btn-group btn-breadcrumb" id="bc1">
    <?php echo $this->Html->link('<i class="fa fa-home"></i>', array('plugin' => false, 'controller' => 'users','action' => 'dashboard'),array('style'=>'background:#000000;','escape'=>false,'class'=>'btn btn-default')); ?>
     <?php echo $this->Html->link(__('Newsletter Category'), array('plugin' => 'newsletter', 'controller' => 'newsletter_categories','action' => 'manage'),array('escape'=>false,'class'=>'btn btn-default')); ?>
    <a class="btn btn-default active" href="javascript::void();" style="display: block;"><div>Test Mail</div></a> 
    <a class="" href="#"><div></div></a> 
 </div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
 <!-- Flash Messages -->   
 <?php echo $this->Session->flash(); ?> 
  <!-- Flash Messages -->  
<hr>
<div class="row">
	<div class="col-md-12">
   		 <div class="row">
<div class="col-md-12">
                  <div class="form">
                       <div class="form-head">
                               <div class="form-head-lt"><i class="fa fa-mail-forward"></i><?php echo __('Send Test Mail'); ?></div>
                                <div style="clear:both"></div>
                       </div>
                        <?php 
							echo $this->Form->create('Newsletter',array('novalidate'=>true));    //'novalidate'=>true							
						 ?>
                       <div class="form-art">
                      
                            <div class="row">
                                <div class="col-md-6">
                                	<div class="form-group">
                                    	<label class="control-label">Email</label>
										<?php echo $this->Form->input('Newsletter.email', array('class' => 'form-control','label' => false)); ?> 	
                                     </div>
                                   
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                		<label class="control-label">Subject</label>
										<?php echo $this->Form->input('Newsletter.subject', array('class' => 'form-control','label' => false,'empty'=>'Select Newsletter Category')); ?> 
                                </div>
                                <!--/span-->
                            </div>
                           <!--/row-->
						    <div class="row">
                                <div class="col-md-12">
                                	<label class="control-label">Content</label>
                                	<?php echo $this->Form->input('Newsletter.content', array('class' => 'form-control ckeditor','label' => false)); ?>
                                </div>
                                <!--/span-->
                                
                            </div>
                            <!--/row-->
					  <div class="form-foot">
                       		<?php echo $this->Form->button('Send',array('class'=>'btn default')); ?>
					   </div>
                       <?php echo $this->Form->end(); ?>
                   </div>
             </div>
		</div>
		
	</div>
</div>

<!-- END PAGE CONTENT-->	