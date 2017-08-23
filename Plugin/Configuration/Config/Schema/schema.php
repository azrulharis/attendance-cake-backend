<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
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
class ConfigurationSchema extends CakeSchema {

	public $renames = array();

	public function __construct($options = array()) {
		parent::__construct();
	}

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}  

	public $configurations = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'key' => 'unique'),
		'value' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'name' => array('column' => 'name', 'unique' => 1))
		);
}