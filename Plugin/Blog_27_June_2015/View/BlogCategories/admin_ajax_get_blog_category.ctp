<?php

echo $this->Html->css(array(
						'Blog.global/plugins/uniform/css/uniform.default',
						'Blog.global/plugins',
					)); 

echo $this->Html->script(array(
						'Blog.global/plugins/jquery-1.11.0.min',
						'Blog.global/plugins/uniform/jquery.uniform.min',
						'Blog.global/metronic2',
					));

?>

<script>
jQuery(document).ready(function(){
	Metronic.init();
});
</script>
<?php

if(!empty($blogCategories))
{
	foreach($blogCategories as $blogCategory)
	{
	?>
	<label>
	<?php 
		$checkbox = $this->Form->input('Menu.'.$blogCategory['BlogCategory']['id'],array('class'=>'BlogCheckboxViewAll','type'=>'checkbox','value'=>$blogCategory['BlogCategory']['id'],'label' => false,'hidenField'=>false,'div'=>false));
		
		echo $result = $checkbox.' '.$blogCategory['BlogCategory']['title'];
	 ?>
	</label><br>
	<?php
	}
}
?>


