<?php

 
// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));

/**
 * The settings below can be used to set additional paths to models, views and controllers.
 *
 * App::build(array(
 *     'Model'                     => array('/path/to/models/', '/next/path/to/models/'),
 *     'Model/Behavior'            => array('/path/to/behaviors/', '/next/path/to/behaviors/'),
 *     'Model/Datasource'          => array('/path/to/datasources/', '/next/path/to/datasources/'),
 *     'Model/Datasource/Database' => array('/path/to/databases/', '/next/path/to/database/'),
 *     'Model/Datasource/Session'  => array('/path/to/sessions/', '/next/path/to/sessions/'),
 *     'Controller'                => array('/path/to/controllers/', '/next/path/to/controllers/'),
 *     'Controller/Component'      => array('/path/to/components/', '/next/path/to/components/'),
 *     'Controller/Component/Auth' => array('/path/to/auths/', '/next/path/to/auths/'),
 *     'Controller/Component/Acl'  => array('/path/to/acls/', '/next/path/to/acls/'),
 *     'View'                      => array('/path/to/views/', '/next/path/to/views/'),
 *     'View/Helper'               => array('/path/to/helpers/', '/next/path/to/helpers/'),
 *     'Console'                   => array('/path/to/consoles/', '/next/path/to/consoles/'),
 *     'Console/Command'           => array('/path/to/commands/', '/next/path/to/commands/'),
 *     'Console/Command/Task'      => array('/path/to/tasks/', '/next/path/to/tasks/'),
 *     'Lib'                       => array('/path/to/libs/', '/next/path/to/libs/'),
 *     'Locale'                    => array('/path/to/locales/', '/next/path/to/locales/'),
 *     'Vendor'                    => array('/path/to/vendors/', '/next/path/to/vendors/'),
 *     'Plugin'                    => array('/path/to/plugins/', '/next/path/to/plugins/'),
 * ));
 *
 */

/**
 * Custom Inflector rules can be set to correctly pluralize or singularize table, model, controller names or whatever other
 * string is passed to the inflection functions
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 *
 */ 
/**
 * Plugins need to be loaded manually, you can either load them one by one or all of them in a single call
 * Uncomment one of the lines below, as you need. Make sure you read the documentation on CakePlugin to use more
 * advanced ways of loading plugins
 *
 * CakePlugin::loadAll(); // Loads all plugins at once
 * CakePlugin::load('DebugKit'); //Loads a single plugin named DebugKit
 *
 */

/**
 * You can attach event listeners to the request lifecycle as Dispatcher Filter . By default CakePHP bundles two filters:
 *
 * - AssetDispatcher filter will serve your asset files (css, images, js, etc) from your themes and plugins
 * - CacheDispatcher filter will read the Cache.check configure variable and try to serve cached content generated from controllers
 *
 * Feel free to remove or add filters as you see fit for your application. A few examples:
 *
 * Configure::write('Dispatcher.filters', array(
 *      'MyCacheFilter', //  will use MyCacheFilter class from the Routing/Filter package in your app.
 *      'MyPlugin.MyFilter', // will use MyFilter class from the Routing/Filter package in MyPlugin plugin.
 *      array('callable' => $aFunction, 'on' => 'before', 'priority' => 9), // A valid PHP callback type to be called on beforeDispatch
 *      array('callable' => $anotherMethod, 'on' => 'after'), // A valid PHP callback type to be called on afterDispatch
 *
 * ));
 */
Configure::write('Dispatcher.filters', array(
    'AssetDispatcher',
    'CacheDispatcher'
));

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
    'engine' => 'File',
    'types' => array('notice', 'info', 'debug'),
    'file' => 'debug',
));

CakeLog::config('error', array(
    'engine' => 'File',
    'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
    'file' => 'error',
));

CakePlugin::load('Barcode');
CakePlugin::load('CakePHPExcel', 
    array(
        'routes' => true
    )
);

CakePlugin::load('AclExtras');

CakePlugin::load('DebugKit');

CakePlugin::load('Acl', array('bootstrap' => true,'routes'=>true));

CakePlugin::load('Configuration');
CakePlugin::load('EmailTemplate',array('bootstrap' => true));
CakePlugin::load('Blog', array('bootstrap' => true,'routes'=>true));
CakePlugin::load('Newsletter',array('bootstrap' => true,'routes'=>true));
CakePlugin::load('Faq');
CakePlugin::load('Content',array('bootstrap' => true,'routes'=>true));

CakePlugin::load('Upload');

Configure::write('Users.roles', array(
    '1' => 'Administrator',
    '9' => 'Sales',
    '2' => 'Manager', 
    '3' => 'User', 
    '12' => 'HOS',
    '13' => 'HOD',
    '6' => 'Visitor'  
));

Configure::write('Users.defaultRole', '1');

Configure::write('Users.menus',
    array(
        '1' => array(
            'Dashboard' => array('url' => 'users/dashboard', 'ico' => 'home'), 
            'Reports' => array('url' => 'reports', 'ico' => 'line-chart', 'has_sub' => array(
                'Projects' => 'reports/progress',  
                'Resources' => 'reports/sales',
                'Attendance' => 'reports/material_transfer',
                //'Warehouse Report' => 'reports/warehouse',
                'User Activity' => 'reports/index',
            )),   
            'Attendance' => array('url' => 'resources', 'ico' => 'calendar', 'has_sub' => array(
                'Worker Attendance' => 'attendance_workers',
                'Machine Attendance' => 'attendance_machines',
                'Group Attendance' => 'attendances', 
                'OT Requests' => 'ot_requests',
                'Report' => 'attendances/report', 
            )), 
            'Projects' => array('url' => 'projects', 'ico' => 'building-o', 'has_sub' => array(
                'Projects' => 'projects',
                'Add Project' => 'projects/add',
                'Project Group' => 'project_groups',
                'Assign Machine' => 'project_machines/add',
            )), 
            'Resources' => array('url' => 'resources', 'ico' => 'cogs', 'has_sub' => array(
                'Workers' => 'workers',
                'Machinery' => 'machines/index',
                'Worker Requests' => 'project_worker_requests/index',
                'Machinery Requests' => 'project_machine_requests/index/2', 
                'Machine Category' => 'machine_categories/index', 
            )), 
            'Users' => array('url' => 'users', 'ico' => 'users', 'has_sub' => array(
                'Manage Groups' => 'admin/groups', 
                'Manage Users' => 'admin/users' 
            )), 
            'Companies' => array('url' => 'users', 'ico' => 'users', 'has_sub' => array(
                'Company' => 'companies', 
                'Add Company' => 'companies/add' 
            )),
            'Settings' => array('url' => 'admin/settings', 'ico' => 'gears', 'has_sub' => array( 
                
                'Site Setting' => 'admin/configuration/configurations/prefix/Site', 
                 
                )),
            //'Email' => array('url' => 'admin/email_template/email_templates', 'ico' => 'envelope-o'),
            //'Content' => array('url' => 'admin/contents', 'ico' => 'book'),
             
            'Permissions' => array('url' => 'admin/acl/aros/group_permissions', 'ico' => 'lock', 'has_sub' => array(
                'Group Permissions' => 'admin/acl/aros/group_permissions',
                'Edit Group Permission' => 'admin/acl/aros/edit_group_permissions',
                'User Permissions' => 'admin/acl/aros/user_permissions' 
                ))  
        )
    )
);


require_once('constant.php');
 