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
				
				<li class="dropdown dropdown-user">
                 <a href="#"  class="dropdown-toggle" data-toggle="dropdown">
                 	<i class="fa fa-globe"></i>
                 	<span  class="username username-hide-on-mobile label label-danger"><?php echo $notification_counter != 0 ? $notification_counter : ''; ?></span> 
                    <i class="fa fa-angle-down"></i></a>
              		<ul class="dropdown-menu dropdown-menu-right">
              		<?php foreach($notifications as $notification) { ?>
						<li>
                        	<?php echo $this->Html->link(substr($notification['Notification']['body'], 0, 40).'...', 
							 array('controller' => 'notifications', 'action' => 'view', $notification['Notification']['id'], 'plugin' => false), array('escape' => false)) ?>
                        </li> 
              		<?php } ?> 
              			<li>
                        	<?php echo  $this->Html->link('View All Notification', 
							 array('controller' => 'notifications', 'action' => 'index', 'plugin' => false), array('escape' => false)) ?>
                        </li>
					</ul>
                </li> 
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown dropdown-user">
                 <a href="#"  class="dropdown-toggle" data-toggle="dropdown">
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
              		<ul class="dropdown-menu dropdown-menu-right">
						<li>
                        	<?php echo  $this->Html->link('<i class="icon-user"></i> My Profile', 
							 array('controller' => 'users', 'action' => 'profile', 'plugin' => false), array('escape' => false)) ?>
                        </li>
						<li>
                        	<?php 
$user_id = ($this->Session->read('Auth.User.id') == 1) ? $this->Session->read('Auth.User.id') : '';
                          echo $this->Html->link('<i class="fa fa-edit"></i> Edit Profile', 
							 array('controller' => 'users', 'action' => 'edit', $user_id, 'plugin' => false), array('escape' => false)) ?>
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
