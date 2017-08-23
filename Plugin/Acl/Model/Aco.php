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
 */
App::uses('AclAppModel','Aco.Model');
class AclAco extends AppModel {
  
 	public $displayField = 'alias';
	public $name='Aco';

  public $validate =  array(
          'alias' => array(
            'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please fill username.',
			),
          )
      );

}
?>
