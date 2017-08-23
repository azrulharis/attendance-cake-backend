<?php 
	echo $this->Html->css(array(
							'Newsletter.global/plugins/bootstrap-fileinput/bootstrap-fileinput',
							'Newsletter.global/plugins/font-awesome/css/font-awesome.min',			//bootstrap 3.0.2
							'Newsletter.global/components',			
							'Newsletter.admin/layout',
						)); 
?>
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
<?php echo __('Add Subscriber'); ?> 
</h3>

<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<?php echo $this->Html->link(__('Home'), array('plugin' => false, 'controller' => 'users','action' => 'dashboard')); ?>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<?php echo $this->Html->link(__('Subscriber'), array('action' => 'index')); ?>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<?php echo __('Import'); ?>
		</li>
	</ul>
	<?php //echo $this->element('action_tool_bar');?>
	
</div>
			<!-- END PAGE HEADER-->
			
		
<!--Links-->


<?php echo $this->Session->flash(); ?> 

<div class="row" style="margin-bottom:10px">
	<div class="col-md-12">

<?php
	
echo $this->Html->link('<button type="button" class="btn yellow-crusta"><i class="fa fa-list"></i> '.__('List Subscribers').'</button>', array('controller' => 'subscribes', 'action' => 'index','plugin' =>'newsletter'),array('escape'=> false));
?>

	</div>
</div>	
<!--End Links-->
<!-- BEGIN PAGE CONTENT-->

<div class="row">
	<div class="col-md-12">
		<div class="tabbable tabbable-custom boxless tabbable-reversed">
			
			<div class="">
				
				<div class="" >
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-group"></i><?php echo __('Import CSV'); ?>
							</div>
							<?php echo $this->element('table_tool_bar');?>
						</div>
						<div class="portlet-body form">
						<!-- BEGIN FORM-->
						 <?php echo $this->Form->create('Subscribe',array('type'=>'file','class'=>'horizontal-form'));  ?>
							<div class="form-body">
								<div class="row">
									<div class="col-lg-4">
									<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
													<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=No+File" alt=""/>
												</div>
												<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
												</div>
												<div>
													<span class="btn default btn-file">
													<span class="fileinput-new">
													Select CSV File </span>
													<span class="fileinput-exists">
													Change </span>
													<?php echo $this->Form->input('Subscribe.file',array('type'=>'file','label'=>false,'div'=>false)); ?>
													</span>
													<a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
													Remove </a>
												</div>
											</div>
										
									</div>
									<div class="col-md-4">
										<button class="btn blue start" type="submit">
										<i class="fa fa-upload"></i>
										<span>
										Start upload </span>
										</button>
									</div>
							   </div>
							</div>
							
						<?php echo $this->Form->end(); ?>
						<!-- END FORM-->
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if(!empty($result)){
$style = 'style="display:block;"';
}
else
{
$style = 'style="display:none;"';
}
?>
<div <?php echo $style;?>>
	<div class="portlet box green">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-group"></i> Subscribers
			</div>
			<div class="tools">
				<a href="javascript:;" class="collapse">
				</a>
				
			</div>
		</div>		
									
		<div class="portlet-body flip-scroll">
		
		<table class="table table-bordered table-striped table-condensed flip-content">
			<thead class="flip-content">
				<tr>
					<td><b><?php echo __('S.No.');?></b></td>
					<td><b><?php echo __('Name');?></b></td>
					<td><b><?php echo __('Email');?></b></td>
					<td><b><?php echo __('Phone');?></b></td>
				</tr>
			</thead>
			<tbody>
				<?php
					$currentPage = empty($this->Paginator->params['paging']['Subscribe']['page']) ? 1 : $this->Paginator->params['paging']['Subscribe']['page'];
					$limit = $this->Paginator->params['paging']['Subscribe']['limit'];	
					$startSN = (($currentPage * $limit) + 1) - $limit; 
					foreach ($result['data'] as $subscribe){
				?>
				<tr>
					<td><?php echo $startSN++;?></td>
					<td><?php echo h($subscribe['Subscribe']['name']);?></td>
					<td><?php echo h($subscribe['Subscribe']['email']);?></td>
					<td><?php echo h($subscribe['Subscribe']['phone']);?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>	
	</div>
</div>

<!-- END PAGE CONTENT-->
<?php echo $this->element('table_setting'); ?>
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<?php
	echo $this->Html->script(array(
							'Newsletter.global/plugins/respond.min',
							'Newsletter.global/plugins/excanvas.min'
						));
?>
<![endif]-->
<?php
	echo $this->Html->script(array(
						'Newsletter.global/plugins/bootstrap-fileinput/bootstrap-fileinput',
				));
?>
<!-- END CORE PLUGINS -->
<?php
	echo $this->Html->script(array(
						'Newsletter.global/metronic',
					));
?>
<script>
jQuery(document).ready(function() {    
   //Metronic.init(); // init metronic core componets  
   FormFileUpload.init();
});
</script>