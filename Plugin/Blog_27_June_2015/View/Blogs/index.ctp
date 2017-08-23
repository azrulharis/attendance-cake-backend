<div class="col-md-12 col-sm-12">
            <h1>Blog Page</h1>
            <div class="content-page">
              <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-9 col-sm-9 blog-posts">
                  <?php 
				  	//pr($blogs);
					foreach($blogs as $blog){
					?>
				  <div class="row">
				  	<div class="col-md-4 col-sm-4">
                       <?php 
					 	if(!empty($blog['FeatureImage'][0]['value'])){
							if(file_exists('img/upload/'.$blog['FeatureImage'][0]['value'])){
								$image = $blog['FeatureImage'][0]['value'];
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
					 	echo $this->Html->image('upload/'.$image,array('class'=>'img-responsive'));?>
                    </div>
					<div class="col-md-8 col-sm-8">
                      <h2><?php echo $this->Html->link($blog['Blog']['title'],array('controller'=>'blogs','action'=>'view',$blog['Blog']['slug']));?></h2>
                      <ul class="blog-info">
                        <li><i class="fa fa-calendar"></i> <?php echo h(date(Configure::read('Reading.date_time_format'),strtotime($blog['Blog']['created'])));?></li>
                        <li><i class="fa fa-comments"></i> 17</li>
                        <li><i class="fa fa-tags"></i> 
						<?php 
							foreach($blog['BlogTagTag'] as $tag){
								echo $tag['title'].', ';
							}
						?>
						
						</li>
                      </ul>
                      <?php echo $blog['Blog']['excerpt'];?>
                      <?php echo $this->Html->link('Read more ',array('controller'=>'blogs','action'=>'view',$blog['Blog']['slug'],'plugin'=>'blog'),array('class'=>'more','escape'=>false)); ?>
					  </br></br>
                    </div>
                  </div>
                  <?php } ?>
				  	
                  <hr class="blog-post-sep">
					<ul class="pagination pag10">
						<li><?php echo $this->Paginator->prev('<< ', array('tag'=>'li'), null, array('class' =>'')); 
								  echo $this->Paginator->numbers(array('separator' => '','tag'=>'li')); 
								  echo $this->Paginator->next(' >>', array('tag'=>'li'), null, array('class' => 'next disabled'));?>
						</li>
					</ul>
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