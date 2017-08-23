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
class ArosController extends AclAppController
{

	public $name       = 'Aros';
	public $uses       = array('Aro');
	public $helpers    = array('Js' => array('Jquery'));
	
	public $paginate = array(
        'limit' => 20,
        //'order' => array('display_name' => 'asc')
		);
	
	function beforeFilter()
	{
	    $this->loadModel(Configure :: read('acl.aro.role.model'));
	    $this->loadModel(Configure :: read('acl.aro.user.model'));
	    
	    parent :: beforeFilter();
	}
    
	public function admin_check($run = null)
	{
		
		$user_model_name = Configure :: read('acl.aro.user.model');
	    $role_model_name = Configure :: read('acl.aro.role.model');
	    
	    $user_display_field = $this->AclManager->set_display_name($user_model_name, Configure :: read('acl.user.display_name'));
	    $role_display_field = $this->AclManager->set_display_name($role_model_name, Configure :: read('acl.aro.role.display_field'));
	    
	    $this->set('user_display_field', $user_display_field);
	    $this->set('role_display_field', $role_display_field);
	    
		$roles = $this->{$role_model_name}->find('all', array('order' => $role_display_field, 'contain' => false, 'recursive' => -1));
	 	
		$missing_aros = array('roles' => array(), 'users' => array());
	    
		foreach($roles as $role)
		{
			/*
			 * Check if ARO for role exist
			 */
			$aro = $this->Aro->find('first', array('conditions' => array('model' => $role_model_name, 'foreign_key' => $role[$role_model_name][$this->_get_role_primary_key_name()])));
			
			if($aro === false)
			{
				$missing_aros['roles'][] = $role;
			}
		}
		
		$users = $this->{$user_model_name}->find('all', array('order' => $user_display_field, 'contain' => false, 'recursive' => -1));
		foreach($users as $user)
		{
			/*
			 * Check if ARO for user exist
			 */
			$aro = $this->Aro->find('first', array('conditions' => array('model' => $user_model_name, 'foreign_key' => $user[$user_model_name][$this->_get_user_primary_key_name()])));
			
			if($aro === false)
			{
				$missing_aros['users'][] = $user;
			}
		}
		
		
		if(isset($run))
		{
			$this->set('run', true);
			
			/*
			 * Complete roles AROs
			 */
			if(count($missing_aros['roles']) > 0)
			{
				foreach($missing_aros['roles'] as $k => $role)
				{
					$this->Aro->create(array('parent_id' 		=> null,
												'model' 		=> $role_model_name,
												'foreign_key' 	=> $role[$role_model_name][$this->_get_role_primary_key_name()],
												'alias'			=> $role[$role_model_name][$role_display_field]));
					
					if($this->Aro->save())
					{
						unset($missing_aros['roles'][$k]);
					}
				}
			}
			
			/*
			 * Complete users AROs
			 */
			if(count($missing_aros['users']) > 0)
			{
				foreach($missing_aros['users'] as $k => $user)
				{
					/*
					 * Find ARO parent for user ARO
					 */
					$parent_id = $this->Aro->field('id', array('model' => $role_model_name, 'foreign_key' => $user[$user_model_name][$this->_get_role_foreign_key_name()]));
					
					if($parent_id !== false)
					{
						$this->Aro->create(array('parent_id' 		=> $parent_id,
													'model' 		=> $user_model_name,
													'foreign_key' 	=> $user[$user_model_name][$this->_get_user_primary_key_name()],
													'alias'			=> $user[$user_model_name][$user_display_field]));
						
						if($this->Aro->save())
						{
							unset($missing_aros['users'][$k]);
						}
					}
				}
			}
		}
		else
		{
			$this->set('run', false);
		}
		
		$this->set('missing_aros', $missing_aros);
		
	}
	
	public function admin_users()
	{
		
	    $user_model_name = Configure :: read('acl.aro.user.model');
	    $role_model_name = Configure :: read('acl.aro.role.model');
	    
	    $user_display_field = $this->AclManager->set_display_name($user_model_name, Configure :: read('acl.user.display_name'));
	    $role_display_field = $this->AclManager->set_display_name($role_model_name, Configure :: read('acl.aro.role.display_field'));
	    
	    $this->paginate['order'] = array($user_display_field => 'asc');
	    
	    $this->set('user_display_field', $user_display_field);
	    $this->set('role_display_field', $role_display_field);
	    
	    $this->{$role_model_name}->recursive = -1;
	    $roles = $this->{$role_model_name}->find('all', array('order' => $role_display_field, 'contain' => false, 'recursive' => -1));
	 
	    $this->{$user_model_name}->recursive = -1;
	    
	    if(isset($this->request->data['User'][$user_display_field]) || $this->Session->check('acl.aros.users.filter'))
	    {
	        if(!isset($this->request->data['User'][$user_display_field]))
	        {
	            $this->request->data['User'][$user_display_field] = $this->Session->read('acl.aros.users.filter');
	        }
	        else
	        {
	            $this->Session->write('acl.aros.users.filter', $this->request->data['User'][$user_display_field]);
	        }
	        
	        $filter = array($user_model_name . '.' . $user_display_field . ' LIKE' => '%' . $this->request->data['User'][$user_display_field] . '%');
	    }
	    else
	    {
	        $filter = array();
	    }
	    
	    $users = $this->paginate($user_model_name, $filter);
	    
	    $missing_aro = false;
	    
	    foreach($users as &$user)
	    {
			$aro = $this->Acl->Aro->find('first', array('conditions' => array('model' => $user_model_name, 'foreign_key' => $user[$user_model_name][$this->_get_user_primary_key_name()])));
	        if($aro !== false)
	        {
	            $user['Aro'] = $aro['Aro'];
	        }
	        else
	        {
	            $missing_aro = true;
	        }
	    }
	    
	    $this->set('roles', $roles);
	    $this->set('users', $users);
	    $this->set('missing_aro', $missing_aro);
	}
	
