<!-- BEGIN PAGE HEADER-->
<input type="hidden" value="<?php echo $user[$user_model_name][$user_pk_name]; ?>" id="userId">
<h3 class="page-header"><?php echo __('User Permission'); ?></h3>
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
			<a href="javascript:void();">Permission</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			User  Permission
		</li>
	</ul>
	
	<div style="clear:both"></div>
</div>

<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row" style="margin-bottom:10px;">
	<div class="col-md-12">
		<div class="clearfix  right">
			<?php //echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('Permissions').'</button>', array('controller' => 'aros','action' => 'index','plugin' => 'acl', 'admin'=>true), array('escape' => false)); ?>
			<?php //echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('Actions').'</button>', array('controller' => 'acos','action' => 'index','plugin' => 'acl', 'admin'=>true), array('escape' => false)); ?>
			<?php
			echo $this->Html->link('&nbsp;<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('User Permissions').'</button>', array('controller' => 'aros','action' => 'user_permissions','plugin' => 'acl', 'admin'=>true), array('escape' => false)); 
			  echo  $this->Html->link('&nbsp;<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('Generate Actions').'</button>', array('controller' => 'acos','action' => 'synchronize','plugin' => 'acl', 'admin'=>true), array('escape' => false)); 
		    echo  $this->Html->link('&nbsp;<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('Group Permissions').'</button>', array('controller' => 'aros','action' => 'group_permissions','plugin' => 'acl', 'admin'=>true), array('escape' => false)); 
			   echo  $this->Html->link('&nbsp;<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('Edit Group Permissions').'</button>', array('controller' => 'aros','action' => 'edit_group_permissions','plugin' => 'acl', 'admin'=>true), array('escape' => false)); 
			?>
		</div>
	</div>
</div>				

<div class="row" style="margin-bottom:10px;">
	<div class="col-md-12">
		<?php echo $this->Session->flash(); ?>


		<!-- BEGIN SAMPLE TABLE PORTLET-->
		<div class="table-wrap">
      	<div class="table-head">
            <div class="table-head-lt"><i class="fa fa-cogs"></i><?php echo __('User  Permissions'); ?></div>
            <?php echo $this->element('table_toolbar'); ?>
            <div style="clear:both"></div>
        </div>
			<div style="padding:20px 10px 0px 10px;" class="table-responsive">
				<table cellspacing="0" cellpadding="0" border="0" class=" table">
				<thead class="flip-content">
					<tr>
					<?php
					foreach($roles as $role)
					{
						echo '<td>';
			
						echo $role[$role_model_name][$role_display_field];
						if($role[$role_model_name][$role_pk_name] == $user[$user_model_name][$role_fk_name])
						{
							echo $this->Html->image('/acl/img/design/tick.png');
						}
						else
						{
							$title = __d('acl', 'Update the user role');
							echo $this->Html->link($this->Html->image('/acl/img/design/tick_disabled.png'), array('plugin' => 'acl', 'controller' => 'aros', 'action' => 'update_user_role', 'user' => $user[$user_model_name][$user_pk_name], 'role' => $role[$role_model_name][$role_pk_name]), array('title' => $title, 'alt' => $title, 'escape' => false));
						}
			
						echo '</td>';
					}
					?>
				</tr>
				</thead>
				</table>
			</div>
		</div>
		<!-- END SAMPLE TABLE PORTLET-->
		<br>
<!-- BEGIN App Controller TABLE PORTLET-->
		<div class="table-wrap">
      	
			<div class="table-head">
				<div class="table-head-lt"><i class="fa fa-cogs"></i><?php echo __('App Controller Permission'); ?></div>
				<?php echo $this->element('table_toolbar'); ?>
				<div style="clear:both"></div>
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
              href="#app_collapse_<?php echo $controllerName; ?>" class="controllerUserRow" rel="<?php echo $controllerName; ?>" >
              <?php echo $controllerName. ' Controller'; ?>
            </a>
          </h4>
        </div>  
        
        <div id="app_collapse_<?php echo $controllerName; ?>" class="panel-collapse collapse" style="overflow-y: scroll;">
            <div class="panel-body" id="action_<?php echo $controllerName ?>" style="overflow-y: scroll;">
            </div>
        </div>
    </div>
    <?php } ?>
</div>
</div></div></div>
</div>

<div class="margin-top-15"></div>
<!-- BEGIN Plugin Controller TABLE PORTLET-->
<div class="table-wrap">

	<div class="table_head">
		<div class="table-head-lt"><i class="fa fa-cogs"></i><?php echo __('Plugins Permission'); ?></div>
		<?php echo $this->element('table_toolbar'); ?>
		<div style="clear:both"></div>
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
								  href="#plugin_app_collapse_<?php echo $controllerName ?>" class="controllerUserRow" rel="<?php echo $pluginName.'_'.$controllerName ?>">
								  <?php echo $controllerName .' Controller';?>
								</a>
							  </h4>
							</div>
							<div id="plugin_app_collapse_<?php echo $controllerName ?>" class="panel-collapse collapse">
							  <div class="panel-body" id="action_<?php echo $pluginName.'_'.$controllerName ?>" style="overflow-x: scroll">
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
</br>
<!-- END SAMPLE TABLE PORTLET-->
	</div>
</div>

<?php
echo $this->Html->script('/acl/js/jquery');
echo $this->Html->script('/acl/js/acl_plugin');
?>
<?php
echo $this->element('design/footer');
?>

