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
class ConfigurationFixture extends CakeTestFixture {
	var $name = 'Configuration';
	var $table = 'configurations';
	var $fields = array(
	  'id' => array('type' => 'integer', 'key' => 'primary'),
	  'name' => array('type' => 'string', 'length' => 255, 'null' => false), 
	  'value' => array('type' => 'text', 'null' => false)
	);
	//var $import = array('table' => 'configurations', 'import' => true);
	var $records = array(array(
    'id'  => 1,
    'name'  => 'latest_news_limit',
    'value' => '10'
  ));
}
?>