	public function admin_update_user_role()
	{
	    $user_model_name = Configure :: read('acl.aro.user.model');
	    
        $data = array($user_model_name => array($this->_get_user_primary_key_name() => $this->params['named']['user'], $this->_get_role_foreign_key_name() => $this->params['named']['role']));
	    
	    if($this->{$user_model_name}->save($data))
	    {
	        $this->Session->setFlash(__d('acl', 'The user role has been updated'), 'flash_message', null, 'plugin_acl');
	    }
	    else
	    {
	        $errors = array_merge(array(__d('acl', 'The user role could not be updated')), $this->{$user_model_name}->validationErrors);
	        $this->Session->setFlash($errors, 'flash_error', null, 'plugin_acl');
	    }

	    $this->_return_to_referer();
	}
	
	public function admin_ajax_role_permissions()
	{
		$role_model_name = Configure :: read('acl.aro.role.model');
	    
		$role_display_field = $this->AclManager->set_display_name($role_model_name, Configure :: read('acl.aro.role.display_field'));
	    
	    $this->set('role_display_field', $role_display_field);
	    
	    $this->{$role_model_name}->recursive = -1;
	    $roles = $this->{$role_model_name}->find('all', array('order' => $role_display_field, 'contain' => false, 'recursive' => -1));
	 
	    $actions = $this->AclReflector->get_all_actions();
	    
		
		
	    $methods = array();
		foreach($actions as $k => $full_action)
    	{
	    	$arr = String::tokenize($full_action, '/');
	    	
			if (count($arr) == 2)
			{
				$plugin_name     = null;
				$controller_name = $arr[0];
				$action          = $arr[1];
			}
			elseif(count($arr) == 3)
			{
				$plugin_name     = $arr[0];
				$controller_name = $arr[1];
				$action          = $arr[2];
			}
			
			if($controller_name == 'App')
			{
			    unset($actions[$k]);
			}
			else
			{
        		if(isset($plugin_name))
                {
                	$methods['plugin'][$plugin_name][$controller_name][] = array('name' => $action);
                }
                else
                {
            	    $methods['app'][$controller_name][] = array('name' => $action);
                }
			}
    	}
    	
	    $this->set('roles', $roles);
	    $this->set('actions', $methods);
	}
	
	public function admin_role_permissions()
	{
	    $role_model_name = Configure :: read('acl.aro.role.model');
	    
	    $role_display_field = $this->AclManager->set_display_name($role_model_name, Configure :: read('acl.aro.role.display_field'));
	    
	    $this->set('role_display_field', $role_display_field);
	    
	    $this->{$role_model_name}->recursive = -1;
	    $roles = $this->{$role_model_name}->find('all', array('order' => $role_display_field, 'contain' => false, 'recursive' => -1));
	 
	    $actions = $this->AclReflector->get_all_actions();
	    
	    $permissions = array();
	    $methods     = array();
	    //pr($actions);
		
	    foreach($actions as $full_action)
    	{
	    	$arr = String::tokenize($full_action, '/');
	    	
			if (count($arr) == 2)
			{
				$plugin_name     = null;
				$controller_name = $arr[0];
				$action          = $arr[1];
			}
			elseif(count($arr) == 3)
			{
				$plugin_name     = $arr[0];
				$controller_name = $arr[1];
				$action          = $arr[2];
			}
			
			if($controller_name != 'App')
			{
    		    foreach($roles as $role)
    	    	{
    	    	    $aro_node = $this->Acl->Aro->node($role);
    	            if(!empty($aro_node))
    	            {
					     $aco_node = $this->Acl->Aco->node('controllers/' . $full_action);
    	        	    
						if(!empty($aco_node))
    	        	    {
							$authorized = $this->Acl->check($role, 'controllers/' . $full_action);
    	        	    	
    	        	$permissions[$role[Configure :: read('acl.aro.role.model')][$this->_get_role_primary_key_name()]] = $authorized ? 1 : 0 ;
    					}
    	            }
    	    		else
            	    {
            	        /*
            	         * No check could be done as the ARO is missing
            	         */
            	        $permissions[$role[Configure :: read('acl.aro.role.model')][$this->_get_role_primary_key_name()]] = -1;
            	    }
        		}
        		
        		if(isset($plugin_name))
                {
                	$methods['plugin'][$plugin_name][$controller_name][] = array('name' => $action, 'permissions' => $permissions);
                }
                else
                {
            	    $methods['app'][$controller_name][] = array('name' => $action, 'permissions' => $permissions);
                }
			}
    	}
 		
	    $this->set('roles', $roles);
	    $this->set('actions', $methods);
	}
	
	
	
