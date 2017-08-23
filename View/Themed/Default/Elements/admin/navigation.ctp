<?php
 $controller = $this->params['controller'];
 $action = $this->action;
 $plugin = $this->params['plugin'];
?>
<!-- BEGIN SIDEBAR -->
				
	<div  class="sidebar-wrapper  sidebar" id="menu">
     <div style="padding:15px;" class="profile-name"> <?php
					 $image = $this->Session->read('Auth.User.image');
					 $firstname = $this->Session->read('Auth.User.firstname');
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
					$mact = "";
					$mspn ='';
					$image   =	'';
					$in ='';
					$class='';
					$BasicControllerarray = array("users","Users");
					$BasicActionArray = array("admin_index","admin_view","admin_edit",'admin_add');
					if(in_array($this->params['controller'],$BasicControllerarray) && in_array($this->action, $BasicActionArray)) { 
					$mact = "start active open";
					$in	=	'in';
					$mspn = '<span class="selected"></span>';
					$image= $this->Html->image("active.png",array('alt' => 'active',"class"=>'activeImage','title'=>''));
					  }else{$mspn = '<span class="arrow"></span>';}
					  $groups = ClassRegistry::init('Group')->groups();
				 ?>
                <a href="#demo2" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">
                    <i class="icon-user"></i>Users <span class="arrow"></span><?php echo $image;?>
                </a>    
                <div class="collapse <?php echo $in; ?>" id="demo2"> 
                	<?php 
					if(in_array($this->params['controller'], array('users')) && in_array($this->action, array('admin_index')) && empty($this->params['pass'])){
						$class = 'active';	
					}
					echo $this->Html->link('<i class="fa-angle-right fa"></i> All Users<span class="arrow"></span>',
                    array(
                        'controller' => 'users',
                        'action' => 'index',
                        'plugin' => false
                    ),
                    array('escape' => false ,'class'=>'list-group-item '.$class)
                    );
					
					?>
					<?php foreach($groups as $key=>$group){ ?>
					
					<?php
					if(!empty($this->params['pass']) && $this->params['pass'][0]==$key){
						$class = 'active';	
					}
					else{$class='';}
                    echo $this->Html->link('<i class="fa-angle-right fa"></i> '.$group.'<span class="arrow"></span>',
                    array(
                        'controller' => 'users',
                        'action' => 'index',$key,
                        'plugin' => false
                    ),
                    array('escape' => false ,'class'=>'list-group-item '.$class)
                    );
					}?>        
                </div>  
                 <?php
				$mact = "";
				$mspn ='';
				$image   =	'';
				$BasicControllerarray = array("groups","Groups");
				$BasicActionArray = array("admin_index","admin_view","admin_edit",'admin_add');
				if(in_array($this->params['controller'],$BasicControllerarray) && in_array($this->action, $BasicActionArray)) { 
				$mact = "start active open";
				$mspn = '<span class="selected"></span>';
				$image= $this->Html->image("active.png",array('alt' => 'active',"class"=>'activeImage','title'=>''));
				  }else{$mspn = '<span class="arrow"></span>';}
				?>
                <?php
                    echo $this->Html->link(
                    '<i class="icon-users"></i> Groups'.$image,
                    array(
                        'controller' => 'groups',
                        'action' => 'index',
                        'plugin' => false
                    ),
                    array('escape' => false,'class'=>'list-group-item list-group-item-success', 
				'data-parent'=>'#MainMenu')
                    );
                    ?>
                    
                     <?php
				$mact = "";
				$mspn ='';
				$image   =	'';
				$BasicControllerarray = array("groups","Groups");
				$BasicActionArray = array("admin_index","admin_view","admin_edit",'admin_add');
				if(in_array($this->params['controller'],$BasicControllerarray) && in_array($this->action, $BasicActionArray)) { 
				$mact = "start active open";
				$mspn = '<span class="selected"></span>';
				$image= $this->Html->image("active.png",array('alt' => 'active',"class"=>'activeImage','title'=>''));
				  }else{$mspn = '<span class="arrow"></span>';}
				?>
                
                
                
               <?php
				$mact = "";
				$mspn ='';
				$image   =	'';
				$in ='';
				$Configuration_controller_array  = array("configurations");
				$Configuration_controller_array_actions = array("admin_index","admin_add","admin_view","admin_edit","admin_prefix"); 
				$prefixvalue = array("Site","Reading","Writing","Comment","Social","CakeRDX");
				if(in_array($controller,$Configuration_controller_array) && in_array($action,$Configuration_controller_array_actions)) { 
				$mact = "start active open";
				$mspn = '<span class="selected"></span>';
				$in ='in';
				$image= $this->Html->image("active.png",array('alt' => 'active',"class"=>'activeImage','title'=>''));
				  }else{$mspn = '<span class="arrow"></span>';}
			?> 
          
           		<a href="#demo17" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">
                    <i class="fa fa-cogs"></i>Settings <?php echo $image ?>
                </a> 
                  <div class="collapse <?php echo $in; ?>" id="demo17"> 
             		 <?php
					 if(!empty($this->params['pass']) && $this->params['pass'][0]=='Site'){
						$site_class = 'active';
					}
					else
					{
						$site_class = '';
					}
                        echo $this->Html->link(
                        '<i class="fa-angle-right fa"></i> Site Setting',
                        array(
                            'controller' => 'configurations',
                            'action' => 'prefix',
                            'Site',
                            'plugin' => 'configuration'
                        ),
                        array('escape' => false,'class'=>'list-group-item '.$site_class)
                        );
                    ?>
                	<?php
					if(!empty($this->params['pass']) && $this->params['pass'][0]=='Reading'){
						$reading_class = 'active';
					}
					else
					{
						$reading_class = '';
					}
                            echo $this->Html->link(
                            '<i class="fa-angle-right fa"></i> Reading Setting',
                            array(
                                'controller' => 'configurations',
                                'action' => 'prefix',
                                'Reading',
                                'plugin' => 'configuration'
                            ),
                            array('escape' => false,'class'=>'list-group-item '.$reading_class)
                            );
                        ?>
               		      <?php
						  
						  if(!empty($this->params['pass']) && $this->params['pass'][0]=='Writing'){
								$writing_class = 'active';
							}
							else
							{
								$writing_class = '';
							}
                            echo $this->Html->link(
                            '<i class="fa-angle-right fa"></i> Writing Setting',
                            array(
                                'controller' => 'configurations',
                                'action' => 'prefix',
                                'Writing',
                                'plugin' => 'configuration'
                            ),
                            array('escape' => false,'class'=>'list-group-item '.$writing_class)
                            );
                            ?>
                            <?php
							if(!empty($this->params['pass']) && $this->params['pass'][0]=='Comment'){
								$comment_class = 'active';
							}
							else
							{
								$comment_class = '';
							}
                            echo $this->Html->link(
                            '<i class="fa-angle-right fa"></i>
                            Comment Setting',
                            array(
                                'controller' => 'configurations',
                                'action' => 'prefix',
                                'Comment',
                                'plugin' => 'configuration'
                            ),
                            array('escape' => false,'class'=>'list-group-item '.$comment_class)
                            );
                            ?>
                            <?php
							if(!empty($this->params['pass']) &&  $this->params['pass'][0]=='Social'){
								$social_class = 'active';
							}
							else
							{
								$social_class = '';
							}
                            echo $this->Html->link(
                            '<i class="fa-angle-right fa"></i>
                            Social Setting',
                            array(
                                'controller' => 'configurations',
                                'action' => 'prefix',
                                'Social',
                                'plugin' => 'configuration'
                            ),
                            array('escape' => false,'class'=>'list-group-item '.$social_class )
                            );
                            ?>
                        <?php
							if(!empty($this->params['pass']) &&  $this->params['pass'][0]=='CakeRDX'){
								$cakerdx_class = 'active';
							}
							else
							{
								$cakerdx_class = '';
							}
                            echo $this->Html->link(
                            '<i class="fa-angle-right fa"></i> CakeRDX Setting',
                            array(
                                'controller' => 'configurations',
                                'action' => 'prefix',
                                'CakeRDX',
                                'plugin' => 'configuration' 
                            ),
                            array('escape' => false,'class'=>'list-group-item '.$cakerdx_class)
                            );
                            ?>
                </div>
       
            <?php
            $mact = "";
			$mspn ='';
			$image = '';
			$BasicControllerarray = array('email_templates','EmailTemplates');
			$BasicActionArray = array('admin_index','admin_view','admin_edit','admin_add');
			if(in_array($this->params['controller'],$BasicControllerarray) && in_array($this->action, $BasicActionArray)) { 
			$mact = "start active open";
			$image= $this->Html->image("active.png",array('alt' => 'active',"class"=>'activeImage','title'=>''));
			$mspn = '<span class="selected"></span>';
			  }else{$mspn = '<span class="arrow"></span>';}
			?>
        
            	
				<?php
                echo $this->Html->link(
                '<i class="fa fa-envelope-o"></i> Email Template'.$image,
                array('controller' => 'email_templates','action'=>'index','plugin'=> 'email_template' ),
                array('escape' => false,'class'=>'list-group-item list-group-item-success', 
				'data-parent'=>'#MainMenu')
                );
                ?>

                <?php
            $mact = "";
			$mspn ='';
			$image = '';
			$in= '';
			$BasicControllerarray = array('newsletters','Newsletter','newsletter_categories','subscribes');
			$BasicActionArray = array('admin_index','admin_view','admin_edit','admin_add','admin_manage','admin_sendnewsletter');
			if(in_array($this->params['controller'],$BasicControllerarray) && in_array($this->action, $BasicActionArray)) { 
			$mact = "start active open";
			$in = 'in';
			$image= $this->Html->image("active.png",array('alt' => 'active',"class"=>'activeImage','title'=>''));
			$mspn = '<span class="selected"></span>';
			  }else{$mspn = '<span class="arrow"></span>';}
			?>
         		<a href="#demo18" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">
                    <i class="fa fa-newspaper-o"></i>Newsletter <?php echo $image ?>
                </a> 
            	<div class="collapse <?php echo $in; ?>" id="demo18"> 
				<?php
				if(in_array($this->params['controller'],array('newsletters','Newsletter','newsletter_categories')) && in_array($this->action, $BasicActionArray))
				{
					$newsletter_class = 'active';	
				}
				else
				{
					$newsletter_class = '';
				}
                echo $this->Html->link(
                '<i class="fa fa-newspaper-o"></i> Newsletter',
                array('controller' => 'newsletters','action'=>'index','plugin'=> 'newsletter' ),
                array('escape' => false,'class'=>'list-group-item '.$newsletter_class, 
				)
                );
                ?>
                <?php
				if(in_array($this->params['controller'],array('subscribes')) && in_array($this->action, $BasicActionArray))
				{
					$subscribe_class = 'active';	
				}
				else
				{
					$subscribe_class = '';
				}
                echo $this->Html->link(
                '<i class="fa fa-group"></i> Subscribers',
                array('controller' => 'subscribes','action'=>'index','plugin'=> 'newsletter' ),
                array('escape' => false,'class'=>'list-group-item '.$subscribe_class , 
				)
                );
                ?>
       			</div>
                
                 <?php
            $mact = "";
			$mspn ='';
			$image = '';
			$BasicControllerarray = array('contents','Contents');
			$BasicActionArray = array('admin_index','admin_view','admin_edit','admin_add');
			if(in_array($this->params['controller'],$BasicControllerarray) && in_array($this->action, $BasicActionArray)) { 
			$mact = "start active open";
			$image= $this->Html->image("active.png",array('alt' => 'active',"class"=>'activeImage','title'=>''));
			$mspn = '<span class="selected"></span>';
			  }else{$mspn = '<span class="arrow"></span>';}
			?>
        
            	
				<?php
                echo $this->Html->link(
                '<i class="fa fa-book"></i> Content'.$image,
                array('controller' => 'contents','action'=>'index','plugin'=> 'content' ),
                array('escape' => false,'class'=>'list-group-item list-group-item-success', 
				'data-parent'=>'#MainMenu')
                );
                ?>
                
                 
   
                      <?php
						$mact = '';
						$mspn ='';
						$image   =	'';
						$in = '';
						 $aro_class  = '';
						 $aco_class = '';
						if($plugin == 'acl') { 
						$mact = "start active open";
						$mspn = '<span class="selected"></span>';
						$in ='in';
						$image= $this->Html->image("active.png",array('alt' => 'active',"class"=>'activeImage','title'=>''));
						  }else{$mspn = '<span class="arrow"></span>';}
						?>
           			<a href="#demo20" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">
                    <i class="fa fa-check-square-o"></i>Access Manager <?php echo $image ?>
                	</a> 
            		<div class="collapse <?php echo $in; ?>" id="demo20"> 
             				  <a href="#SubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">
                                <i class="fa fa-check-square-o"></i>
                                    Permission <i class="fa fa-caret-down"></i>
                              </a> 
                              <?php  
							  if(($controller=='aros' || $controller=='acos') && ($action=='admin_group_permissions' || $action=='admin_edit_group_permissions' || $action=='admin_generate' || $action=='admin_user_permissions')){
							  $aro_class = 'in';
							  } ?>   
							  <div class="collapse <?php echo $aro_class; ?> list-group-submenu" id="SubMenu1">        
								<?php
									if(in_array($this->params['controller'],array('aros')) && in_array($this->action, array('admin_group_permissions')))
									{
										$class = 'active';	
									}
									else
									{
										$class = '';
									}
									echo $this->Html->link(
									'<i class="fa-angle-right fa"></i>
									Group Permission',
									array(
										'controller' => 'aros/',
										'action' => 'group_permissions',
										'plugin' => 'acl'
									),
									array('escape' => false,'class'=>'list-group-item '.$class)
									);
									
									if(in_array($this->params['controller'],array('aros')) && in_array($this->action, array('admin_edit_group_permissions')))
									{
										$class = 'active';	
									}
									else
									{
										$class = '';
									}
									echo $this->Html->link(
									'<i class="fa-angle-right fa"></i>
									Edit Group Permission',
									array(
										'controller' => 'aros/',
										'action' => 'edit_group_permissions',
										'plugin' => 'acl'
									),
									array('escape' => false,'class'=>'list-group-item '.$class)
									);
									if(in_array($this->params['controller'],array('aros')) && in_array($this->action, array('admin_user_permissions')))
									{
										$class = 'active';	
									}
									else
									{
										$class = '';
									}
									echo $this->Html->link(
									'<i class="fa-angle-right fa"></i>
									User Permission',
									array(
										'controller' => 'aros/',
										'action' => 'user_permissions',
										'plugin' => 'acl'
									),
									array('escape' => false,'class'=>'list-group-item '.$class)
									);
									
									if(in_array($this->params['controller'],array('acos')) && in_array($this->action, array('admin_synchronize')))
									{
										$class = 'active';	
									}
									else
									{
										$class = '';
									}
									echo $this->Html->link(
									'<i class="fa-angle-right fa"></i>
									<span class="title">Generate Action</span>',
									array(
										'controller' => 'aros/',
										'action' => 'generate',
										'plugin' => 'acl'
									),
									array('escape' => false,'class'=>'list-group-item '.$class)
									);
									
									
									?>
								</div>
                               
                             </div>
                             
          
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