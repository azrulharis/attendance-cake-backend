
<?php 

echo $this->Form->create('Payment', array('type'=>'file')); 

?>
<div class="form-art">

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">Username</label>
<?php  echo $this->Form->input("username", array("value" => $user['User']['username'], "class"=> "form-control", "placeholder" => "username","label"=> false,'div'=>array('class' => 'form-group'))); ?>			
</div>
    </div> 
</div>   

<div class="row">
	<div class="col-md-12">
		<?php  echo $this->Form->input("mobile_number", array("value" => $user['User']['mobile_number'], "class"=> "form-control", "placeholder" => "Mobile Number","label"=> array('class'=>'control-label'), 'div' => array('class' => 'form-group'))); ?>
	</div>
	<!--/span-->
	<div class="col-md-12">
			<?php  echo $this->Form->input("email", array("value" => $user['User']['email'], "class"=> "form-control", "placeholder" => "Email Address","label"=> array('class'=>'control-label'), 'div' => array('class' => 'form-group'))); ?>
	</div>
	<!--/span-->
</div>
			
<div class="row" id="paymentMethod">
	<div class="col-xs-12"><label>Payment Method</label></div>
	<div class="form-group col-xs-6">
		<label><input type="radio" class="radio" name="method" value="1"required> Online Transfer</label>
	</div>
	<!--/span-->
	<div class="form-group col-xs-6">
		<label><input type="radio" class="radio" name="method" value="2"required> Cash Deposit</label>
	</div>
	<!--/span-->

	<div class="form-group col-xs-12">
    	<div id="cdmNote"></div>
    </div>

</div>

            
			<div class="row">
				<div class="col-md-12">
                	<div class="form-group date">  
                        <?php echo $this->Form->input('payment_date', array("required" => true, "type" => "text", "class"=> "form-control", "placeholder" => "Payment Date", "label"=> array('class'=>'control-label'), 'div' => array('class' => 'form-group'))); ?> 
                     </div>
                </div>
				<!--/span-->

				<div class="col-md-12"> 
				    <?php echo $this->Form->input("payment_time", array("class"=> "form-control", "placeholder" => "Payment Time", "label"=> array('class' => 'control-label'), 'div' => array('class' => 'form-group'))); ?>
				</div>

				<div class="col-md-12"> 
					<label class="control-label">Transaction Number (Optional)</label>
				    <?php echo $this->Form->input("transaction_number", array("class"=> "form-control", "placeholder" => "Transaction Number", "label"=> false, 'div' => array('class' => 'form-group'))); ?>
				</div>


				<div class="col-md-12"> 
					<label class="control-label">Remark (Optional)</label>
				    <?php echo $this->Form->input("remark", array("class"=> "form-control", "placeholder" => "Remark", "label"=> false, 'div' => array('class' => 'form-group'))); ?>
				</div>

				<div class="col-md-12"> 
				<label class="control-label">Payment Slip (Image / PDF) <span id="optionImage"></span></label>
				    <?php echo $this->Form->input('image', array('id' => 'PaymentImage', 'label' => false,'type' => 'file','class'=>'btn default','required'=>false,'div'=>false)); ?>

				    <?php echo $this->Form->input('file_dir', array('type' => 'hidden')); ?>
				</div>
				<!--/span-->
			</div>
			<!--/row-->
			<div class="row" style="display: none;">
				<div class="col-md-12"> 
						<?php echo $this->Form->input("status", array('type'=> 'text', 'value' => 0)); ?>	 
				</div>
				
				<div class="col-md-12"> 
					<?php  echo $this->Form->input("payment_type", array('type'=> 'text', 'value' => 1)); ?>	
					<?php  echo $this->Form->input("created", array('type'=> 'text', 'value' => date('Y-m-d H:i:s'))); ?>	 
				</div>
			</div>  
			  
			
        </div>
<div class="form-foot">
	<?php echo $this->Form->button('Submit',array('class'=>'btn btn-success')); ?>
</div>
<?php echo $this->Form->end(); ?>

<?php $this->start('script'); ?>
<?php
  echo $this->Html->script(array(
    '/theme/CakeReady/js/datepicker/dist/js/bootstrap-datepicker.min' 
  ));
?>
  <script type="text/javascript"> 
    $(function () { 
        $('.date input').datepicker({
          format: "yyyy-mm-dd",
          todayBtn: "linked",
          todayHighlight: true
        });

        $('#paymentMethod input[name=\'method\']').on('click', function() {
        	
        	var method = $("input[name=\'method\']:checked").val();
        	console.log(method);
        	if(method == 1) {
        		$('#PaymentImage').attr('required',true); 
        		$("#cdmNote").html('');
        	} else {
        		$('#PaymentImage').attr('required',false);
        		// show whatsapp
        		$('#cdmNote').html('<div class="alert alert-warning">Alert! For cash deposit payment. Please Whatsapp your payment slip to <b>018 2790 123</b> for verification purpose.</div>');
        	}
        	
        })
    });   
  </script>
<?php $this->end(); ?>
               

                