	public function admin_user_permissions_1($user_id = null)
	{
	    $user_model_name = Configure :: read('acl.aro.user.model');
	    $role_model_name = Configure :: read('acl.aro.role.model');
	    
	    $user_display_field = $this->AclManager->set_display_name($user_model_name, Configure :: read('acl.user.display_name'));
	    
	    $this->paginate['order'] = array($user_display_field => 'asc');
	    $this->set('user_display_field', $user_display_field);
	    
	    if(empty($user_id))
	    {
    	    if(isset($this->request->data['User'][$user_display_field]) || $this->Session->check('acl.aros.user_permissions.filter'))
    	    {
    	        if(!isset($this->request->data['User'][$user_display_field]))
    	        {
    	            $this->request->data['User'][$user_display_field] = $this->Session->read('acl.aros.user_permissions.filter');
    	        }
    	        else
    	        {
    	            $this->Session->write('acl.aros.user_permissions.filter', $this->request->data['User'][$user_display_field]);
    	        }
    	        
    	        $filter = array($user_model_name . '.' . $user_display_field . ' LIKE' => '%' . $this->request->data['User'][$user_display_field] . '%');
    	    }
    	    else
    	    {
    	        $filter = array();
    	    }
	        
	        $users = $this->paginate($user_model_name, $filter);
	        
	        $this->set('users', $users);
	    }
	    else
	    {
	    	$role_display_field = $this->AclManager->set_display_name($role_model_name, Configure :: read('acl.aro.role.display_field'));
	    
	    	$this->set('role_display_field', $role_display_field);
	    
	        $this->{$role_model_name}->recursive = -1;
	        $roles = $this->{$role_model_name}->find('all', array('order' => $role_display_field, 'contain' => false, 'recursive' => -1));
	 		
	        $this->{$user_model_name}->recursive = -1;
	        $user = $this->{$user_model_name}->read(null, $user_id);
	        
	        $permissions = array();
	    	$methods     = array();
	    		
	        /*
             * Check if the user exists in the ARO table
             */
            $user_aro = $this->Acl->Aro->node($user);
            if(empty($user_aro))
            {
                $display_user = $this->{$user_model_name}->find('first', array('conditions' => array($user_model_name . '.id' => $user_id, 'contain' => false, 'recursive' => -1)));
                $this->Session->setFlash(sprintf(__d('acl', "The user '%s' does not exist in the ARO table"), $display_user[$user_model_name][$user_display_field]), 'flash_error', null, 'plugin_acl');
            }
            else
            {
            	$actions = $this->AclReflector->get_all_actions();
        		
	            foreach($actions as $full_action)
		    	{
			    	$arr = String::tokenize($full_action, '/');
			    	
					if (count($arr) == 2)
					{
						$plugin_name     = null;
						$controller_name = $arr[0];
						$action          = $arr[1];
					}
					elseif(count($arr) == 3)
					{
						$plugin_name     = $arr[0];
						$controller_name = $arr[1];
						$action          = $arr[2];
					}

					if($controller_name != 'App')
					{
    					if(!isset($this->params['named']['ajax']))
    					{
        		    		$aco_node = $this->Acl->Aco->node('controllers/' . $full_action);
        	        	    if(!empty($aco_node))
        	        	    {
        	        	    	$authorized = $this->Acl->check($user, 'controllers/' . $full_action);
    
        	        	    	$permissions[$user[$user_model_name][$this->_get_user_primary_key_name()]] = $authorized ? 1 : 0 ;
        					}
    					}
    					
    			    	if(isset($plugin_name))
    		            {
    		            	$methods['plugin'][$plugin_name][$controller_name][] = array('name' => $action, 'permissions' => $permissions);
    		            }
    		            else
    		            {
    		        	    $methods['app'][$controller_name][] = array('name' => $action, 'permissions' => $permissions);
    		            }
					}
		    	}
		    	
		    	/*
		    	 * Check if the user has specific permissions
		    	 */
		    	$count = $this->Aro->Permission->find('count', array('conditions' => array('Aro.id' => $user_aro[0]['Aro']['id'])));
		    	if($count != 0)
		    	{
		    	    $this->set('user_has_specific_permissions', true);
		    	}
		    	else
		    	{
		    	    $this->set('user_has_specific_permissions', false);
		    	}
            }
            
            $this->set('user', $user);
            $this->set('roles', $roles);
            $this->set('actions', $methods);
			
			$all_controllers = $this->AclReflector->all_controllers_array();
		
			
			$this->set('all_controllers', $all_controllers);

			if(isset($this->params['named']['ajax']))
            {
                $this->render('admin_ajax_user_permissions');
            } 
	    }
	}
	
	
	public function admin_user_permissions($user_id = null)
	{
	    $user_model_name = Configure :: read('acl.aro.user.model');
	    $role_model_name = Configure :: read('acl.aro.role.model');
	    
	    $user_display_field = $this->AclManager->set_display_name($user_model_name, Configure :: read('acl.user.display_name'));
	    
	    $this->paginate['order'] = array($user_display_field => 'asc');
	    $this->set('user_display_field', $user_display_field);
	    
	    if(empty($user_id))
	    {
    	    if(isset($this->request->data['User'][$user_display_field]) || $this->Session->check('acl.aros.user_permissions.filter'))
    	    {
    	        if(!isset($this->request->data['User'][$user_display_field]))
    	        {
    	            $this->request->data['User'][$user_display_field] = $this->Session->read('acl.aros.user_permissions.filter');
    	        }
    	        else
    	        {
    	            $this->Session->write('acl.aros.user_permissions.filter', $this->request->data['User'][$user_display_field]);
    	        }
    	        
    	        $filter = array($user_model_name . '.' . $user_display_field . ' LIKE' => '%' . $this->request->data['User'][$user_display_field] . '%');
    	    }
    	    else
    	    {
    	        $filter = array();
    	    }
	        
	        $users = $this->paginate($user_model_name, $filter);
	        
	        $this->set('users', $users);
	    }
	    else
	    {
	    	$role_display_field = $this->AclManager->set_display_name($role_model_name, Configure :: read('acl.aro.role.display_field'));
	    
	    	$this->set('role_display_field', $role_display_field);
	    
	        $this->{$role_model_name}->recursive = -1;
	        $roles = $this->{$role_model_name}->find('all', array('order' => $role_display_field, 'contain' => false, 'recursive' => -1));
	 		
	        $this->{$user_model_name}->recursive = -1;
	        $user = $this->{$user_model_name}->read(null, $user_id);
	        
	        $permissions = array();
	    	$methods     = array();
	    		
	        /*
             * Check if the user exists in the ARO table
             */
            $user_aro = $this->Acl->Aro->node($user);
            if(empty($user_aro))
            {
                $display_user = $this->{$user_model_name}->find('first', array('conditions' => array($user_model_name . '.id' => $user_id, 'contain' => false, 'recursive' => -1)));
                $this->Session->setFlash(sprintf(__d('acl', "The user '%s' does not exist in the ARO table"), $display_user[$user_model_name][$user_display_field]), 'flash_error', null, 'plugin_acl');
            }
            else
            {
				// remove data from here.
			}
            
            $this->set('user', $user);
            $this->set('roles', $roles);
            $this->set('actions', $methods);
			
			$all_controllers = $this->AclReflector->all_controllers_array();
		
			$this->set('all_controllers', $all_controllers);

			if(isset($this->params['named']['ajax']))
            {
                $this->render('admin_ajax_user_permissions');
            } 
	    }
	}

	public function admin_empty_permissions()
	{
	    if($this->Aro->Permission->deleteAll(array('Permission.id > ' => 0)))
	    {
	        $this->Session->setFlash(__d('acl', 'The permissions have been cleared'), 'flash_message', null, 'plugin_acl');
	    }
	    else
	    {
	        $this->Session->setFlash(__d('acl', 'The permissions could not be cleared'), 'flash_error', null, 'plugin_acl');
	    }
	    
	    $this->_return_to_referer();
	}
	
