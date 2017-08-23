<?php
	echo $this->Html->script(array(
							'jquery.min',
							'Newsletter.newsletter'
						));
?>
<script>
jQuery(document).ready(function() {   
   
   <!--  START code for getting alll newsletter on chage of newsletter category_id in send_newsletter page -->
	<?php 	
	   if(!empty($this->request->data['Newsletter']['newsletter_category_id'])){?>
	  	     fetch_newsletters("<?php echo $this->request->data['Newsletter']['newsletter_category_id']; ?>");
	   <?php }
	   else{?>
	   jQuery('#NewsletterNewsletterCategoryId').change(function(){		         
				var cat_id = jQuery('#NewsletterNewsletterCategoryId').val();				
					fetch_newsletters(cat_id);
		});
	   <?php   }?>	
		check_uncheck();  // for checkAll and Uncheck All
		
	<!--  END code for getting alll newsletter on chage of newsletter category_id in send_newsletter page --> 
});
</script>
<!-- BEGIN PAGE HEADER-->
<h1 class="page-header">
 Send Newsletter
</h3>
<div style="margin-bottom:15px;margin-top:10px;" class="btn-group btn-breadcrumb" id="bc1">
    <?php echo $this->Html->link('<i class="fa fa-home"></i>', array('plugin' => false, 'controller' => 'users','action' => 'dashboard'),array('style'=>'background:#000000;','escape'=>false,'class'=>'btn btn-default')); ?>
     <?php echo $this->Html->link(__('Newsletter'), array('plugin' => 'newsletter', 'controller' => 'newsletters','action' => 'index'),array('escape'=>false,'class'=>'btn btn-default')); ?>
    <a class="btn btn-default active" href="javascript::void();" style="display: block;"><div>Send </div></a> 
    <a class="" href="#"><div></div></a> 
 </div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<!-- Flash Messages -->   
<?php echo $this->Session->flash(); ?> 
<!-- Flash Messages --> 
<div class="row">
	<div class="col-md-12">
    	<div class="form">
               <div class="form-head">
                       <div class="form-head-lt"><i class="fa fa-mail-forward"></i>Send Newsletter</div>
                        <div style="clear:both"></div>
               </div>
                  <?php echo $this->Form->create('Newsletter',array('novalidate'=>true)); ?>
               <div class="form-art">
                 		 <h3 class="margin-bottom-20"> Choose Subscriber from below list </h3>
						 <div class="row"> 	
								
								
						<?php 						
						 echo $this->Form->input('Newsletter.subscriber',array('multiple'=>'checkbox','label'=>false,'options'=>
						 $subscribers,'class'=>'col-md-4 subscribe')); 
						 ?>		 
					
						 
						 </div> 
						
						 <br/>
						  Total Emails : <?php echo count($subscribers); ?>
						   <br/>
						   <br/>
						 <div class="row"> 
							<div class="col-md-4">	
								<div class="form-group">   
								  <?php 
									echo $this->Form->button('Check All',array('type'=>'button','class'=>'btn default','id'=>'checkall')); 
									echo "&nbsp;&nbsp;&nbsp;&nbsp;";
									echo $this->Form->button('Uncheck All',array('type'=>'button','class'=>'btn default','id'=>'uncheckall')); 
								  ?>
								</div> 
							 </div>
						 </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                               <label class="control-label">Newsletter Category</label>
									<?php echo $this->Form->input('Newsletter.newsletter_category_id', array('class' => 'form-control','label' => false,'empty'=>'Select Newsletter Category','selected'=>$category_id)); ?> 
                                </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                                <label class="control-label">Newsletter</label>
                                <div id="NewsletterDiv">
								<?php 									
									echo $this->Form->input('Newsletter.newsletter_id', array('class' => 'form-control','label' => false,'empty'=>'Select Newsletter','selected'=>$newsletter_id)); ?>
                        		</div>
                        </div>
                        <!--/span-->
                    </div>
                    
    
   					 <!--/row-->
    
   
                
               </div>
               <div class="form-foot">
                   	<?php echo $this->Html->link('<button type="button" class="btn default">'.__('Cancel').'</button>', array('action' => 'index'),array('escape'=> false));?>
										<?php echo $this->Form->button('Send Newsletter', array('class' => 'btn default','title' => 'Click here to Send Newsletter'),array('escape'=>false) );?>	
               </div>
               <?php echo $this->Form->end(); ?>
           </div>	
	</div>
</div>
<!-- END PAGE CONTENT-->