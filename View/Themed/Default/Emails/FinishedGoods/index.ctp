<div class="row"> 
  	<div class="col-xs-12">
        <div class="x_panel tile">
      		<div class="x_title">
        		<h2><?php echo __('Finished Goods'); ?></h2>
        	<div class="clearfix"></div>
      	</div>
      	<div class="x_content"> 
        	<?php echo $this->Session->flash(); ?>
        	<!-- content start-->					
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-hover table-bordered">
				<thead>
				<tr>
						<th class="text-center"><?php echo $this->Paginator->sort('#'); ?></th>
						<th><?php echo $this->Paginator->sort('serial_no'); ?></th>
                        <th><?php echo $this->Paginator->sort('production_order_name', 'Production Order #'); ?></th>
                        <th><?php echo $this->Paginator->sort('bom_name', 'BOM'); ?></th>
                        <th><?php echo $this->Paginator->sort('bom_code', 'BOM Code'); ?></th>
                        <th><?php echo $this->Paginator->sort('status'); ?></th>
						<th><?php echo $this->Paginator->sort('created'); ?></th>
				</tr>
				</thead>
				<tbody>
				<?php
					$currentPage = empty($this->Paginator->params['paging']['FinishedGood']['page']) ? 1 : $this->Paginator->params['paging']['FinishedGood']['page']; $limit = $this->Paginator->params['paging']['FinishedGood']['limit'];
					$startSN = (($currentPage * $limit) + 1) - $limit;

					foreach ($finishedGoods as $finishedGood): ?>
				<tr>
					<td class="text-center"><?php echo $startSN++; ?></td>
                    <td>
					<a style="text-decoration: none !important;border-bottom: dashed 1px #0088cc !important;" href="#" id="serial_no<?php echo $finishedGood['FinishedGood']['id']; ?>" class="editable" data-type="text" data-pk="<?php echo $finishedGood['FinishedGood']['id']; ?>" data-name="#serial_no<?php echo $finishedGood['FinishedGood']['id']; ?>" data-emptytext="Enter Serial" data-url="<?php echo BASE_URL.'finishedgoods/updateSerial'; ?>" data-placement="right" title="Enter Serial #"><?php echo $finishedGood['FinishedGood']['serial_no']; ?></a>
					</td>
					<td>
						<?php echo $this->Html->link($finishedGood['FinishedGood']['production_order_name'], array('controller' => 'productionorders', 'action' => 'view', $finishedGood['FinishedGood']['production_order_id'])); ?>
					</td>
                    <td>
						<?php echo $this->Html->link($finishedGood['FinishedGood']['bom_name'], array('controller' => 'boms', 'action' => 'view', $finishedGood['FinishedGood']['bom_id'])); ?>
					</td>
                    <td><?php echo h($finishedGood['FinishedGood']['bom_code']); ?>&nbsp;</td>
                    <td>
                    <a style="text-decoration: none !important;border-bottom: dashed 1px #0088cc !important;" href="#" id="status_<?php echo $finishedGood['FinishedGood']['id']; ?>" class="editable" data-type="select" data-pk="<?php echo $finishedGood['FinishedGood']['id']; ?>" data-name="#status_<?php echo $finishedGood['FinishedGood']['id']; ?>" data-emptytext="Select Status" data-url="<?php echo BASE_URL.'finishedgoods/setStatus'; ?>" data-placement="left" title="Select Status" data-value="<?php echo $finishedGood['FinishedGood']['status']; ?>" data-source="<?php echo BASE_URL.'finishedgoods/getStatus'; ?>"></a>
                    </td>
					<td><?php echo h($finishedGood['FinishedGood']['created']); ?>&nbsp;</td>
				</tr>
			<?php endforeach; ?>
				</tbody>
				</table>
				<p>
				<?php
					//echo $this->Paginator->counter(array(
					//	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					//));
				?>	</p>
				<div class="paging">
				<?php
					echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled btn btn-default btn-sm'));
					echo $this->Paginator->numbers(array('separator' => ''), array('class' => 'btn btn-default btn-sm'));
					echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled btn btn-default btn-sm'));
				?>
				</div>
			</div>
        	<!-- content end -->
      	</div>
    </div>
    </div>
</div>
<?php $this->start('script'); ?>
<script type="text/javascript">
$(document).ready(function() {
	$('.editable').editable();
});
</script>
<?php $this->end(); ?>