	public function admin_clear_user_specific_permissions($user_id)
	{
	    $user =& $this->{Configure :: read('acl.aro.user.model')};
	    $user->id = $user_id;
	    
	    /*
         * Check if the user exists in the ARO table
         */
        $node = $this->Acl->Aro->node($user);
        if(empty($node))
        {
            $asked_user = $user->read(null, $user_id);
            $this->Session->setFlash(sprintf(__d('acl', "The user '%s' does not exist in the ARO table"), $asked_user['User'][Configure :: read('acl.user.display_name')]), 'flash_error', null, 'plugin_acl');
        }
        else
        {
            if($this->Aro->Permission->deleteAll(array('Aro.id' => $node[0]['Aro']['id'])))
    	    {
    	        $this->Session->setFlash(__d('acl', 'The specific permissions have been cleared'), 'flash_message', null, 'plugin_acl');
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(__d('acl', 'The specific permissions could not be cleared'), 'flash_error', null, 'plugin_acl');
    	    }
        }
        
	    $this->_return_to_referer();
	}
	
	public function admin_grant_all_controllers($role_id)
	{
	    $role =& $this->{Configure :: read('acl.aro.role.model')};
        $role->id = $role_id;
        
		/*
         * Check if the Role exists in the ARO table
         */
        $node = $this->Acl->Aro->node($role);
        if(empty($node))
        {
            $asked_role = $role->read(null, $role_id);
            $this->Session->setFlash(sprintf(__d('acl', "The role '%s' does not exist in the ARO table"), $asked_role['Role'][Configure :: read('acl.aro.role.display_field')]), 'flash_error', null, 'plugin_acl');
        }
        else
        {
            //Allow to everything
            $this->Acl->allow($role, 'controllers');
        }
        
	    $this->_return_to_referer();
	}
	
	public function admin_deny_all_controllers($role_id)
	{
	    $role =& $this->{Configure :: read('acl.aro.role.model')};
        $role->id = $role_id;
        
        /*
         * Check if the Role exists in the ARO table
         */
        $node = $this->Acl->Aro->node($role);
        if(empty($node))
        {
            $asked_role = $role->read(null, $role_id);
            $this->Session->setFlash(sprintf(__d('acl', "The role '%s' does not exist in the ARO table"), $asked_role['Role'][Configure :: read('acl.aro.role.display_field')]), 'flash_error', null, 'plugin_acl');
        }
        else
        {
            //Deny everything
            $this->Acl->deny($role, 'controllers');
        }
        
	    $this->_return_to_referer();
	}
	
	public function admin_get_role_controller_permission($role_id)
	{
		$role =& $this->{Configure :: read('acl.aro.role.model')};
        
        $role_data = $role->read(null, $role_id);
        
        $aro_node = $this->Acl->Aro->node($role_data);
        if(!empty($aro_node))
        {
	        $plugin_name        = isset($this->params['named']['plugin']) ? $this->params['named']['plugin'] : '';
	        $controller_name    = $this->params['named']['controller'];
	        $controller_actions = $this->AclReflector->get_controller_actions($controller_name);
	        
	        $role_controller_permissions = array();
	        
	        foreach($controller_actions as $action_name)
	        {
	        	$aco_path  = $plugin_name;
		        $aco_path .= empty($aco_path) ? $controller_name : '/' . $controller_name;
		        $aco_path .= '/' . $action_name;
		        
		        $aco_node = $this->Acl->Aco->node('controllers/' . $aco_path);
        	    if(!empty($aco_node))
        	    {
        	        $authorized = $this->Acl->check($role_data, 'controllers/' . $aco_path);
        	        $role_controller_permissions[$action_name] = $authorized;
        	    }
        	    else
        	    {
        	        $role_controller_permissions[$action_name] = -1;
        	    }
	        }
	    }
		else
        {
        	//$this->set('acl_error', true);
            //$this->set('acl_error_aro', true);
        }
        
		if($this->request->is('ajax'))
        {
        	Configure::write('debug', 0); //-> to disable printing of generation time preventing correct JSON parsing
        	echo json_encode($role_controller_permissions);
        	$this->autoRender = false;
        }
        else
        {
            $this->_return_to_referer();
        }
	}
	
	public function admin_grant_role_permission($role_id)
	{
	    $role =& $this->{Configure :: read('acl.aro.role.model')};
        
        $role->id = $role_id;
        
        $aco_path = $this->_get_passed_aco_path();
        
        /*
         * Check if the role exists in the ARO table
         */
        $aro_node = $this->Acl->Aro->node($role);
        if(!empty($aro_node))
        {
            if(!$this->AclManager->save_permission($aro_node, $aco_path, 'grant'))
            {
                $this->set('acl_error', true);
            }
        }
        else
        {
            $this->set('acl_error', true);
            $this->set('acl_error_aro', true);
        }
        
        $this->set('role_id', $role_id);
        $this->_set_aco_variables();
        
        if($this->request->is('ajax'))
        {
            $this->render('ajax_role_granted');
        }
        else
        {
            $this->_return_to_referer();
        }
	}
	
	public function admin_deny_role_permission($role_id)
	{
		$role =& $this->{Configure :: read('acl.aro.role.model')};
        
        $role->id = $role_id;
        
        $aco_path = $this->_get_passed_aco_path();
        
        $aro_node = $this->Acl->Aro->node($role);
		if(!empty($aro_node))
        {
            if(!$this->AclManager->save_permission($aro_node, $aco_path, 'deny'))
            {
                $this->set('acl_error', true);
            }
        }
        else
        {
        	$this->set('acl_error', true);
        }
        
        $this->set('role_id', $role_id);
        $this->_set_aco_variables();
        
        if($this->request->is('ajax'))
        {
            $this->render('ajax_role_denied');
        }
        else
        {
            $this->_return_to_referer();
        }
	}

