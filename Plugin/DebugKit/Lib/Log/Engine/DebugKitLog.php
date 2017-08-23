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


/**
 * A CakeLog listener which saves having to munge files or other configured loggers.
 *
 */
class DebugKitLog implements CakeLogInterface {

/**
 * logs
 *
 * @var array
 */
	public $logs = array();

/**
 * Makes the reverse link needed to get the logs later.
 *
 * @param $options
 * @return \DebugKitLog
 */
	public function __construct($options) {
		$options['panel']->logger = $this;
	}

/**
 * Captures log messages in memory
 *
 * @param $type
 * @param $message
 * @return void
 */
	public function write($type, $message) {
		if (!isset($this->logs[$type])) {
			$this->logs[$type] = array();
		}
		$this->logs[$type][] = array(date('Y-m-d H:i:s'), (string)$message);
	}
}
