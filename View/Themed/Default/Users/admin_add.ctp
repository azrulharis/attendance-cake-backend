<div class="row"> 
    <div class="col-xs-12"> 
        <div class="x_panel tile">
            <div class="x_title">
                <h2>Add New User</h2> 
            <div class="clearfix"></div>
        </div>
        <div class="x_content">  
        <?php echo $this->Session->flash(); ?>
        <div class="row">
        	<div class="col-md-12" >
            
        		<?php echo $this->element('Users/public_form');?>
        	</div>
        </div>  
        </div>
        </div>
    </div>
</div>