	public function admin_get_user_controller_permission($user_id)
	{
        $user =& $this->{Configure :: read('acl.aro.user.model')};

	    $user_data = $user->read(null, $user_id);

        $aro_node = $this->Acl->Aro->node($user_data);
        if(!empty($aro_node))
        {
	        $plugin_name        = isset($this->params['named']['plugin']) ? $this->params['named']['plugin'] : '';
	        $controller_name    = $this->params['named']['controller'];
	        $controller_actions = $this->AclReflector->get_controller_actions($controller_name);

	        $user_controller_permissions = array();

	        foreach($controller_actions as $action_name)
	        {
	        	$aco_path  = $plugin_name;
		        $aco_path .= empty($aco_path) ? $controller_name : '/' . $controller_name;
		        $aco_path .= '/' . $action_name;

		        $aco_node = $this->Acl->Aco->node('controllers/' . $aco_path);
        	    if(!empty($aco_node))
        	    {
        	        $authorized = $this->Acl->check($user_data, 'controllers/' . $aco_path);
        	        $user_controller_permissions[$action_name] = $authorized;
        	    }
        	    else
        	    {
        	        $user_controller_permissions[$action_name] = -1;
        	    }
	        }
	    }
		else
        {
        	//$this->set('acl_error', true);
            //$this->set('acl_error_aro', true);
        }

		if($this->request->is('ajax'))
        {
        	Configure::write('debug', 0); //-> to disable printing of generation time preventing correct JSON parsing
        	echo json_encode($user_controller_permissions);
        	$this->autoRender = false;
        }
        else
        {
            $this->_return_to_referer();
        }
	}
	
	public function admin_grant_user_permission($user_id)
	{
	    $user =& $this->{Configure :: read('acl.aro.user.model')};
        
        $user->id = $user_id;

        $aco_path = $this->_get_passed_aco_path();
        
        /*
         * Check if the user exists in the ARO table
         */
        $aro_node = $this->Acl->Aro->node($user);
        if(!empty($aro_node))
        {
        	$aco_node = $this->Acl->Aco->node('controllers/' . $aco_path);
        	if(!empty($aco_node))
        	{
	            if(!$this->AclManager->save_permission($aro_node, $aco_path, 'grant'))
	            {
	                $this->set('acl_error', true);
	            }
        	}
        	else
        	{
        		$this->set('acl_error', true);
            	$this->set('acl_error_aco', true);
        	}
        }
        else
        {
            $this->set('acl_error', true);
            $this->set('acl_error_aro', true);
        }
        
        $this->set('user_id', $user_id);
        $this->_set_aco_variables();
        
        if($this->request->is('ajax'))
        {
            $this->render('ajax_user_granted');
        }
        else
        {
            $this->_return_to_referer();
        }
	}
	
	public function admin_deny_user_permission($user_id)
	{
	    $user =& $this->{Configure :: read('acl.aro.user.model')};
        
        $user->id = $user_id;

        $aco_path = $this->_get_passed_aco_path();
        
        /*
         * Check if the user exists in the ARO table
         */
        $aro_node = $this->Acl->Aro->node($user);
        if(!empty($aro_node))
        {
        	$aco_node = $this->Acl->Aco->node('controllers/' . $aco_path);
        	if(!empty($aco_node))
        	{
        	    if(!$this->AclManager->save_permission($aro_node, $aco_path, 'deny'))
	            {
	                $this->set('acl_error', true);
	            }
        	}
        	else
        	{
        		$this->set('acl_error', true);
            	$this->set('acl_error_aco', true);
        	}
        }
        else
        {
            $this->set('acl_error', true);
            $this->set('acl_error_aro', true);
        }
        
        $this->set('user_id', $user_id);
        $this->_set_aco_variables();
        
        if($this->request->is('ajax'))
        {
            $this->render('ajax_user_denied');
        }
        else
        {
            $this->_return_to_referer();
        }
	}
	
	
	/*
	Abstract: Group Level Permissions Based On Ajax
	Created By Rahul Dev Sharma
	Created On : 29 March 2015 :: 1:06 AM
	*/
	public function admin_group_permissions()
	{
	    $role_model_name = Configure :: read('acl.aro.role.model');
	    
	    $role_display_field = $this->AclManager->set_display_name($role_model_name, Configure :: read('acl.aro.role.display_field'));
	    
	    $this->set('role_display_field', $role_display_field);
	    
	    $this->{$role_model_name}->recursive = -1;
	    $roles = $this->{$role_model_name}->find('all', array('order' => $role_display_field, 'contain' => false, 'recursive' => -1));
	 
	    
		$all_controllers = $this->AclReflector->all_controllers_array();
		
		
		$this->set('all_controllers', $all_controllers);
		
		$this->set('roles', $roles);

	}
	
	
	/*
	Abstract: Group Level Permissions Based On Ajax
	Created By Rahul Dev Sharma
	Created On : 29 March 2015 :: 1:06 AM
	*/
	public function admin_edit_group_permissions()
	{
	    $role_model_name = Configure :: read('acl.aro.role.model');
	    
	    $role_display_field = $this->AclManager->set_display_name($role_model_name, Configure :: read('acl.aro.role.display_field'));
	    
	    $this->set('role_display_field', $role_display_field);
	    
	    $this->{$role_model_name}->recursive = -1;
	    $roles = $this->{$role_model_name}->find('all', array('order' => $role_display_field, 'contain' => false, 'recursive' => -1));
	 
	    
		$controllers	= $this->AclReflector->all_controllers_array();
		$controllerId	=	$this->controller_id();
		/*$App	=	$this->Acl->Aco->find('list',array(
									'conditions'=>array('Aco.alias'	=>	$controllers['App']),
									'fields'=>array('Aco.id','Aco.alias'),
									'order'=>array('Aco.alias asc')
									)
							);
		*/		
		//$conditions	=	array('Aco.parent_id'=>$controllerId);
		$conditions	=	array('Aco.alias'=>$controllers['App']);
		$App 		= $this->Acl->Aco->generateTreeList($conditions, '{n}.Aco.id', '{n}.Aco.alias');
		
		
		foreach($controllers['Plugin']	as $key	=>	$value)
		{
			$Plugin[$key] =	$this->Acl->Aco->find('list',array(
										'conditions'=>array('Aco.alias'	=> $value,'Aco.parent_id != '=>$controllerId),
										'fields'=>array('Aco.id','Aco.alias'),
										'order'=>array('Aco.alias asc'),
										)
								);
		}
		
		$all_controllers['App']		=	$App;
		$all_controllers['Plugin']	=	$Plugin;
		
		$this->set('all_controllers', $all_controllers);
		$this->set('roles', $roles);
	}
	
