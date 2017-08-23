<div class="row">
<div class="col-md-12">
          <div class="form">
               <div class="form-head">
                       <div class="form-head-lt"><i class="fa fa-newspaper-o"></i>Newsletter</div>
                        <div style="clear:both"></div>
               </div>
                  <?php echo $this->Form->create('Newsletter',array('type' => 'file','novalidate'=>true)); 
                      echo $this->Form->hidden('id');
                  ?>
               <div class="form-art">
                 <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Newsletter Category</label>
                            <?php 
							echo $this->Form->input('Newsletter.newsletter_category_id', array('class' => 'form-control','placeholder'=>'Title','label' => false,'empty'=>'Select Newsletter Category')); ?> 
                             </div>
                        </div>
                    <!--/span-->
                     <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Title</label>
                            <?php echo $this->Form->input('Newsletter.title', array('class' => 'form-control','id'=>'title','label' => false)); ?> 			
                            </div>
                    </div>
                    <!--/span-->
                 </div>
                 <div class="row">
                         <div class="col-md-6">
                            <label class="control-label">Slug</label>
                            <?php 
                                echo $this->Form->input('Newsletter.slug', array('class' => 'slug form-control','id'=>'slug', 'placeholder'=>'slug','readonly' => 'readonly','label' => false));
                            ?>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                                <label class="control-label">Subject</label>
                                <?php echo $this->Form->input('Newsletter.subject', array('class' => 'form-control','label' => false)); ?> 
                        </div>
                        <!--/span-->
                    </div>
    			<!--/row-->
                 <div class="row">
                    <div class="col-md-6">
                            <label class="control-label">Description</label>
                            <?php echo $this->Form->input('Newsletter.description', array('class' => 'form-control','label' => false,'rows' => 5));	?>  				
                            <span class="help-block">
                            Decribe about this newsletter. </span>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                            <label class="control-label">Placeholder</label>
                            <?php echo $this->Form->input('Newsletter.placeholders', array('class' => 'form-control','label' => false,'rows' => 5,'readonly' => false));	?>  				
                            <span class="help-block">
                            All these place holders can be used into newsletter. place holders can't be edited.</span>	
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                 <div class="row">
                    <div class="col-md-12">
                        <label class="control-label">News Letter</label>
                        <?php echo $this->Form->input('Newsletter.content', array('class' => 'form-control ckeditor','label' => false)); ?>
                            <span class="help-block">
                            This design will show in recieved newsletter and place holders will replace with dynamic content.</span>
                    </div>
                    <!--/span-->
                </div>
                 <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        
                        <div class="checkbox">
                        <?php  echo $this->Form->input('status', array('label'=> array('class'=>'control-label', 'text'=>'Status'),'div'=>false,'hiddenField' => false)); ?>					
                        </div>
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