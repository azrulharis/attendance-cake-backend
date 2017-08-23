<style>
span.slug{display:none;}
input.form-control{ display:block !important;}
</style>
<?php  $screenOption = Configure::read('Blog.ScreenOption'); ?>
<div class="row">
<?php echo $this->Form->create('Blog',array('class'=>'horizontal-form','novalidate'=>true,'type'=>'file')); 
	  echo $this->Form->hidden('Blog.id');?>	
             <div class="col-md-8">
                 <div class="form-group">
                            <label class="control-label">Title</label>
                            <div class="in-box">
								<?php 
                                    echo $this->Form->input('Blog.title', array('class' => 'form-control','label' => false,'placeholder' => 'Title')); 
                                    if($this->action == 'admin_edit')
                                    {?>
                                    <span style="margin-top:5px; display:block">
                                        <div style="float:left; line-height:30px; display:block;">
                                        <strong><?php echo __('Permalink:') ?></strong> 
                                        <?php echo BASE_URL."<span class='font-green permalinkSlugSpan'>".$this->request->data['Blog']['slug']."</span>"; ?>
                                </div>
                                        <div class="editPermalinkContainer" style="float:left">
                                    
                                <?php		echo $this->Form->input('Blog.editslug', array('style'=>'float:left;','id'=>'BlogEditSlug','class' => 'input-small form-control','label' => false,'div' => false));
                                        
                                        echo $this->Form->button('OK',array('type'=>'button','style' => 'float:left;margin-left:5px;','class' =>'btn default btn editPermalinkOkButton','div'=>false));  
                     
                                         echo $this->Html->link('Cancel','javascript:void(0);',array('class' => 'editPermalinkCancelButton','style' => 'line-height:33px; margin-left:5px;','div'=>false));
                                        
                                        ?>
                                        </div>
                                        <?php echo $this->Form->button('Edit ', array('style'=>' margin-top: 3px;','type'=>'button','class' => 'btn default btn-sm editPermalink','title' => 'Click here to edit the URL') );?> 
                                        
                                        <div style="clear:both"></div>
                                    </span>	
                                <?php } ?>	
                			</div>
                            </div>
                 <div class="form-group"> 
                            <div class="in-box"> 
                              <?php echo $this->Form->input('Blog.content',array('class'=>'ckeditor','label'=>false)); ?>
                            </div>
                          </div>
                 <?php  $style = ($screenOption['Excerpt']['visibility'])?'display:block':'display:none';?>
             	 <div class="form XExcerpt table-wrap" style=" <?php echo $style ?> ">
                       <div class="form-head">
                               <div class="form-head-lt"><i class="fa fa-star"></i> Excerpt</div>
                                 <?php echo $this->element('admin/table_toolbar');?>
                                <div style="clear:both"></div>
                       </div>
                       <div class="form-art table-responsive">
                          <div class="form-group">
                               <label class="control-label">Excerpt</label>
                               <div class="in-box ">
                                   <?php echo $this->Form->input('Blog.excerpt',array('type'=>'textarea','class'=>'form-control','row'=>5,'label'=>false)) ?>
                                   <p>Excerpts are optional hand-crafted summaries of your content that can be used in your theme. </p>
                               </div>
                          </div>
                          
                       </div>
                   </div>
              	 <?php $style = ($screenOption['CustomFields']['visibility'])?'display:block':'display:none'; ?>
                 <div class="form XCustomFields table-wrap" style=" <?php echo $style ?> ">
                       <div class="form-head">
                               <div class="form-head-lt"><i class="fa fa-star"></i> <?php echo __('Custom Fields'); ?></div>
                                 <?php echo $this->element('admin/table_toolbar');?>
                                <div style="clear:both"></div>
                       </div>
                       <div class="table-responsive">
                       <div class="form-art">
                       <div id="AppendContainer">
                       <?php
								$count = 0;
								
							if(isset($this->request->data['BlogMeta']) && !empty($this->request->data['BlogMeta'])) 																																						  									{
									$contentMetas = $this->request->data['BlogMeta'];
									unset($contentMetas[0]);
									unset($contentMetas[1]);
									
									if(!empty($contentMetas))
										{?>
                            <div class="form">
                               <div class="form-head">
                                       <div class="form-head-lt col-md-6" style="text-align:center;"> Title</div>
                                        <div class="form-head-lt col-md-6" style="text-align:center;"> Value</div>
                                        <div style="clear:both"></div>
                               </div>
                               <div class="form-art" id="customFieldContainer">
                              <?php	
										foreach($contentMetas as $key => $contentMeta) 
										{
											
											if($contentMeta['title'] != 'ximage' && $contentMeta['title'] != 'xvideo')
											 {
												 $count++;
								?>
                               		<div class="Newfild xrow <?php echo 'swaprow_'.$contentMeta['id'] ?>" >
                                     	 <div class="row">
                                       <div class="col-md-6"><div class="form-group">
                                         <label class="control-label">Title</label>
                                         <div class="in-box">
                                         			<?php echo $this->Form->hidden('BlogMeta.'.$count.'.id',array('class'=>'form-control','id'=>'BlogMetaId_'.$count,'value' => $contentMeta['id'],'label'=>false)) ;
																						
							echo $this->Form->input('BlogMeta.'.$count.'.title',array('class'=>'form-control','id'=>'BlogMetaName_'.$count,'placeholder'=>'Title','value' => $contentMeta['title'],'label'=>false)) ;
								echo $this->Form->button('Delete',array('class'=>'btn default CustomFieldRemoveButton','type'=>'button','rel'=>$contentMeta['id']));?>
                                         </div>
                                       </div>
                                       </div>
                                       <div class="col-md-6"><div class="form-group">
                                     <label class="control-label">Value</label>
                                     <div class="in-box">
                                     <?php echo $this->Form->input('BlogMeta.'.$count.'.value',array('rows'=>2,'cols'=>3,'type'=>'textarea','class'=>'form-control','id'=>'BlogMetaValue_'.$count,'value' => $contentMeta['value'],'label'=>false)) ?>
                                        </div>
                                   </div></div>
                                   </div>
                                   </div>
                                   <?php } 
										}
										?>
                               </div> 
                           </div>
                           <?php } } ?>
					<?php //echo $this->Form->hidden('rowCount',array('id'=>'CustomFieldContainerRowCount','value' =>$rowCount)) ?>
                       </div>
                       
                       
                           
                            
                           <h4><?php echo __('Add New Custom Field:') ?></h4>
                           <div id="AddCustomFieldContainer">
                              <div class="row">
                               <div class="col-md-6"><div class="form-group">
                                 <label class="control-label">Title</label>
                                 <div class="in-box"><?php echo $this->Form->input('Customtitle',array('class'=>'form-control','label'=>false,'id'=>'BlogMetaName','placeholder'=>'Title')) ?></div>
                               </div></div>
                               <div class="col-md-6"><div class="form-group">
                             <label class="control-label">Value</label>
                             <div class="in-box">
							 <?php echo $this->Form->input('Customvalue',array('rows'=>2,'cols'=>3,'type'=>'textarea','class'=>'form-control','id'=>'BlogMetaValue','label'=>false)) ?></div>
                           </div></div>
                           </div>
                           </div>
                       </div>
                       <div class="form-foot">
                          <?php echo $this->Form->button('Add Custom Field',array('type'=>'button','class'=>'btn default','id'=>'AddCustomField')) ?>
                       </div>
                       <p style="padding:10px 10px 0px 10px;">Custom fields can be used to extra metadata to a post that you can use in your theme. </p>
                       </div>
                   </div>
                 <?php $style = ($screenOption['Discussion']['visibility'])?'display:block':'display:none';?>
                 <div class="form XDiscussion table-wrap" style=" <?php echo $style ?> ">
                       <div class="form-head">
                               <div class="form-head-lt"><i class="fa fa-star"></i> Discussion</div>
                                <?php echo $this->element('admin/table_toolbar');?>
                                <div style="clear:both"></div>
                       </div>
                       <div class="form-art table-responsive">
                               <div class="form-group">
                              <div class="checkbox">
                                   <label> <?php echo $this->Form->input('Blog.comment',array('type' => 'checkbox','div'=>false,'label'=>false)) ?> 	Allow comments. </label> 
                                   
                               </div>
                          </div>
                       </div> 
                   </div>
                 <?php $style = ($screenOption['Slug']['visibility'])?'display:block':'display:none';?>
                 <div class="form XSlug table-wrap" style=" <?php echo $style ?> ">
                       <div class="form-head">
                               <div class="form-head-lt"><i class="fa fa-star"></i> <?php echo __('Slug') ?></div>
                                <?php echo $this->element('admin/table_toolbar');?>
                                <div style="clear:both"></div>
                       </div>
                       <div class="form-art table-responsive">
                             <div class="form-group">
                            <label class="control-label">Slug</label>
                            <div class="in-box"><?php echo $this->Form->input('Blog.slug',array('label'=>false,'class' => 'slug form-control','id'=>'slug','type'=>'text')) ?></div>
                          </div>
                       </div>
                   </div>
                 <?php $style = ($screenOption['Author']['visibility'])?'display:block':'display:none';?>
                 <div class="form XAuthor table-wrap" style=" <?php echo $style ?> ">
                       <div class="form-head">
                               <div class="form-head-lt"><i class="fa fa-star"></i> Author</div>
                                <?php echo $this->element('admin/table_toolbar');?>
                                <div style="clear:both"></div>
                       </div>
                       <div class="form-art table-responsive">
                              <div class="form-group">
                               <label class="control-label">User</label>
                               <div class="in-box ">
                                   <?php echo $this->Form->input('Blog.user_id',array('class' => 'form-control select2me','empty' => 'Select User','label'=>false)) ;?>
                               </div>
                          </div>
                       </div> 
                   </div>
                 <?php  $style = ($screenOption['Seo']['visibility'])?'display:block':'display:none';?>
                 <div class="form XSeo table-wrap" style=" <?php echo $style; ?> ">
                       <div class="form-head">
                               <div class="form-head-lt"><i class="fa fa-star"></i> Seo</div>
                                <?php echo $this->element('admin/table_toolbar');?>
                                <div style="clear:both"></div>
                       </div>
                       <div class="form-art table-responsive">
                       <?php echo $this->Form->hidden('BlogSeo.id'); ?>
                           <div class="form-group">
                             <label class="control-label">Page Title</label>
                             <div class="in-box"><?php
                                    echo $this->Form->input('BlogSeo.page_title',array('class' => 'form-control','Placeholder' => 'Page Title','label'=>false)); ?></div>
                           </div>
                           <div class="row">
                               <div class="col-md-6"><div class="form-group">
                                 <label class="control-label">Keywords</label>
                                 <div class="in-box"> <?php
                                                    echo $this->Form->input('BlogSeo.meta_keywords',array('class' => 'form-control','placeholder' => 'Enter meta keywords','label'=>false)); ?></div>
                               </div></div>
                               <div class="col-md-6"><div class="form-group">
                             <label class="control-label">Descriptions</label>
                             <div class="in-box"><?php
                                                    echo $this->Form->input('BlogSeo.meta_descriptions',array('class' => 'form-control','placeholder' => 'Enter meta descriptions','rows'=>3,'label'=>false)); ?></div>
                           </div></div>
                           </div>
                       </div>
                   </div>
			 </div>
             
             <div class="col-md-4">
                 <div class="form table-wrap">
                       <div class="form-head">
                               <div class="form-head-lt"><i class="fa fa-star"></i> Publish</div>
                                 <?php echo $this->element('admin/table_toolbar');?>
                                <div style="clear:both"></div>
                       </div>
                       <?php
						if(isset($this->request->data['Blog']['status']) && !empty($this->request->data['Blog']['status']))
						{
							if($this->request->data['Blog']['status'] == 1)
								{ $status = 'Published'; }
							elseif($this->request->data['Blog']['status'] == 2)
								{ $status = 'Draft';  }
							elseif($this->request->data['Blog']['status'] == 3)
								{ $status = 'Trash'; }
							elseif($this->request->data['Blog']['status'] == 4)
								{ $status = 'Private'; }
							elseif($this->request->data['Blog']['status'] == 5)
								{ $status = 'Pending'; }
								
						}
						else
							{ $status = 'Published'; }
										
					?>
                    <div class="table-responsive">
                    	<div class="form-art">
                         <div class="col-md-12" style="padding:5px 0px;">
							<i class="fa fa-key"></i> Status: <strong id="ShowStatus"><?php echo $status ?></strong> 
							<?php echo $this->Html->link('Edit','javascript:void(0);',array('id'=>'PublishStatusEdit','div'=>false)); ?>										
                            <div id="PublishStatusSelect">
                            <br />
										<?php
										$trashStatus = array();
										if(($this->action == 'admin_edit') && ($this->request->data['Blog']['status'] == 3))
											$statusArray = array('1'=>'Published','2'=>'Draft','3'=>'Trash','4'=>'Private','5'=>'Pending');	
										else
											$statusArray = array('1'=>'Published','2'=>'Draft','4'=>'Private','5'=>'Pending');	

										
										 echo $this->Form->input('Blog.status',array('type'=>'select','style' => 'float:left','class' =>'bs-select form-control input-small','options'=>$statusArray,'div'=>false,'label'=>false,'id'=>'Status')); 
										 ?>
										 <br><br/>
										 <?php
											
										echo $this->Form->button('OK',array('type'=>'button','id'=>'PublishStatusOk','style' => 'float:left;margin-left:5px;','class' =>'demo-loading-btn btn btn-default','div'=>false));  
																				
																				
	 
										 echo $this->Html->link('Cancel','javascript:void(0);',array('id'=>'PublishStatusCancel','style' => 'line-height:33px; margin-left:5px;','div'=>false)); ?> 		
										</div>
						</div>
                        <?php $visibility = (isset($this->request->data['Blog']['visibility']) && !empty($this->request->data['Blog']['visibility'])) ? $this->request->data['Blog']['visibility'] : 'Public'; ?>
                         <div class="col-md-12" style="padding:5px 0px;">
									 		<?php
										if(isset($this->request->data['Blog']['visibility']) && !empty($this->request->data['Blog']['visibility']))
										{
											if($this->request->data['Blog']['visibility'] == 'Pu')
												{ $visibility = 'Public'; }
											elseif($this->request->data['Blog']['visibility'] == 'PP')
												{ $visibility = 'Password Protected';  }
											elseif($this->request->data['Blog']['visibility'] == 'Pr')
												{ $visibility = 'Private'; }
												
										}
										else
											{ $visibility = 'Public'; }
									?>
																			 	
										<i class="fa fa-eye "></i> Visibility: <strong id="ShowVisibility"><?php echo $visibility ?></strong>
					<?php echo $this->Html->link('Edit','javascript:void(0);',array('id'=>'PublishVisibilityEdit')); ?> 
										
										<div id="PublishVisibilityOption">
												<br>
												<div class="form-group">
											 <div class="radio">
											 
												<label>
													
														
														<?php
														 echo $this->Form->input('Blog.visibility',array('div'=>false,'label'=>false,'type' => 'radio','options' => array('Pu'=>''),'checked','hiddenField'=>false,'class'=>'PublicPasswordRadioButtonClass')); ?>
														
													 Public</label>
                                                    </div>
												
												<div class="radio" id="">
												<label>	
													<?php echo $this->Form->input('Blog.visibility',array('div'=>false,'label'=>false,'type' => 'radio','options' => array('PP'=>''),'hiddenField'=>false,'class'=>'PublicPasswordRadioButtonClass')); ?>

													
												 Password protected</label>
                                                 </div>
												<?php
												$style = (isset($this->request->data['Blog']['visibility']) && !empty($this->request->data['Blog']['visibility']) && ($this->request->data['Blog']['visibility'] == 'PP')) ?  'display:block' : 'display:none';
												?>
												<div style="padding:0px 5px;<?php echo $style; ?>" id="PublicPasswordTextbox">
													 	<div class="form-group">	 
														 
															<?php echo $this->Form->input('Blog.password',array('label'=>array('class' => 'control-label'),'type' => 'password','placeholder' => 'Enter Password','class'=>'form-control')); ?>
														</div>
													 </div>
												
												
												<div class="radio">
												<label>	
													<?php echo $this->Form->input('Blog.visibility',array('div'=>false,'label'=>false,'type' => 'radio','options' => array('Pr'=>''),'hiddenField'=>false,'class'=>'PublicPasswordRadioButtonClass')); ?>
													
												 Private </label>
											</div>
											<?php
											 echo $this->Form->button('OK',array('type'=>'button','id'=>'PublishVisibilityOk','style' => 'float:left;margin-left:5px;','class' =>'demo-loading-btn btn btn default','div'=>false));   
										 echo $this->Html->link('Cancel','javascript:void(0);',array(
										 										'id'=>'PublishVisibilityCancel',
																			'style' => 'line-height:33px; margin-left:5px;',
																			'div'=>false));
										 ?>
											
											
											</div>
									     </div>
										 </div>
							<?php $publish_on = (isset($this->request->data['Blog']['publish_on']) && !empty($this->request->data['Blog']['publish_on'])) ? 'on : '.$this->request->data['Blog']['publish_on'] : 'immediately:'; ?>
                            <div class="col-md-12" style="padding:5px 0px;">
										<i class="fa fa-calendar "></i> 
										Published <strong id="showDateTime"> <?php echo $publish_on ?> </strong> 
										<a href="javascript:void(0);" id="PublishedDateTimeEdit">Edit</a>
                                       </div>  
                                        <div id="PublishDateTime" class="col-md-12">
										<div  class="input-group sandbox-container">
										<?php 
										echo $this->Form->input('Blog.publish_on',array('id'=>'PublishDateTimeTextbox','class'=>'form-control','type'=>'text','div'=>false,'label'=>false,'hiddenField'=>false)) ?>
								
										</div>
										<!-- /input-group -->
										<br />
										<?php
											 echo $this->Form->button('OK',array('type'=>'button','id'=>'PublishPublishedonOk','style' => 'float:left;margin-left:5px;','class' =>'demo-loading-btn btn default','div'=>false));   
										 echo $this->Html->link('Cancel','javascript:void(0);',array('id'=>'PublishPublishedonCancel','style' => 'line-height:33px; margin-left:5px;','div'=>false));
										 ?>
									</div>
					<div class="clearfix"></div>
                            
                            			 </div>
							 			
										
							<div class="form-foot">	
							<?php 
							$button = ($this->action == 'admin_add') ? 'Publish' : 'Update';
							echo $this->Form->button($button,array('class'=>'btn default'));
								
								if(($this->action == 'admin_edit') && ($this->request->data['Blog']['status'] != 3)) 
											{ 
				echo $this->Html->link(__('Move to Trash'), array('action'=>'trash_status',$this->request->data['Blog']['id'],),array('style' => 'line-height:34px;margin-right:0px;float:right;','title'=>'Click to move to trash status'));
											}
							?> 
                            </div>
                            </div>
						 <div class="clearfix"></div>
						</div>
                        <?php $style = ($screenOption['Categories']['visibility'])?'display:block':'display:none'; ?>
                      <div class="form XCategories table-wrap" style=" <?php echo $style;  ?> ">
                           <div class="form-head">
                                   <div class="form-head-lt"><i class="fa fa-star"></i> Categories</div>
                                    <?php echo $this->element('admin/table_toolbar');?>
                                    <div style="clear:both"></div>
                           </div>
                            <div class="form-art table-responsive">	
                            	 <div class="form-group">
                                   <div class="in-box bordered_div appendCategory">
                                      <?php echo $this->Theme->blogCategoryTree(0); ?>
                                   </div>
                              </div>
								  <?php echo $this->Html->link('<i class="fa fa-plus"></i>Add New Category','javascript:void(0)',array('title'=>'Click to add new category','style'=>'line-height:34px','escape'=>false,'class' => 'addNewBlogCategorylink')); ?>
                                 <div class="col-md-12 newCategoryDiv">
                          <?php
                         echo $this->Form->input('',array('div'=>false,'label'=>false,'style'=>'float:left;','class' => 'form-control newCategoryField')); ?>
						<br />
                         <?php 
                              echo $this->Form->button('Add New',array('type'=>'button','label'=>false,'style'=>'float:left;margin-left:5px;','class' => 'demo-loading-btn btn default addNewBlogCategoryBtn'));
                          ?>	
                         
                          
                          
                          						  
                                  </div>
                                  <div style="clear:both"></div>
                           </div>
                       </div>
                       
                       
                       <?php $style = ($screenOption['Tags']['visibility'])?'display:block':'display:none'; ?>
                      <div class="form XTags table-wrap" style=" <?php echo $style;  ?> ">
                           <div class="form-head">
                                   <div class="form-head-lt"><i class="fa fa-star"></i>Tags</div>
                                    <?php echo $this->element('admin/table_toolbar');?>
                                    <div style="clear:both"></div>
                           </div>
                            <div class="form-art table-responsive">	 
                            	<div class="form-group">
                                   <div class="in-box">
                                   <?php echo $this->Form->input('Blog.BlogTag',array('data-role'=>'tagsinput' ,'class' => ' bootstrap-tagsinput','type'=>'text','label'=>false,'div'=>false,'placeholder'=>'type tags here')); ?>
                                   </div>
                              </div>
                           </div>
                       </div>
                       
                       <?php $style = ($screenOption['FeaturedImage']['visibility'])?'display:block':'display:none'; ?>
                      <div class="form XFeaturedImage table-wrap" style=" <?php echo $style ?> ">
                           <div class="form-head">
                                   <div class="form-head-lt"><i class="fa fa-star"></i> Featured Image</div>
                                    <?php echo $this->element('admin/table_toolbar');?>
                                    <div style="clear:both"></div>
                           </div>
                           <div class="form-art table-responsive">
                                    <div class="in-box "> 
                                      <?php
                                    $title = isset($this->data['Blog']['title'])?$this->data['Blog']['title']:'Image';
                                    
                                    $result = (isset($this->data['FeatureImage'][0]['value']) && !empty($this->data['FeatureImage'][0]['value']) && file_exists(Configure::read('Blog.IMAGE_PATH').$this->data['FeatureImage'][0]['value']))?$this->data['FeatureImage'][0]['value']:'noimage.jpg';
                                    
                                    
                                    
                                    $id = (isset($this->data['FeatureImage'][0]['id']) && !empty($this->data['FeatureImage'][0]['id']))?$this->data['FeatureImage'][0]['id']:'';
                                    
                                    echo $this->Html->image('upload/'.$result, array(
                                                                                    'class'=>'avatar',
                                                                                    'alt'=>$title,
                                                                                    'width' =>'100px',
																					'height' =>'100px',
                                                                                    'style'=>'margin-bottom:5px;',
                                                                                    'title' => $title)
                                                                                    ); ?> 
                                   </div>
                                   <?php
                                        echo $this->Form->hidden('BlogMeta.0.id',array('value'=>$id)); 
                                        echo $this->Form->hidden('BlogMeta.0.title',array('value'=>'ximage'));
                                        echo $this->Form->input('BlogMeta.0.value', 
                                                                    array('label' => false,
                                                                            'type' => 'file',
                                                                            'required'=>false,
                                                                            'div'=>false,
                                                               
                                                                            )
                                                                        ); ?>
                           </div> 
                       </div>
                       
                      
                      <?php  
                   		$style = ($screenOption['Video']['visibility'])?'display:block':'display:none';
				   	 ?>
                     <div class="form XVideo table-wrap" style=" <?php echo $style ?> ">
                           <div class="form-head">
                                   <div class="form-head-lt"><i class="fa fa-star"></i> Video</div>
                                    <?php echo $this->element('admin/table_toolbar');?>
                                    <div style="clear:both"></div>
                           </div>
                           <div class="form-art table-responsive">
                                    <div class="in-box "> 
                                     <?php
							 $id = (isset($this->data['Video'][0]['id']) && !empty($this->data['Video'][0]['id']))?$this->data['Video'][0]['id']:'';
							 $value = (isset($this->data['Video'][0]['value']) && !empty($this->data['Video'][0]['value']))?$this->data['Video'][0]['value']:'';
									echo $this->Form->hidden('BlogMeta.1.id',array('value'=>$id)); 
									echo $this->Form->hidden('BlogMeta.1.title',array('value'=>'xvideo'));
									echo $this->Form->input('BlogMeta.1.value', 
																array(
																		'type' => 'text',
																		'required'=>false,
																		'div'=>false,
																		'label'=>false,
																		'value'=>$value,
																		'placeholder'=>'Youtube Video Link',
																		'class'=>'form-control'
																	)
															); 
							?> 
                                   </div>
                                  
                           </div> 
                       </div>
                     
                     
                     
                    
                      
                       
					</div>
                   
                    
				   
        	 </div>
<?php echo $this->Form->end();?>	
</div>