<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
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

App::uses('DebugPanel', 'DebugKit.Lib');

/**
 * Provides debug information on the Session contents.
 *
 */
class SessionPanel extends DebugPanel {

/**
 * beforeRender callback
 *
 * @param \Controller|object $controller
 * @return array
 */
	public function beforeRender(Controller $controller) {
		$sessions = $controller->Toolbar->Session->read();
		return $sessions;
	}
}
