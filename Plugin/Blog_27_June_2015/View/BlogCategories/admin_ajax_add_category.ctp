<?php /*?><?php

echo $this->Html->css(array(
						'Content.global/plugins/uniform/css/uniform.default',
						'Content.global/plugins',
					)); 

echo $this->Html->script(array(
						'Content.global/plugins/jquery-1.11.0.min',
						'Content.global/plugins/uniform/jquery.uniform.min',
						'Content.global/metronic2',
					));

?><?php */?>

<!--<script>
jQuery(document).ready(function(){
	Metronic.init();
});
</script>-->
<?php if(!empty($category)) { ?>
	<li><?php 
		$checkbox = $this->Form->input('BlogCategory.BlogCategory.',array('hiddenField'=>false,'type'=>'checkbox','value'=>$category['BlogCategory']['id'],'label' => false,'hidenField'=>false,'div'=>false,'class'=>'blog_categories'));
		
		echo $result = $checkbox.'&nbsp;'.$category['BlogCategory']['title'];
	 ?></li>
<?php } ?>


