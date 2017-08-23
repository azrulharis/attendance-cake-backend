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
App::uses('ConfigurationAppModel','Configuration.Model');
class Configuration extends ConfigurationAppModel {
  var $name = 'Configuration';

  var $validate =  array(
          'name' => array(
            'NotEmpty' => array(
              'rule'    => 'notEmpty',
              'message' => 'No variable name specified'
            ),
            'Unique' => array(
              'rule' => 'isUnique',
              'message' => 'Name must be unique.'
            )
          )
      );
   
  function load(){
    $settings = $this->find('all');
    
	foreach ($settings as $variable){
	  Configure::write("{$variable['Configuration']['name']}",$variable['Configuration']['value']);
    }
  }
  
  /**
  * Save a configuration
  */
  function saveConfig($key, $value){
  	$result = $this->find('first', array(
  		'conditions' => array('Configuration.name' => $key)
  	));
  	if(!empty($result)){
  		$this->id = $result['Configuration']['id'];
  		return $this->saveField('value', $value);
  	} else {
  		return $this->save(array(
  			'name' => $key,
  			'value' => $value
  		));
  	}
  }
}
?>
