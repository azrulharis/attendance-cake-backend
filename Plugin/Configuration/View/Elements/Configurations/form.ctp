<?php /*?><div class="row" style="margin-bottom:10px;">
	<div class="col-md-12">
		<div class="clearfix  right">
		<?php echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-list"></i> '.__('List Configurations').'</button>', array('action' => 'index'), array('escape' => false)); ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
          <div class="form">
               <div class="form-head">
                    <div class="form-head-lt"><i class="fa fa-cogs"></i>Configuration</div>
                    <div style="clear:both"></div>
               </div>
                <?php echo $this->Form->create("Configuration", array("class"=> "horizontal-form",'novalidate'=>true)); 
				echo $this->Form->hidden('id');
				?>   
                <div class="form-art">
                    <div class="row">
                        <div class="col-md-6">
                               	<?php  echo $this->Form->input("name", array("class"=> "form-control", "empty" => "-Select One-","label"=> array('class'=>'control-label'), 'div' => array('class' => 'form-group'))); ?>		
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                           	<?php  echo $this->Form->input("value", array("class"=> "form-control", "empty" => "-Select One-","label"=> array('class'=>'control-label'), 'div' => array('class' => 'form-group'))); ?>	
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
</div>	<?php */?>	
<div class="row profile">
    <div class="col-md-12">
        <!--BEGIN TABS-->
        <div class="tabbable tabbable-custom tabbable-full-width">
            <ul class="nav nav-tabs newtab">
                <li class="active">
                    <a href="#tab_1_1" data-toggle="tab">
                    Setting </a>
                </li>
                <li>
                    <a href="#tab_1_2" data-toggle="tab">
                    Misc </a>
                </li>
                
            </ul>
            <?php 
		         echo $this->Form->create('Configuration',array('class'=>'horizontal-form','type' => 'file')); 
                 echo $this->Form->hidden('id');
         	?>
        	 	<div class="tab-content prof-tab">
                    <div class="tab-pane active" id="tab_1_1">
                        <div class="row">
                         	<div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"> Name</label>
                                    <?php echo $this->Form->input('Configuration.name', array('class' => 'form-control ','label' => false));?><span class="help-block">e.g., 'Site.title'</span>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Value</label>
                                    <?php echo $this->Form->input('Configuration.value', array('class' => 'form-control','label' => false));
                                    ?> 
                                </div>
                             </div>
                             </div>
                        </div>
                    </div>
            		<div id="tab_1_2" class="tab-pane fade">
                   		 <div class="row">
                       		<div class="col-md-12">
                        	 <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tile</label>
                                <?php echo $this->Form->input('Configuration.title', array('class' => 'form-control','label' => false));?>
                            </div>
                        </div>
                        	 <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Description</label>
								<?php echo $this->Form->input('Configuration.description', array('class' => 'form-control','label' => false));
                                ?> 
                            </div>
                         </div>
                         	</div>
                   		 </div>
                   		 <div class="row">
                        	<div class="col-md-12">
                        	<div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Input Type</label>                                
                                <?php echo $this->Form->input('Configuration.input_type', array('class' => 'form-control','label' => false,
								'options'=>array('text'=>'text','textarea'=>'textarea','file'=>'file','checkbox'=>'checkbox','radio'=>'radio','button'=>'button','select'=>'select')
								,'empty'=>'Select InputType','required'=>false));?>
                            </div>
                        </div>
                        	<div class="col-md-6">
                            <div class="form-group">
                            	 <label class="control-label">Editable</label>                                
								<?php echo $this->Form->input('Configuration.editable',array('label'=>false));
                                ?> 
                            </div>
                         </div>
                         </div>
                   	 	</div>
                   		 <div class="row">
                         	<div class="col-md-12">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Params</label>
								<?php echo $this->Form->input('Configuration.params', array('class' => 'form-control','label' => false));
                                ?> 
                            </div>
                         </div>
                         </div>
                    	</div>
                        
                        
                	 </div>
           		</div> 
         		<div class="row">
           		 <div class="col-md-9"></div>
            <div class="col-md-3">
                  <div class="form-actions right">			
                      <?php echo $this->Form->button('Save Configuration', array('class' => 'btn blue','title' => 'Click here to save the configuration'),array('escape'=>false) );?>	
                  </div>
            </div>  
         </div>  
	   		<?php echo $this->Form->end(); ?>
         
            
        </div>
        <!--END TABS-->
    </div>
</div>




						