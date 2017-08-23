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
 
 */
 class AclController extends AclAppController {

	public $name = 'Acl';
	public $uses = null;
	
	function index()
	{
	    $this->redirect('/admin/acl/aros');
	}
	
	function admin_index()
	{
	    $this->redirect('/admin/acl/acos');
	}
	
}
?>