	public function admin_ajax_get_actions($controllerName)
	{
		$role_model_name = Configure :: read('acl.aro.role.model');
	    $role_display_field = $this->AclManager->set_display_name($role_model_name, Configure :: read('acl.aro.role.display_field'));
	    $this->set('role_display_field', $role_display_field);
		
		$this->{$role_model_name}->recursive = -1;
	    $roles = $this->{$role_model_name}->find('all', array('order' => $role_display_field, 'contain' => false, 'recursive' => -1));
		
		$arr = String::tokenize($controllerName, '_');
		$count	=	count($arr);
		
		if($count	==	1)
		{
			$controller	=	$arr[0];
		}
		else if($count	==	2)
			{
				$controller	=	$arr[1];
			}
		
		
		$controllerName	=	str_replace('_','/',$controllerName);
		
		
		
		$actionsArray = $this->AclReflector->get_controller_actions($controller);
		$permissions	=	array();
		foreach($actionsArray as $action)
		{
			$full_action = $controllerName . '/' . $action;
			
			foreach($roles as $role)
			{
				$aro_node = $this->Acl->Aro->node($role);
				
				if(!empty($aro_node))
				{
					//echo 'controllers/' . $full_action;
					$aco_node = $this->Acl->Aco->node('controllers/' . $full_action);
					
					if(!empty($aco_node))
					{
					
						$authorized = $this->Acl->check($role, 'controllers/' . $full_action);
						$permissions[$role[Configure :: read('acl.aro.role.model')][$this->_get_role_primary_key_name()]] = $authorized ? 1 : 0 ;
						
					}
					
				}
				else
				{
					/*
					 * No check could be done as the ARO is missing
					 */
					
					$permissions[$role[Configure :: read('acl.aro.role.model')][$this->_get_role_primary_key_name()]] = -1;
				}
			
				//pr($permissions);
			}
			$actions[$controller][] = array('name' => $action, 'permissions' => $permissions);
			
		}
		
		$this->set('roles', $roles);
		$this->set('actions', $actions);
	}
	
	public function admin_ajax_get_user_actions($controllerName, $user_id)
	{
		$user_model_name = Configure :: read('acl.aro.user.model');
	    $this->{$user_model_name}->recursive = -1;
		$user = $this->{$user_model_name}->read(null, $user_id);
		
		
		$arr = String::tokenize($controllerName, '_');
		$count	=	count($arr);
		
		if($count	==	1)
		{
			$plugin = '';
			$controller	=	$arr[0];
		}
		else if($count	==	2)
		{
			$plugin = $arr[0];
			$controller	=	$arr[1];
		}
		
		
		$controllerName	=	str_replace('_','/',$controllerName);
		
		$actionsArray = $this->AclReflector->get_controller_actions($controller);
		$permissions	=	array();
		foreach($actionsArray as $action)
		{
			$full_action = $controllerName . '/' . $action;
			
			$aco_node = $this->Acl->Aco->node('controllers/' . $full_action);
			if(!empty($aco_node))
			{
				$authorized = $this->Acl->check($user, 'controllers/' . $full_action);

				$permissions[$user[$user_model_name][$this->_get_user_primary_key_name()]] = $authorized ? 1 : 0 ;
			}
			else
			{
				$permissions[$user[$user_model_name][$this->_get_user_primary_key_name()]] = -1;
			}
			//pr($permissions);
			
			$actions[$controller][] = array('name' => $action, 'plugin' => $plugin ,'permissions' => $permissions);
		}
		$this->set('user', $user);
		$this->set('actions', $actions);
	
	}
	
	public function admin_ajax_edit_actions($controllerName)
	{
		
		$role_model_name = Configure :: read('acl.aro.role.model');
	    $role_display_field = $this->AclManager->set_display_name($role_model_name, Configure :: read('acl.aro.role.display_field'));
	    $this->set('role_display_field', $role_display_field);
		
		$this->{$role_model_name}->recursive = -1;
	    $roles = $this->{$role_model_name}->find('all', array('order' => $role_display_field, 'contain' => false, 'recursive' => -1));
		
		$totalroles = count($roles);
		
		
		$arr = String::tokenize($controllerName, '_');
		$count	=	count($arr);
		
		if($count	==	1)
		{
			$controller	=	$arr[0];
		}
		else if($count	==	2)
			{
				$controller	=	$arr[1];
			}
		
		
		$controllerName	=	str_replace('_','/',$controllerName);
		
		$controllerId	=	$this->Acl->Aco->find('first',array(
											'conditions'=>array('Aco.alias'=>$controller),
											'fields'=>array('Aco.id')
											)
									);

		$conditions	=	array('Aco.parent_id'=>$controllerId['Aco']['id']);
		$actions = $this->Acl->Aco->generateTreeList($conditions, '{n}.Aco.id', '{n}.Aco.alias');
		/*$actions	=	$this->Acl->Aco->find('list',array(
									'conditions'=>array('Aco.parent_id'=>$controllerId['Aco']['id']),
									'fields'=>array('Aco.id','Aco.alias'),
									'order'=>array('Aco.id asc')
									)
							);
		*/
		
		$this->set('totalroles', $totalroles);
		$this->set('actions', $actions);
	}
	
