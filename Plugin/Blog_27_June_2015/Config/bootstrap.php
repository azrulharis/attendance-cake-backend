<?php
/*
Configure Plugin layout
*/
Configure::write('blog.use_plugin_layout',false);
/**
 * To configure CakePHP to use a particular domain URL
 * for any URL generation inside the application, set the following
 * configuration variable to the http(s) address to your domain. This
 * will override the automatic detection of full base URL and can be
 * useful when generating links from the CLI (e.g. sending emails)
 */
$project_folder_path = str_replace( $_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/',dirname(dirname(dirname(dirname(dirname(__FILE__)))))));
$base_path = 'http://'.$_SERVER['HTTP_HOST'].$project_folder_path.'/';
Configure::write('Blog.BASE_URL', $base_path);

Configure::write('Blog.ROOT_PATH',$_SERVER['DOCUMENT_ROOT'].$project_folder_path.'/');

/* Webroot Path */

Configure::write('Blog.WEB_ROOT',Configure::read('Blog.ROOT_PATH').'app/webroot/');

/* Image Path */

Configure::write('Blog.IMAGE_PATH','img/upload/');


/* Default layout for frontend pages */

Configure::write('Blog.Frontend_Layout','LayoutName');


/* Screen Options */

Configure::write('Blog.ScreenOption',array(
					'Categories' 	 => array('visibility' => false),
					'FeaturedImage'  => array('visibility' => false),
					'Video'  		  => array('visibility' => false),
					'Excerpt' 		=> array('visibility' => false),
					'CustomFields'   => array('visibility' => false),
					'Discussion' 	 => array('visibility' => false),
					'Slug' 		   => array('visibility' => false),
					'Author' 		 => array('visibility' => false),
					'Seo' 		 	=> array('visibility' => false),
					'Tags' 		   => array('visibility' => false),
					)
				);

//echo Configure::read('Blog.IMAGE_PATH');