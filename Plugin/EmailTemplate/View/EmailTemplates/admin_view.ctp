<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<h1 class="page-header"><?php echo __('Email-Template'); ?> </h1>
 <div style="margin-bottom:15px;margin-top:10px;" class="btn-group btn-breadcrumb" id="bc1">
    <?php echo $this->Html->link('<i class="fa fa-home"></i>', array('plugin' => false, 'controller' => 'users','action' => 'dashboard'),array('style'=>'background:#000000;','escape'=>false,'class'=>'btn btn-default')); ?>
     <?php echo $this->Html->link(__('Email Template'), array('plugin' => 'email_template', 'controller' => 'email_templates','action' => 'index'),array('escape'=>false,'class'=>'btn btn-default')); ?>
    <a class="btn btn-default active" href="javascript::void();" style="display: block;"><div>View</div></a> 
    <a class="" href="#"><div></div></a> 
 </div>	
<?php echo $this->Session->flash(); ?> 

<div class="row" style="margin-bottom:10px">
	<div class="col-md-12">
<?php
echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-list"></i> '.__('List Email Template').'</button>', array('controller' => 'email_templates','action'=>'index','label'=>'true','plugin'=>'email_template'),array('escape'=> false)); ?>

<?php  echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-plus"></i>'.__('Add Email Template').'</button>', array('controller' => 'email_templates','action'=>'add','label'=>'true','plugin'=>'email_template'),array('escape'=> false));
?>
	</div>
</div>	
<!--End Links-->			
<!-- BEGIN PAGE CONTENT-->

                            
                            
<div class="form">
        <div class="form-art">
				<h3 class="form-section"> View Email-Template For: <?php echo h($emailTemplate['EmailTemplate']['title']); ?> </h3>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3"><?php echo __('Title'); ?>:</label>
							<div class="col-md-9">
                            		<div class="form-control">
								<?php echo h($emailTemplate['EmailTemplate']['title']); ?>
                                </div>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3"><?php echo __('Placeholders'); ?>:</label>
							<div class="col-md-9">
                            	<div class="form-control">
								<?php echo h($emailTemplate['EmailTemplate']['placeholder']); ?>
                                </div>
							</div>
						</div>
					</div>
				
				</div>
				<!--/row-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3"><?php echo __('Slug'); ?>:</label>
							<div class="col-md-9">
                            		<div class="form-control">
								<?php echo h($emailTemplate['EmailTemplate']['slug']); ?>
                                </div>	
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3"><?php echo __('Description'); ?>:</label>
							<div class="col-md-9">
                            	<div class="form-control">
								<?php echo h($emailTemplate['EmailTemplate']['description']); ?>
                                </div>
                            </div>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3"><?php echo __('Content'); ?>:</label>
							<div class="col-md-9">
                            	<div class="form-control" style="height:130px; overflow:auto;" >
								<?php echo __($emailTemplate['EmailTemplate']['content'],array('config'=>array('entities'=>false,'basicEntities'=>false,'entities_greek'=>false,'entities_latin'=>false,'htmlDecodeOutput'=>false))); ?>
                                </div>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3"><?php echo __('Status'); ?>:</label>
							<div class="col-md-9">
                            	<div class="form-control">
								<?php
									if( $emailTemplate['EmailTemplate']['status'] == 0)
									{ 
										echo $this->Html->image('/img/cross.jpg',array('alt' => 'image','width' => 20));
									}
									else
									{
										echo $this->Html->image('/img/check.jpg',array('alt' => 'image','width' => 20));
								    }
								?>
                                </div>
                            </div>
						</div>
					</div>
					<!--/span-->
				</div>
        </div>
</div>                           