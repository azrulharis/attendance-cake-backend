<div class="col-md-12 col-sm-12">
            <h1>Blog Detail</h1>
            <div class="content-page">
              <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-9 col-sm-9 blog-item">
                  <h2><a href="javascript:;"><?php echo $blogDetail['Blog']['title']?></a></h2>
                  <?php echo $blogDetail['Blog']['content']; ?>
				                    	   <?php 
					 	if(!empty($blogDetail['FeatureImage'][0]['value'])){
							if(file_exists('img/upload/'.$blogDetail['FeatureImage'][0]['value'])){
								$image = $blogDetail['FeatureImage'][0]['value'];
							}
							else
							{ 
								$image = 'NoImageAvailable.jpg';
							}
						}
						else
						{
							$image = 'NoImageAvailable.jpg';
						}
					 	echo $this->Html->image('upload/'.$image,array('class'=>'img-responsive',
						'style'=>"height:400px;width:600px"));?>
                        
						<?php 
					 	if(!empty($blogDetail['Video'][0]['value'])){
						?>
                        <iframe width="500px" height="300px" src="<?php echo $blogDetail['Video'][0]['value']?>"></iframe>
                        
                        <?php } ?>
			
                  <ul class="blog-info">
                    <li><i class="fa fa-user"></i> By <?php echo $blogDetail['User']['firstname'].' '.$blogDetail['User']['lastname']?></li>
                    <li><i class="fa fa-calendar"></i> <?php echo h(date(Configure::read('Reading.date_time_format'),strtotime($blogDetail['Blog']['created'])));?></li>
                    <li><i class="fa fa-comments"></i> 17</li>
                    <li><i class="fa fa-tags"></i> <?php 
							foreach($blogDetail['BlogTagTag'] as $tag){
								echo $tag['title'].', ';
							}
						?></li>
                  </ul>

                    
                   <div class="media"> 
                  	<div style="float:left;"><h2>Comments</h2></div>
                    <div class="media-body" style="float:right;margin-top:25px;">
                      <label for="email">Rating</label>
                      <input type="range" value="1" step="0.25" id="backing5">
                      <div class="rateit" data-rateit-backingfld="#backing5" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                      </div>
                    
                    </div>
				</div>
                  <div class="comments">
					
                    <div class="media">                    
                      <a href="#" class="pull-left">
                      <?php echo $this->Html->image('Frontend/people/img4-small.jpg',array('class'=>'media-object'));?>
                      </a>
                      <div class="media-body">
                        <h4 class="media-heading">Media heading <span>5 hours ago / <a href="#">Reply</a></span></h4>
                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                        <!-- Nested media object -->
                        <div class="media">
                          <a href="#" class="pull-left">
							<?php echo $this->Html->image('Frontend/people/img4-small.jpg',array('class'=>'media-object'));?>
                          </a>
                          <div class="media-body">
                            <h4 class="media-heading">Media heading <span>17 hours ago / <a href="#">Reply</a></span></h4>
                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                          </div>
                        </div>
                        <!--end media-->                      
                        <div class="media">
                          <a href="#" class="pull-left">
                          <?php echo $this->Html->image('Frontend/people/img4-small.jpg',array('class'=>'media-object'));?>
                          </a>
                          <div class="media-body">
                            <h4 class="media-heading">Media heading <span>2 days ago / <a href="#">Reply</a></span></h4>
                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                          </div>
                        </div>
                        <!--end media-->
                      </div>
                    </div>
                    <!--end media-->
                    <div class="media">
                      <a href="#" class="pull-left">
                      <?php echo $this->Html->image('Frontend/people/img4-small.jpg',array('class'=>'media-object'));?>
					  </a>
                      <div class="media-body">
                        <h4 class="media-heading">Media heading <span>July 25,2013 / <a href="#">Reply</a></span></h4>
                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                      </div>
                    </div>
                    <!--end media-->
                  </div>

                  <div class="post-comment padding-top-40">
                    <h3>Leave a Comment</h3>
                    <form role="form">
                      <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" rows="5"></textarea>
                      </div>
                      <p><button class="btn btn-primary" type="submit">Post a Comment</button></p>
                    </form>
                  </div>                      
                </div>
                <!-- END LEFT SIDEBAR -->

                  <!-- BEGIN RIGHT SIDEBAR -->            
                <div class="col-md-3 col-sm-3 blog-sidebar">
                  <!-- CATEGORIES START -->
                  <h2 class="no-top-space">Categories</h2>
                  <?php echo $this->element('frontend/blog_category_navigation');?>
                  <!-- CATEGORIES END -->

                  <!-- BEGIN RECENT NEWS -->                            
                  <h2>Recent Post</h2>
                  <div class="recent-news margin-bottom-10">
                  <?php echo $this->XTheme->recentPostNavigation();?>
                  </div>
                  <!-- END RECENT NEWS -->                            

                  <!-- BEGIN BLOG TAGS -->
                  <div class="blog-tags margin-bottom-20">
                    <h2>Tags</h2>
					<?php echo $this->element('frontend/blog_tag_navigation');?>
                    
                  </div>
                  <!-- END BLOG TAGS -->
                </div>
                <!-- END RIGHT SIDEBAR -->              
              </div>
            </div>
          </div>