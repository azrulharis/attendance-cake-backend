<?php echo $this->Html->link('Project Group', array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false)); ?> 
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Add Project Group'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>
<div class="projectGroups form">
<?php echo $this->Form->create('ProjectGroup', array('class' => 'form-horizontal form-label-left', 'id' => 'form')); ?>
 
			<div class="form-group">
	    		<label class="col-sm-3">Group Name</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
			<div class="form-group">
	    		<label class="col-sm-3">Project</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('project_id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
		    <div class="form-group">
	    		<label class="col-sm-3">Company</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('company_id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div> 
		    <div class="form-group">
	    		<label class="col-sm-3">Note</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('note', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">Start</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('start', array('id' => 'dateonly', 'type' => 'text', 'class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">End</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('end', array('id' => 'dateonly_2', 'type' => 'text', 'class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
			 
			<div class="form-group">
	    		<label class="col-sm-3">Type</label>
	    		<div class="col-sm-9">
					<?php 
					$type = array('Active', 'Free Group');
					echo $this->Form->input('type', array('options' => $type, 'class' => 'form-control', 'label' => false)); ?>				
				</div>
			</div>
			
			<table class="table table-bordered" id="output">
				<tr>
				<th>Worker</th>
				<th>Worker ID</th>
				<th width="64px"></th>
				</tr>
				<tr id="removeRow-0">
				<td><input type="text" placeholder="Supervisor Name" class="form-control findWorker" id="findWorker-0" name="worker[]"required>
				<input type="hidden" class="form-control" id="user_id-0" name="user_id[]">
				</td>
				<td><input type="text" class="form-control" id="code-0" name="code[]"readonly></td>
				<td> </td>
				</tr>
			</table>
			
			<div class="form-group">  
				<button id="addMore" class="btn btn-default btn-xs"><i class="fa fa-plus"></i> Add Worker</button>	 
			</div>

			<div class="form-group">  
					<?php echo $this->Form->button('Save', array('class' => 'btn btn-success')); ?>		 
			</div>

<?php echo $this->Form->end(); ?>
</div>
 
</div>
</div>
</div>
</div>

<?php $this->start('script'); ?>
<script type="text/javascript">

function findWorker(row, val) {
	$("#findWorker-" + row).autocomplete({
	    source: function (request, response) {
	        $.ajax({
	            type: "GET",                        
	            url: baseUrl + 'users/ajaxfinduser',           
	            contentType: "application/json",
	            dataType: "json",
	            data: "term=" + $('#findWorker-'+row).val(),                                                    
	            success: function (data) {
	            	console.log(data); 
		            response($.map(data, function (item) {
		                return {
		                    id: item.id,
		                    value: item.name,
		                    username: item.username 
		                }
		            }));
	        	}
	        });
	    },
	    select: function (event, ui) {
	    	if(ui.item.id == 0) {
	    		alert('Invalid worker!');
	    		return false;
	    	}
	        $("#user_id-" + row).val(ui.item.id);//Put Id in a hidden field
	        $("#code-"+row).val(ui.item.username); 
	    },
	    minLength: 3 
	}).autocomplete( "instance" )._renderItem = function( ul, item ) {
      	return $( "<li>" ).append( "<div>" + item.value + "<br>" + item.username + "<br>" +  "</div>" ).appendTo( ul );
    }; 
}

function remove(row) {
	$('#removeRow-' + row).remove(); 
} 
 
$(document).ready(function() { 
	 
    var row = 1;
    $('#addMore').on('click', function() {   
		var html = '<tr id="removeRow-'+row+'">';  
		html +='<td><input placeholder="Worker Name" type="text" class="form-control findWorker" id="findWorker-'+row+'" name="worker[]"required><input type="hidden" class="form-control" id="user_id-'+row+'" name="user_id[]"></td>';
		html +='<td><input type="text" class="form-control" id="code-'+row+'" name="code[]"readonly></td>';
		html +='<td><a href="#" class="btn btn-danger remove" onclick="remove('+row+'); return false" id="'+row+'"><i class="fa fa-times"></i></a></td>'; 
        html += '</tr>'; 
        $("#output").append(html); 
        findWorker(row, $(this).val());     
        row++;  
        return false;
    });  
  	
  	$('.findWorker').each(function() {
  		var attrId = $(this).attr('id');
  		attrId = attrId.split('-');
  		attrId = attrId[1];
  		$(this).on('keyup', function() {
  			findWorker(attrId, $(this).val());
  		})
  	}); 
 

});  
</script>
<?php $this->end(); ?>