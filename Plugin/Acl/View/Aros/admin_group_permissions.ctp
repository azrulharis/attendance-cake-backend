<!-- BEGIN PAGE HEADER-->
<h3 class="page-header"><?php echo __('Group Permission'); ?></h3>
<div class="bram">
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
		</li>
	</ul>
	
	<div style="clear:both"></div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row" style="margin-bottom:10px;">
	<div class="col-md-12">
		<div class="clearfix  right">
		<?php 
			  echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-group"></i> '.__('Edit Group Permissions').'</button>', array('controller' => 'aros','action' => 'edit_group_permissions','plugin' => 'acl', 'admin'=>true), array('escape' => false));  
			
			 echo  $this->Html->link('&nbsp;<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('Generate Actions').'</button>', array('controller' => 'aros','action' => 'generate','plugin' => 'acl', 'admin'=>true), array('escape' => false)); 
			 echo  $this->Html->link('&nbsp;<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('User Permissions').'</button>', array('controller' => 'aros','action' => 'user_permissions','plugin' => 'acl', 'admin'=>true), array('escape' => false)); 
             ?>
		</div>
	</div>
</div>				

<div class="row">
	<div class="col-md-12">
		<?php echo $this->Session->flash(); ?>
		<!-- BEGIN SAMPLE TABLE PORTLET-->
		<div class="table-wrap">
      	<div class="table-head">
        <h3><?php echo __('Group Master Permissions'); ?></h3>  
        </div>
			<div style="padding:20px 10px 0px 10px;" class="table-responsive">
				<table cellspacing="0" cellpadding="0" border="0" class=" table">
				<thead class="flip-content">
					<tr>
						<th></th>
						<th style="text-align:center"><?php echo __d('acl', 'Allow All Access'); ?></th>
						<th style="text-align:center"><?php echo __d('acl', 'Deny All Access'); ?></th>
					</tr>
				</thead>
				<tbody>
      
     
<?php
$i = 0;
$totalroles = count($roles);

foreach($roles as $role)
{
    $color = ($i % 2 == 0) ? 'color1' : 'color2';
    echo '<tr class="' . $color . '">';
    echo '  <td>' . $role[$role_model_name][$role_display_field] . '</td>';
    echo '  <td style="text-align:center">' . $this->Html->link($this->Html->image('/acl/img/design/tick.png'), '/admin/acl/aros/grant_all_controllers/' . $role[$role_model_name][$role_pk_name], array('escape' => false, 'confirm' => sprintf(__d('acl', "Are you sure you want to grant access to all actions of each controller to the role '%s' ?"), $role[$role_model_name][$role_display_field]))) . '</td>';
    echo '  <td style="text-align:center">' . $this->Html->link($this->Html->image('/acl/img/design/cross.png'), '/admin/acl/aros/deny_all_controllers/' . $role[$role_model_name][$role_pk_name], array('escape' => false, 'confirm' => sprintf(__d('acl', "Are you sure you want to deny access to all actions of each controller to the role '%s' ?"), $role[$role_model_name][$role_display_field]))) . '</td>';
    echo '<tr>';
    
    $i++;
}
?>
				</tbody>
				</table>
			</div>
		</div>
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
    foreach($all_controllers['App'] as $controllerName) { ?>
    <div class="panel panel-default">  
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse"  data-parent="#app_accordion" 
              href="#app_collapse_<?php echo $controllerName; ?>" class="controllerRow" rel="<?php echo $controllerName; ?>" >
              <?php echo $controllerName. ' Controller'; ?>
            </a>
          </h4>
        </div>  
        
        <div id="app_collapse_<?php echo $controllerName; ?>" class="panel-collapse collapse">
            <div class="panel-body" id="action_<?php echo $controllerName ?>" style="overflow-x: scroll">
            </div>
        </div>
    </div>
    <?php } ?>
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
			<div style="padding:20px 10px 0px 10px;"  class="table-responsive">
				<div class="row accor">
              		<div class="col-md-12">   
<div class="panel-group" id="plugin_accordion">
					<?php
                    
                    //pr($all_controllers);
                    foreach($all_controllers['Plugin'] as $pluginName => $controllers){ ?>
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
                                          href="#plugin_app_collapse_<?php echo $controllerName ?>" class="controllerRow" rel="<?php echo $pluginName.'_'.$controllerName ?>">
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
						</div>
                    </div>
                  </div>
			</div>
		</div>
		<!-- END SAMPLE TABLE PORTLET-->		
		
	</div>
</div>



