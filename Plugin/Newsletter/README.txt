Newsletter Plugin for CakePHP 2.0
===========================

Date: 2014-12-22
Website: http://www.iwt.in

This CakePHP plugin is an interface to manage an Menu protected web application.

Installation
-------------

- Download the plugin and put it in your 'app/Plugin' or 'plugins' folder
- Configure the 'admin' route (see http://book.cakephp.org/2.0/en/development/routing.html)
- Configure the plugin according to your web application:

	Some settings have to be read by CakePHP when the plugin is loaded. They can be found
	in the 'Newsletter/Config/bootstrap.php' file.
	
	You have two options to use these settings, as CakePHP doesn't automatically load 
	the bootstrap.php files in plugins:
	
	1.	Copy all the settings in your app/config/bootstrap.php file
	
	or
	
	2.	Load the plugin bootstrap with the plugin
	
	        CakePlugin::load('Newsletter', array('bootstrap' => true));

- Access the Newsletter plugin by navigating to /admin/newsletter


About CakePHP 2.0
-----------------

If you use CakePHP version 2.0, the plugin will work only if you do not use the E_STRICT error reporting level.

You can use E_STRICT error reporting level with CakePHP 2.1 or above.

Change Layout
--------------
1. You can change layout from bootstrap Configure::write('newsletter.use_plugin_layout',false).
2. Replace false by true.

Database Structure(table name and field)
-----------------------------------------
1. Newsletter Categoires: (id,title,description,status,modified,created)

2. Nesletter: (id,newsletter_category_id,title,description,status,modified,created)

3. subscribes: (id,name,email,phone,status,unsubscribe,modified,created)
------------------------------------------------------------------------------------

Uses:
------
1. You can manage categories from this plugin. 
2. You can manage newsletter form this plugin.
3. You can manage subscribers name, email and phone number from this plugin.


 
