<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 *
 * Company : W3itexperts
 * Author : Rahul Dev Sharma
 * Script Name : CakeReady - Ready Admin With Authentication & ACL Management Plugin
 * Created On : 31 December 2015
 * Script Version : CakeReady v 0.1
 * CakePHP Version : 2.5
 *
 *
 * Website: http://www.w3itexperts.com/
 * Contact: admin@w3itexperts.com
 * Follow: www.twitter.com/w3itexperts
 * Like: www.facebook.com/w3itexperts
 */


/*
Admin Routing - W3itexperts
*/	
	Router::connect('/admin/aros', array('admin'=>true, 'controller' => 'aros', 'action' => 'group_permissions','plugin' => 'acl'));
	Router::connect('/admin/aros/:action', array('admin'=>true, 'controller' => 'aros','action' => 'group_permissions', 'plugin' => 'acl'));
	
	Router::connect('/admin/acl/aros', array('admin'=>true, 'controller' => 'aros', 'action' => 'group_permissions','plugin' => 'acl'));
	Router::connect('/admin/acl/aros/:action', array('admin'=>true, 'controller' => 'aros','action' => 'group_permissions', 'plugin' => 'acl'));
	