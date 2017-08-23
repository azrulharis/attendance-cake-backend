<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php 
   if(!empty($this->params['pass']['0'])) 
          echo $this->params['pass']['0']." "; 
     
	 echo 'Configuration';
   ?></h2> 
        <div class="clearfix"></div>
      </div>
      <div class="x_content">  

<!-- Content Header (Page header) -->
 
 
<?php echo $this->Session->flash(); ?> 
 
<?php 
		echo $this->Form->create('Configuration', array('class' => 'form-horizontal form-label-left', 'type' => 'file')); 
		?>
			 
				<div class="col-sm-12"> 
						 
									<?php   
									if(count($configurations)>0){
										
									
									foreach ($configurations as $configuration){
									 
									?>
									 <div class="form-group">
										   <?php
											 if(!empty($configuration['Configuration']['title'])){
												 echo '<label class="col-sm-3 control-label">'.$configuration['Configuration']['title'].'</label>'; 
											 }
											 else{
												$keyE = explode('.', $configuration['Configuration']['name']);
												$keyTitle = ucfirst(str_replace('_',' ',$keyE['1']));
												 echo '<label class="col-sm-3 control-label">'.$keyTitle.'</label>'; 
											 }
											 ?>
										<div class="col-sm-9">
										<?php
										if($configuration['Configuration']['editable']==1){
												$keyE = explode('.', $configuration['Configuration']['name']);
												$keyTitle = ucfirst(str_replace('_',' ',$keyE['1']));
									
												   $label = ($configuration['Configuration']['title'] != null) ? $configuration['Configuration']['title'] : $keyTitle;
									
												  $i = $configuration['Configuration']['id'];
												
												   echo $this->Form->input("Configuration.$i.id", array(
														'value' => $configuration['Configuration']['id'],
												   ));
												   
												   echo $this->Form->input("Configuration.$i.input_type", array(
														'type' => 'hidden', 'value' => $configuration['Configuration']['input_type'],
												   )); 
												
												   echo $this->Form->input("Configuration.$i.name", array(
														'type' => 'hidden', 'value' => $configuration['Configuration']['name']
												   ));
													
													################# Field Building #############
													$inputType = ($configuration['Configuration']['input_type'] != null) ? $configuration['Configuration']['input_type'] : 'text';
													if ($configuration['Configuration']['input_type'] == 'multiple') {
														$multiple = true;
														if (isset($configuration['Params']['multiple'])) {
															$multiple = $configuration['Params']['multiple'];
														};
														$selected = json_decode($configuration['Configuration']['value']);
														$options = explode(',',$configuration['Configuration']['params']);
														
														$output = $this->Form->input("Configuration.$i.value", array(
															'label' => false,
															'multiple' => $multiple,
															'options' =>  $options,
															'selected' => $selected,
															'class' => 'form-control input-medium'
															
														));
													} 
													elseif ($configuration['Configuration']['input_type'] == 'select') {
									
														$selected = explode(',',$configuration['Configuration']['value']);
														
														$options = explode(',',$configuration['Configuration']['params']);
														$newopts =array();
														foreach($options as $key => $value){
															  $newopts[$value] = $value;
														}
														$output = $this->Form->input("Configuration.$i.value", array(
															'label' => false,
															'options' =>  $newopts,
															'selected' => $selected,
															'class' => 'form-control select2me',										
														));
													} 
													elseif ($configuration['Configuration']['input_type'] == 'checkbox') {
														
														$tooltip = array(
															'data-trigger' => 'hover',
															'data-placement' => 'right',
															'data-title' => $configuration['Configuration']['description'],
														);
														
														if ($configuration['Configuration']['value'] == 1) {
															$output = $this->Form->input("Configuration.$i.value", array(          //removed Configuration.$i.value
																'type' => $configuration['Configuration']['input_type'],
																'checked' => 'checked',
																'tooltip' => $tooltip,
																'label' => false,
																'class' => ''
															));
														} else {
															$output = $this->Form->input("Configuration.$i.value", array(          //removed Configuration.$i.value
																'type' => $configuration['Configuration']['input_type'],
																'tooltip' => $tooltip,
																'label' => false,
																'class' => ''
															));
														}
													} elseif ($configuration['Configuration']['input_type'] == 'radio') {
														$options = explode(',',$configuration['Configuration']['params']);
														$newopts =array();
														foreach($options as $key => $value){
															  $newopts[$value] = $value;
														}														
														$value = $configuration['Configuration']['value'];	
														$output = $this->Form->input("Configuration.$i.value", array(                //removed Configuration.$i.value
															'legend' =>false,
															'type' => 'radio',
															'options' => $newopts,
															'value' => $value,
															'div'=>false
														));
													}			
													elseif ($configuration['Configuration']['input_type'] == 'textarea') {
														$value = $configuration['Configuration']['value'];
														$output = $this->Form->input("Configuration.$i.value", array(                //removed Configuration.$i.value
															'label' =>false,
															'type' => 'textarea',
															'value' => $value,
															'class' => 'form-control	',
															'rows' => '2'
														));
													}
													elseif ($configuration['Configuration']['input_type'] == 'file') {							
														$value = $configuration['Configuration']['value'];							
														$output = $this->Form->input("Configuration.$i.value", array(              //removed Configuration.$i.value
															'label' =>false,
															'type' => 'file',
															'value' => $value,
															'class'=>'btn default'
														));
														
														$image="";
														
														if(file_exists(IMAGE_PATH.$value))
														{
															$image = $this->Html->image($value,array('style'=>'width:100px;'));
														}	
														$output = $image.'<br>'.$output;
													}
													else {
														 $value = $configuration['Configuration']['value'];
														 $output = $this->Form->input("Configuration.$i.value", array(              //removed Configuration.$i.value
															'type' => $inputType,
															'label' => false,
															'class' => 'form-control',
															'value' => $value,
															'help' => $configuration['Configuration']['description'],
															
														));
													}
										}
										else{
											$output = $this->Form->input('Configuration.value',array('class'=>'form-control ','escape'=>false,'readonly'=>'readonly','label'=>false,'type'=>'text','value'=>$configuration['Configuration']['value']));
										}
										
										echo $output; 
									
										?>
                                        </div>
                                    
									</div>	
									<?php }
											unset($configuration); 
									}
									else
									{
									?>
									<?php echo __('NO RECORD FOUND'); ?>
									<?php } ?>
                                          <div class="form-group"> <div class="col-sm-3"></div>
				 							  <div class="col-sm-9">
				  								 <?php echo $this->Form->button('Save',array('class'=>'btn default')); ?></div></div>
																  
					 
				 
				 </div>
		 
			 
               <?php echo $this->Form->end(); ?>		 		
 	
  			
			<!--END PAGE CONTENT-->

</div>
    </div>
  </div> 
</div>