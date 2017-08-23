<?php
/*
Configure Plugin layout
*/
Configure::write('content.use_plugin_layout',true);
/**
 * To configure CakePHP to use a particular domain URL
 * for any URL generation inside the application, set the following
 * configuration variable to the http(s) address to your domain. This
 * will override the automatic detection of full base URL and can be
 * useful when generating links from the CLI (e.g. sending emails)
 */


/* Image Path */

Configure::write('Content.IMAGE_PATH','img/upload/');


/* Default layout for frontend pages */

Configure::write('Content.Frontend_Layout','LayoutName');


/* Screen Options */

Configure::write('Content.ScreenOption',array(
					'PageAttributes' => array('visibility' => false),
					'FeaturedImage'  => array('visibility' => false),
					'Excerpt' 		 => array('visibility' => false),
					'CustomFields'   => array('visibility' => false),
					'Discussion' 	 => array('visibility' => false),
					'Slug' 		  	 => array('visibility' => false),
					'Author' 		 => array('visibility' => false),
					'PageType' 		 => array('visibility' => false),
					'Seo' 		 => array('visibility' => false),
					)
				);
