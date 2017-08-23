<!-- BEGIN PAGE HEADER-->
<h3 class="page-header"><?php echo __('Edit Group Permission'); ?></h3>
 
	<ul class="breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<?php echo $this->Html->link('Home',array('controller'=>'users','action'=>'dashboard','plugin'=>false));?>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="javascript:void();">Access Manager</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="javascript:void();">Group Permission</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li class="active">
			Edit Group Permission
		</li>
	</ul>
	 
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row" style="margin-bottom:10px;">
	<div class="col-md-12">
		<div class="clearfix right">
		<?php 
			 echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('Add New Action').'</button>', array('controller' => 'aros','action' => 'add_action','plugin' => 'acl', 'admin'=>true), array('escape' => false)); 
			 echo  $this->Html->link('&nbsp;<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('Generate Actions').'</button>', array('controller' => 'aros','action' => 'generate','plugin' => 'acl', 'admin'=>true), array('escape' => false)); 
			 			 echo  $this->Html->link('&nbsp;<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('Group Permissions').'</button>', array('controller' => 'aros','action' => 'group_permissions','plugin' => 'acl', 'admin'=>true), array('escape' => false)); 
			 echo  $this->Html->link('&nbsp;<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('User Permissions').'</button>', array('controller' => 'aros','action' => 'user_permissions','plugin' => 'acl', 'admin'=>true), array('escape' => false)); 
			 ?>
		</div>
	</div>
</div>				
<?php  $totalroles = count($roles); ?>
<div class="row">
	<div class="col-md-12">
		<?php echo $this->Session->flash(); ?>
		<!-- BEGIN SAMPLE TABLE PORTLET-->
		
		<!-- END SAMPLE TABLE PORTLET-->
		
        <div class="margin-top-15"></div>
		
		<!-- BEGIN App Controller TABLE PORTLET-->
		<div class="table-wrap">
      	
			<div class="table-head">
        <h3><?php echo __('App Controller Permissions'); ?></h3>  
        </div>
			<div style="padding:20px 10px 0px 10px;" class="table-responsive">
            
 <div class="row accor">
            <div class="col-md-12">   

<div class="panel-group" id="app_accordion">           
            
<?php
//pr($all_controllers);
$i = 1;
foreach($all_controllers['App'] as $id	=> $controllerName)
{
?>
<div class="panel panel-default">  
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse"  data-parent="#app_accordion" 
              href="#app_collapse_<?php echo $controllerName; ?>" class="controllerEditRow" rel="<?php echo $controllerName; ?>" >
              <?php echo $controllerName. ' Controller'; ?>
            </a>
          </h4>
        </div>  
        
        <div id="app_collapse_<?php echo $controllerName; ?>" class="panel-collapse collapse">
            <div class="panel-body" id="action_<?php echo $controllerName ?>" style="overflow-x: scroll">
            </div>
        </div>
    </div>	   
	<?php				
}
	?>
</div>

			</div>
</div>
            


            </div>
		</div>	

<div class="margin-top-15"></div>
		<!-- BEGIN Plugin Controller TABLE PORTLET-->
		<div class="table-wrap">
      	
			<div class="table-head">
        <h3><?php echo __('Plugins Permissions'); ?></h3>  
        </div>
			<div style="padding:20px 10px 0px 10px;" class="table-responsive">


<div class="row accor">
              		<div class="col-md-12">   
<div class="panel-group" id="plugin_accordion">
<?php

//pr($all_controllers);

foreach($all_controllers['Plugin'] as $pluginName => $controllers)
{
	?>
	<div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" class="accordion-toggle" data-parent="#plugin_accordion" 
                                  href="#plugin_collapse_<?php echo $pluginName; ?>">
                                  <?php echo $pluginName.' Plugin'; ?>
                                </a>
                              </h4>
                            </div>
                        
                        	<div id="plugin_collapse_<?php echo $pluginName; ?>" class="panel-collapse collapse">
      							<div class="panel-body">
                        
                        <?php foreach($controllers as $controllerName) { ?>
                            	<div class="panel panel-default">    
									<div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse"  data-parent="#plugin_collapse_<?php echo $pluginName; ?>" 
                                          href="#plugin_app_collapse_<?php echo $controllerName ?>" class="controllerEditRow" rel="<?php echo $pluginName.'_'.$controllerName ?>">
                                          <?php echo $controllerName .' Controller';?>
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="plugin_app_collapse_<?php echo $controllerName ?>" class="panel-collapse collapse">
                                      <div class="panel-body" id="action_<?php echo $pluginName.'_'.$controllerName ?>">
                            		  </div>
                                     </div>
                                 </div>
                       
					   <?php  } ?>
                        		</div>
                            </div>
                        </div>
	
	<?php 		
			
}
	?>
    
</div></div></div>
				
			</div>
		</div>
		<!-- END SAMPLE TABLE PORTLET-->		
		
	</div>
</div>