	public function admin_add_action()
	{
		if($this->request->is(array('post')))
		{
			$error	=	'';
			if(empty($this->data['Aco']['alias']))
				$error	=	'Please fill name.';
			
			if(empty($this->data['Aco']['parent_id']))
			{
				$controllerId		=	$this->controller_id();
				$this->request->data['Aco']['parent_id']	=	$controllerId;
			}
			
			if($error	==	'')
			{
				if($this->Acl->Aco->save($this->request->data))
				{
					$this->Session->setFlash(__('This data has been save successfully.'),'success');
					return $this->redirect(array('action' => 'edit_group_permissions'));
				}
				else
					{
						$this->Session->setFlash(__('This data could not be save, Please try again.'),'error');
					}
			}
			else
				{
					$this->Session->setFlash(__($error),'error');
				}
			
		
		}
		
			$controllerId		=	$this->controller_id();
			$controllers = $this->AclReflector->all_controllers_array();
			//pr($controllers);
			$parents = array();
				
			if(!empty($controllers['Plugin']))
			{
				foreach($controllers['Plugin'] as $key => $value)
				{
					$pluginName	=	$this->Acl->Aco->find('list',array(
										'conditions'=>array('Aco.alias'	=> $key,'Aco.parent_id'=>$controllerId),
										'fields'=>array('Aco.id','Aco.alias'),
										'order'=>array('Aco.alias asc'),
										)
									);
					
					$parents[key($pluginName)]	= $pluginName[key($pluginName)];
					$pluginControllers	=	$this->Acl->Aco->find('list',array(
										'conditions'=>array('Aco.alias'	=> $value,'Aco.parent_id != '=>$controllerId),
										'fields'=>array('Aco.id','Aco.alias'),
										'order'=>array('Aco.alias asc'),
										)
									);
					
					foreach($pluginControllers as $key1 => $pluginController)
					{
						$parents[$key1]	=	'_'.$pluginController;
					}
				}
			}
			if(!empty($controllers['App']))
			{
				foreach($controllers['App'] as $key => $value)
				{
					$controllers	=	$this->Acl->Aco->find('list',array(
										'conditions'=>array('Aco.alias'	=> $value,'Aco.parent_id '=>$controllerId),
										'fields'=>array('Aco.id','Aco.alias'),
										'order'=>array('Aco.alias asc'),
										)
									);
					
					$parents[key($controllers)]	= $controllers[key($controllers)];
				}
			}
			
			$this->set('parents',$parents);
	}
	
	public function admin_edit_action($id	=	NULL)
	{
		$this->Acl->Aco->id	=	$id;
		if(!$this->Acl->Aco->exists())
		{
			$this->Session->setFlash(__('Invalid id.'),'error');
			return $this->redirect(array('action' => 'edit_group_permissions'));

		}
		if($this->request->is(array('post','put')))
		{
			$error	=	'';
			if(empty($this->data['Aco']['alias']))
				$error	=	'Please fill name.';
				
		if($error	==	'')
		{
			
			if(empty($this->data['Aco']['parent_id']))
			{
				$controllerId		=	$this->controller_id();
				$this->request->data['Aco']['parent_id']	=	$controllerId;
			}
			
			if($this->Acl->Aco->save($this->request->data))
			{
				$this->Session->setFlash(__('This data has been save successfully.'),'success');
				return $this->redirect(array('action' => 'edit_group_permissions'));
			}
			else
				{
					$this->Session->setFlash(__('This data could not be save, Please try again.'),'error');
				}
		}
			else
				{
					$this->Session->setFlash(__($error),'error');
				}
		
		}
		else
			{
		
				$this->request->data	=	$this->Acl->Aco->find('first',array(
																	'conditions'=>array('Aco.id'=>$id)
																	)
															);
				
			}
			
			
			$controllerId		=	$this->controller_id();
			$controllers = $this->AclReflector->all_controllers_array();
			
			$parents = array();
				
			if(!empty($controllers['Plugin']))
			{
				foreach($controllers['Plugin'] as $key => $value)
				{
					$pluginName	=	$this->Acl->Aco->find('list',array(
										'conditions'=>array('Aco.alias'	=> $key,'Aco.parent_id'=>$controllerId),
										'fields'=>array('Aco.id','Aco.alias'),
										'order'=>array('Aco.alias asc'),
										)
									);
					
					$parents[key($pluginName)]	= $pluginName[key($pluginName)];
					$pluginControllers	=	$this->Acl->Aco->find('list',array(
										'conditions'=>array('Aco.alias'	=> $value,'Aco.parent_id != '=>$controllerId),
										'fields'=>array('Aco.id','Aco.alias'),
										'order'=>array('Aco.alias asc'),
										)
									);
					
					foreach($pluginControllers as $key1 => $pluginController)
					{
						$parents[$key1]	=	'_'.$pluginController;
					}
				}
			}
			if(!empty($controllers['App']))
			{
				foreach($controllers['App'] as $key => $value)
				{
					$controllers	=	$this->Acl->Aco->find('list',array(
										'conditions'=>array('Aco.alias'	=> $value,'Aco.parent_id '=>$controllerId),
										'fields'=>array('Aco.id','Aco.alias'),
										'order'=>array('Aco.alias asc'),
										)
									);
					
					$parents[key($controllers)]	= $controllers[key($controllers)];
				}
			}
	

			
			
			$this->set('parents',$parents);
	}
	
	
	public function admin_delete_action($id	=	NULL)
	{
		$this->Acl->Aco->id	=	$id;
		
		$checkPlugin	=	$this->check_plugin($id);
		if(!empty($checkPlugin))
		{
			$controllerName	=	$this->controller_name($id);
		}
		else
			{
				$controllerName	=	$this->plugin_controller_name($id);
			}
								
			
		if($this->Acl->Aco->exists())
		{
			$this->Acl->Aco->delete();
			
			echo $controllerName;
			exit;
		}
		else
			{
				exit;
			}
	}
	
	
	
/* Move Up */
	
	public function admin_moveup($id = null, $key = null) {
		$this->Acl->Aco->id = $id;
		
		if (!$this->Acl->Aco->exists()) {
		   $this->Session->setFlash(__('Invalid id.'),'error');
			return $this->redirect(array('action' => 'edit_group_permissions'));
		}
		if ($key > 0) {
			$this->Acl->Aco->moveUp($this->Acl->Aco->id, abs($key));
		} else {
			$this->Session->setFlash(__('Please provide a number of positions the row should' .
			  'be moved up.'),'error');
		}
		
			$checkPlugin	=	$this->check_plugin($id);
			
			if(!empty($checkPlugin))
			{
				$controllerName	=	$this->controller_name($id);
			}
			else
				{
					$controllerName	=	$this->plugin_controller_name($id);
				}
			echo $controllerName;
			die;
		
		if($this->request->is('ajax'))
		{
			$controllerId	=	$this->controller_id();
			$checkPlugin	 =	$this->Acl->Aco->find('first',array(
											'conditions'=>array('Aco.id'	=> $id,
											'Aco.parent_id '=>$controllerId
											),
										)
									);
			
			if(!empty($checkPlugin))
			{
				$controllerName	=	$this->controller_name($id);
			}
			else
				{
					$controllerName	=	$this->plugin_controller_name($id);
				}
			echo $controllerName;
			exit;
		}
		else
			{
				return $this->redirect(array('action' => 'edit_group_permissions'));
			}
	}
	
	
/* Move Down */
	
