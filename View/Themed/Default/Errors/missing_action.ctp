<div class="col-md-12 page-404" style="padding-top:100px;">
	<div class="number">
		 404
	</div>
	<div class="details">
		<h3>Oops! You're lost.</h3>
		<p>
			 We can not find the page you're looking for.<br/>
			<?php echo $this->Html->link('Return home ',array('controller'=>'users','action'=>'dashboard','plugin'=>false)); ?>
			or try the search bar below.
		</p>
		<form action="#">
			<div class="input-group input-medium">
				<input type="text" class="form-control" placeholder="keyword...">
				<span class="input-group-btn">
				<button type="submit" class="btn default"><i class="fa fa-search"></i></button>
				</span>
			</div>
			<!-- /input-group -->
		</form>
	</div>
	<?php echo $this->Html->image('erro-404.png',array('class'=>'err')); ?>

</div>