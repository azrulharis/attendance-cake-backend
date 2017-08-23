<?php
	$controller = $this->params['controller'];
	$action = $this->action;
	$plugin = $this->params['plugin'];
?>
<!-- BEGIN SIDEBAR -->
				
<div  class="sidebar-wrapper  sidebar" id="menu">
    <div style="padding:15px;" class="profile-name"> <?php
		 $image = $this->Session->read('Auth.User.image');
		 $firstname = $this->Session->read('Auth.User.username');
		 $lastname = $this->Session->read('Auth.User.lastname');
		 if(!empty($image) && file_exists(USER_ICON_IMAGE_PATH.$image))
		 {
		 	$result = $this->Session->read('Auth.User.image');
		 }
		 else
		 {
		 	$result = "Default.jpg";
		 }
			
			echo $this->Html->link($this->Html->image('Users/Icon/'.$result,array('alt' => 'logo',"class"=>"adminpic img-circle hide1",'title'=>$firstname)).$firstname." ".$lastname,array('controller'=>'users','action' => 'profile','plugin'=>false),array('escape'=>false));
		?> 
    </div>
<div id="MainMenu"  class="sidebar-nav" style="margin-top:70px;">  
    <div class="list-group">    
        <?php
		$mact	=	'';
		$mspn	=	'';
		$image   =	'';
		if(($action == 'admin_dashboard') && ($controller == 'Users' || $controller == 'users'))
		 { 
			$mact = "start active open";
			$mspn = '<span class="selected"></span>';
			$image= $this->Html->image("active.png",array('alt' => 'active',"class"=>'activeImage','title'=>''));
		  }
		  else{
				$mspn = '<span class="arrow"></span>';
			  }
		?>
    <?php
    echo $this->Html->link(
    '<i class="icon-home"></i> Dashboard'.$image,
    array(
        'controller' => 'users',
        'action' => 'dashboard',
        'plugin' => false
    ),
    array('escape' => false,'class'=>'list-group-item list-group-item-success')
    );
    ?> 

<?php
    echo $this->Html->link(
    '<i class="icon-list"></i> Transaction',
    array(
        'controller' => 'transactions',
        'action' => 'index',
        'plugin' => false
    ),
    array('escape' => false,'class'=>'list-group-item list-group-item-success'));
?> 

<?php
    echo $this->Html->link(
    '<i class="icon-settings"></i> Account Setting',
    array(
        'controller' => 'users',
        'action' => 'edit',
        'plugin' => false
    ),
    array('escape' => false,'class'=>'list-group-item list-group-item-success'));
?> 
         		 

            		 
          
                <?php
                    echo $this->Html->link(
                    '<i class="icon-key"></i> Logout',
                    array(
                        'controller' => 'users',
                        'action' => 'logout',
                        'plugin' => false
                    ),
                    array('escape' => false,'class'=>'logout list-group-item list-group-item-success', 
				'data-parent'=>'#MainMenu')
                    );
                    ?>        
                             
                     <a class="hideanchore list-group-item list-group-item-success">&nbsp;</a>      
         
            </div>
          </div>  
          
          </div>

<!-- END SIDEBAR -->