	public function admin_movedown($id = null, $delta = null) {
		$this->Acl->Aco->id = $id;
		if (!$this->Acl->Aco->exists()) {
		   $this->Session->setFlash(__('Invalid id.'),'error');
			return $this->redirect(array('action' => 'edit_group_permissions'));
		}
	
		if ($delta > 0) {
			$this->Acl->Aco->moveDown($this->Acl->Aco->id, abs($delta));
		} else {
			$this->Session->setFlash(__('Please provide the number of positions the field should be' .
			  'moved down.'),'error');
		}
	
		if($this->request->is('ajax'))
		{
			$checkPlugin	=	$this->check_plugin($id);
			if(!empty($checkPlugin))
			{
				$controllerName	=	$this->controller_name($id);
			}
			else
				{
					$controllerName	=	$this->plugin_controller_name($id);
				}
								
			echo $controllerName;
			exit;
		}
		else
			{
				return $this->redirect(array('action' => 'edit_group_permissions'));
			}
	}

	
	########## Return First controller id
	function controller_id()
	{
		
		$controllerId	=	$this->Acl->Aco->find('first',array(
									'conditions'=>array(
											'parent_id'=>	null,
											'model'	=>	null,
											'foreign_key' => null,
											'alias !='=>null
											),
									'fields'=>array('id'),
									'contain'=>array()
									)
						);
	
		return $controllerId['Aco']['id'];
	}
	########## Return First controller id
	
	function controller_name($id)
	{
		$aco			=	$this->Acl->Aco->find('first',array('conditions'=>array(
																'Aco.id'=>$id
																	),
													'fields'=>array('Aco.parent_id')
												)
									);
				
		$acoController	=	$this->Acl->Aco->find('first',array('conditions'=>array(
													'Aco.id'=>$aco['Aco']['parent_id']
														),
										'fields'=>array('Aco.alias')
									)
						);
						
		return $acoController['Aco']['alias'];
	}
	
	function plugin_controller_name($id)
	{
		$aco			=	$this->Acl->Aco->find('first',array('conditions'=>array(
																'Aco.id'=>$id
																	),
													'fields'=>array('Aco.parent_id')
												)
									);
				
		$acoController	=	$this->Acl->Aco->find('first',array('conditions'=>array(
													'Aco.id'=>$aco['Aco']['parent_id']
														),
										'fields'=>array('Aco.alias','Aco.parent_id')
									)
						);
						
		$pluginName	=	$this->Acl->Aco->find('first',array('conditions'=>array(
													'Aco.id'=>$acoController['Aco']['parent_id']
														),
										'fields'=>array('Aco.alias')
									)
						);			
						
		return $pluginName['Aco']['alias'].'_'.$acoController['Aco']['alias'];
	}
	
	function check_plugin($id)
				{
					$controllerId	=	$this->controller_id();
					$aclEntryIds	 		  =	$this->Acl->Aco->find('list',array(
														'conditions'=>array('Aco.parent_id'=>$controllerId),
														'fields'=>array('Aco.id')
														)
													);
					
					$checkPlugin	 =	$this->Acl->Aco->find('first',array(
													'conditions'=>array('Aco.id'	=> $id,
													'Aco.parent_id'=>$aclEntryIds
													),
												)
											);
											
					return $checkPlugin;
				}
	
	/**
 * admin_generate
 */
	public function admin_generate() {
		$prune_logs  = $this->AclManager->prune_acos();
        $create_logs = $this->AclManager->create_acos();
		
		$this->Session->setFlash(__('Created %d new permissions and Erase %d permissions', count($create_logs), count($prune_logs)), 'success', array('acosCreated' => $create_logs));
		$this->redirect(array('action' => 'group_permissions'));
	}

	public function admin_synchronize() {
		
		$aco =& $this->Acl->Aco;
		$root = $aco->node('controllers');
		if (!$root) {
			$aco->create(array(
				'parent_id' => null,
				'model' => null,
				'alias' => 'controllers',
			));
			$root = $aco->save();
			$root['Aco']['id'] = $aco->id;
		} else {
			$root = $root[0];
		}

		$created = array();
		$controllerPathArray = $this->AclReflector->get_all_controllers();
		
		foreach($controllerPathArray as $controllerPathArra)
		{
			$arr = String::tokenize($controllerPathArra['name'], '/');
			$count	=	count($arr);
			
			if($count	==	1)
			{
				$controller	=	$arr[0];
			}
			else if($count	==	2)
				{
					$controller	=	$arr[1];
				}
			
			$controllerPaths[$controller] = $controllerPathArra['file'];
		}
		foreach ($controllerPaths as $controllerName => $controllerPath) {
			$controllerNode = $aco->node('controllers/' . $controllerName);
			
			if (!$controllerNode) {
				$aco->create(array(
					'parent_id' => $root['Aco']['id'],
					'model' => null,
					'alias' => $controllerName,
				));
				if ($controllerNode = $aco->save()) {
					$controllerNode['Aco']['id'] = $aco->id;
					$created[] = $controllerName;
				}
			} else {
				$controllerNode = $controllerNode[0];
			}

			$methods = $this->AclReflector->get_controller_actions($controllerName);
			
			foreach ($methods as $method) {
				$methodNode = $aco->node('controllers/' . $controllerName . '/' . $method);
				
				if (!$methodNode) {
					$aco->create(array(
						'parent_id' => $controllerNode['Aco']['id'],
						'model' => null,
						'alias' => $method,
					));
					if ($methodNode = $aco->save()) {
						$created[] = $controllerName . ' . ' . $method;
					}
				}
			}
			
			
		}
		$this->Session->setFlash(__('Created %d new permissions', count($created)), 'success', array('acosCreated' => $created));

		if (isset($this->params['named']['permissions'])) {
			$this->redirect(array('plugin' => 'acl', 'controller' => 'aros', 'action' => 'edit_group_permissions'));
		} else {
			$this->redirect(array('action' => 'group_permissions'));
		}
	}
	
}
?>