<h1 class="page-header"><?php echo __('Subscriber Detail'); ?></h1>
<div style="margin-bottom:15px;margin-top:10px;" class="btn-group btn-breadcrumb" id="bc1">
    <?php echo $this->Html->link('<i class="fa fa-home"></i>', array('plugin' => false, 'controller' => 'users','action' => 'dashboard'),array('style'=>'background:#000000;','escape'=>false,'class'=>'btn btn-default')); ?>
     <?php echo $this->Html->link(__('Subscriber'), array('plugin' => 'newsletter', 'controller' => 'subscribes',
	 'action' => 'index'),array('escape'=>false,'class'=>'btn btn-default')); ?>
    <a class="btn btn-default active" href="javascript::void();" style="display: block;"><div>View</div></a> 
    <a class="" href="#"><div></div></a> 
 </div>
<div class="form">
    <!-- BEGIN FORM-->
        <div class="form-art">
			<h3 class="form-section">View Subscriber Info for  - <?php echo h($subscribe['Subscribe']['name']); ?></h3>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3"><?php echo __('Name'); ?>:</label>
							<div class="col-md-9">
								<div class="form-control">
								<?php echo h($subscribe['Subscribe']['name']); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3"><?php echo __('Email'); ?>:</label>
							<div class="col-md-9">
								<div class="form-control">
									 <?php echo h($subscribe['Subscribe']['email']); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3"><?php echo __('Subscribe Status'); ?>:</label>
							<div class="col-md-9">
									<?php	
										if( $subscribe['Subscribe']['unsubscribe'] == 0)
										{ 
												echo $this->Form->button('<i class="fa fa-times"></i>', array('type'=>'button','class' => 'btn purple'),array('escape'=>false,'title'=>'Unsubscribed' ) );  
											
										}
										else
										{
												echo $this->Form->button('<i class="fa fa-check"></i>', array('type'=>'button','class' => 'btn blue'),array('escape'=>false,'title'=>'Subscribed' ) ); 
											
										}
									?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3"><?php echo __('Status'); ?>:</label>
							<div class="col-md-9">
								<?php	
									if( $subscribe['Subscribe']['status'] == 0)
									{ 
											echo $this->Form->button('<i class="fa fa-times"></i>', array('type'=>'button','class' => 'btn purple'),array('escape'=>false,'title'=>'Inactive' ) );  
									}
									else
									{
											echo $this->Form->button('<i class="fa fa-check"></i>', array('type'=>'button','class' => 'btn blue'),array('escape'=>false,'title'=>'Active' ) ); 
									}
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3"><?php echo __('Phone'); ?>:</label>
							<div class="col-md-9">
								<div class="form-control">
									 <?php echo h($subscribe['Subscribe']['phone']); ?>
								</div>
							</div>
						</div>
					</div>                                        	
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3"><?php echo __('Modified'); ?>:</label>
							<div class="col-md-9">
								<div class="form-control">
									<?php echo h(date(Configure::read('Reading.date_time_format'),strtotime($subscribe['Subscribe']['modified']))); ?>														
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3"><?php echo __('Created'); ?>:</label>
							<div class="col-md-9">
								<div class="form-control">
								   <?php echo h(date(Configure::read('Reading.date_time_format'),strtotime($subscribe['Subscribe']['created']))); ?>						
								</div>
							</div>
						</div>
					</div>
				</div>	

			</div>
			
		<!-- END FORM-->
	</div>