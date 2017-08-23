<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
           <button type="button" id="menuicon" class="navbar-toggle" data-toggle="collapse" data-target="">
             
        
          </button>
        
          	<?php echo $this->Html->link($this->Html->image(Configure::read('Site.logo'),array('alt' => Configure::read('Site.title'),"class"=>"logo-default navbar-brand",'title'=>Configure::read('Site.title'))),array('controller'=>'users','action' => 'dashboard','plugin'=>false),
			array('escape'=>false));?>  
         
        </div>
      
              <div class="top-menu hright">
              <ul class="nav navbar-nav pull-right">
				
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown dropdown-user">
                 <a href="javascript:;"  class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                 	<?php
					$image = $this->Session->read('Auth.User.image');
					 $firstname = $this->Session->read('Auth.User.firstname');
					 if(!empty($image) && file_exists(USER_ICON_IMAGE_PATH.$image))
					 	$result = $this->Session->read('Auth.User.image');
					 else
					 	$result = "Default.jpg";
						echo $this->Html->image('Users/Icon/'.$result, array('alt' => 'Photo','class'=>'img-circle hide1','title'=>$firstname));
					?>
                 	<span  class="username username-hide-on-mobile"><?php echo  $firstname; ?></span> 
                    <i class="fa fa-angle-down"></i></a>
              		<ul class="dropdown-menu">
						<li>
                        	<?php echo  $this->Html->link('<i class="icon-user"></i> My Profile', 
							 array('controller' => 'users', 'action' => 'profile', 'plugin' => false), array('escape' => false)) ?>
                        </li>
						<li>
                        	<?php echo  $this->Html->link('<i class="fa fa-edit"></i> Edit Profile', 
							 array('controller' => 'users', 'action' => 'edit', $this->Session->read('Auth.User.id'), 'plugin' => false), array('escape' => false)) ?>
                        </li>
                        <li class="divider">
						</li>
						<li>
							 <?php echo $this->Html->link('<i class="icon-key"></i> Log Out', array('controller' => 'users','action'=>'logout','plugin'=>false)
							,array('escape' => false));?>
						</li>
					</ul>
                    </li>
               </ul>
              </div>
				
         
      </div>
    </div>
