<?php
 
 	

	Router::connect('/admin', array('admin' => true, 'controller' => 'users', 'action' => 'dashboard'));

	Router::connect('/users', array('admin' => true, 'controller' => 'users', 'action' => 'dashboard'));
	
	// When user open base path, it will show dashboard, or redirect to login page
	Router::connect('/', array('controller' => 'users', 'action' => 'dashboard'));
	
	
 
	
	
	//Router::connect('', array('admin' => true, 'controller' => 'users', 'action' => 'dashboard'));
	/**
	 * Here, we are connecting '/' (base path) to controller called 'Pages',
	 * its action called 'display', and we pass a param to select the view file
	 * to use (in this case, /app/View/Pages/home.ctp)...
	 */
	
	
	
	Router::mapResources('project_groups');

	Router::mapResources('attendances'); 
	
	Router::mapResources('ot_requests'); 

	Router::mapResources('projects'); 

	Router::mapResources('apis');  

	// Output
	Router::parseExtensions('json'); 
	

/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */ 

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();



/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
