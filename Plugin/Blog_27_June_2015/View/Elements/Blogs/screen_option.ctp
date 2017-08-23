<?php  $screenOption = Configure::read('Blog.ScreenOption') 
?>
<script type="text/javascript">
	var screenOptionArray = '<?php echo json_encode($screenOption) ?>';
</script>

				<div class="page-screen-option-wrapper">
			      <div class="page-quick-sidebar">
					<div class="nav-justified">
					    <div class="form-group show_s">
							<h4 class="block"><?php echo __('Show on screen') ?></h4>
							<div class="checkbox-list">
								


									<?php foreach($screenOption as $key => $value) { ?>
                                        <div class="col-md-2 ">
                                        <label class="checkbox-inline">
                                                <?php echo $this->Form->input('',array('div'=>false,'label'=>false,'type'=>'checkbox','hiddenField' => false,'id'=>'Allow'.$key,'class' => 'allowField Allow'.$key,'rel'=>$key,'checked'=>$value)); ?>
                                            <?php echo $key ?>
                                            </label>
                                        </div>
                                    <?php } ?>

									
									
																		
							</div>
						</div>
					</div>
				</div>
			  </div>
			
              	<div class="page-help-wrapper">
			
				<div class="page-quick-sidebar">
					<div class="nav-justified">
					    
                        <div class="row" style="margin-top:10px;">
                          <div class="col-md-9 r9">						
					    	 <div class="row tabhead">
									<div class="col-md-3 col-sm-3 col-xs-3">
										<ul class="nav nav-tabs tabs-left">
											<li class="active">
												<a href="#tab_6_1" data-toggle="tab">
												 									About Pages								 </a>
											</li>
											<li>
												<a href="#tab_6_2" data-toggle="tab">
												 									Inserting Media								 </a>
											</li>
											<li>
												<a href="#tab_6_3" data-toggle="tab">
												 									Page Attributes								  
												</a> 
											</li>
										</ul>
									</div>
									<div class="col-md-9 col-sm-9 col-xs-9">
										<div class="tab-content">
											<div class="tab-pane active" id="tab_6_1">
												<p>
												

Pages are similar to Posts in that they have a title, body text, and associated metadata, but they are different in that they are not part of the chronological blog stream, kind of like permanent posts. Pages are not categorized or tagged, but can have a hierarchy. You can nest Pages under other Pages by making one the “Parent” of the other, creating a group of Pages.
<br><br>
Creating a Page is very similar to creating a Post, and the screens can be customized in the same way using drag and drop, the Screen Options tab, and expanding/collapsing boxes as you choose. This screen also has the distraction-free writing space, available in both the Visual and Text modes via the Fullscreen buttons. The Page editor mostly works the same as the Post editor, but there are some Page-specific features in the Page Attributes box:

												</p>
											</div>
											<div class="tab-pane fade" id="tab_6_2">
												<p>
											

You can upload and insert media (images, audio, documents, etc.) by clicking the Add Media button. You can select from the images and files already uploaded to the Media Library, or upload new media to add to your page or post. To create an image gallery, select the images to add and click the “Create a new gallery” button.
<br><br>
You can also embed media from many popular websites including Twitter, YouTube, Flickr and others by pasting the media URL on its own line into the content of your post/page. Please refer to the Codex to <a href="#">learn more about embeds.</a>

												</p>
											</div>
											<div class="tab-pane fade" id="tab_6_3">
												<p>
												

<b>Parent</b> - You can arrange your pages in hierarchies. For example, you could have an “About” page that has “Life Story” and “My Dog” pages under it. There are no limits to how many levels you can nest pages.
<br><br>
<b>Template</b> - Some themes have custom templates you can use for certain pages that might have additional features or custom layouts. If so, you’ll see them in this dropdown menu.
<br><br>
<b>Order</b> - Pages are usually ordered alphabetically, but you can choose your own order by entering a number (1 for first, etc.) in this field.

												</p>
											</div>
										</div>
									</div>
								</div>
                          </div>  
                          <div class="col-md-3 r3" style="border-left:1px solid #ddd;min-height:200px;">
						    <h4>For more information:</h4>
							<a href="#" style="padding-top:10px;display:block;">Documentation on Adding New Pages</a>
							<a href="#" style="padding-top:10px;display:block;">Documentation on Editing Pages</a>
							<a href="#" style="padding-top:10px;display:block;">Support Forums</a>
                          </div>						  
					   </div> 						
						
					</div>
				</div>
			 </div>
			  
	           	<!--<div class="dropdown dropdown-help-toggler btnwhite">
					<a href="javascript:;" style=" " class="dropdown-toggle" title="Help">
					Help
					</a>
				</div>-->
            	
				<div class="dropdown dropdown-screen-option-toggler btnwhite ">
					<a href="javascript:;" style=" " class="dropdown-toggle" title="Screen Options" >
					Screen Option
					</a>
				</div>
			