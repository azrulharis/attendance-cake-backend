<?php 

class DeleteShell extends AppShell {
	
	public function main() {
        $this->out('Hello world.');
    }

	public function delete() { 
		$this->layout = '';
		$today = date('Y-m-d H:i:s');
	    $days_ago = date('Y-m-d H:i:s', strtotime('-2 days', strtotime($today)));
	    
	    $this->loadModel('Tree');

	    $users = $this->Tree->find('all', array(
	    	'conditions' => array(
	    		'Tree.active_date <' => $days_ago, // < == less than > greather than -2 days 
	    		'Tree.status' => 0
	    		)
	    	)); 
	    //echo count($users); 
	    if($users) {
	    	foreach ($users as $key => $row) {
	    		$bank = $this->__get_user_bank($row['User']['id']);
	    		$user = array(
	    			'user_id' => $row['User']['id'], 
	    			'username' => $row['User']['username'],
	    			'password' => $row['User']['password'],
					'firstname' => $row['User']['firstname'],
					'email' => $row['User']['email'],
					'mobile_number' => $row['User']['mobile_number'], 
					'gender' => $row['User']['gender'],
					'bank' => $bank['name'],
					'account' => $bank['account'],
					'level' => $row['Tree']['level'],
					'tree_group_id' => $row['Tree']['tree_group_id'],
					'order_number' => $row['Tree']['order_number']
	    			);
	    		$this->__import_users($user);
	    		//$this->__delete_user($row['User']['id']);
	    	} 
	    }
 
	}

	private function __delete_user($id) {
		$this->loadModel('Bank');
		$this->loadModel('Tree');
		$this->loadModel('Notification');
		$this->loadModel('Transaction');

		$this->loadModel('TreeGroup');

		$tree = $this->Tree->find('first', array(
			'conditions' => array(
				'Tree.user_id' => $id
				)
			));

		$counter = $tree['TreeGroup']['counter'] - 1;
		$this->TreeGroup->id = $tree['Tree']['tree_group_id'];
		$this->TreeGroup->saveField('counter', $counter);

		$this->Tree->deleteAll(array('Tree.user_id' => $id), false);
		$this->Bank->deleteAll(array('Bank.user_id' => $id), false);
		$this->Notification->deleteAll(array('Notification.user_id' => $id), false);
		$this->Transaction->deleteAll(array('Transaction.user_id' => $id), false); 
		$this->User->delete($id); 
	}

	private function __get_user_bank($user_id) {
		$this->loadModel('Bank');

	    $user = $this->Bank->find('first', array(
	    	'conditions' => array(
	    		'Bank.user_id' => $user_id 
	    		)
	    	)); 
	    return $user['Bank'];
	}

	private function __import_users($data = array()) {
		$this->loadModel('DeletedUser');
		$this->DeletedUser->create();
		$user = array(
			'user_id' => $data['user_id'],
			'username' => $data['username'],
			'password' => $data['password'],
			'firstname' => $data['firstname'],
			'email' => $data['email'],
			'mobile_number' => $data['mobile_number'],
			'status' => 0,
			'created' => date('Y-m-d H:i:s'),
			'gender' => $data['gender'],
			'bank' => $data['bank'],
			'account' => $data['account'],
			'level' => $data['level'],
			'tree_group_id' => $data['tree_group_id'],
			'order_number' => $data['order_number']  
			);
		$this->DeletedUser->save($user);
	}

	private function __delete_wallet($user_id) {
		$this->loadModel('Wallet');
		$condition = array(
            'Wallet.user_id' => $user_id 
            );
        if(!$this->Wallet->deleteAll($condition,false)) {
            return false;
        }
        return true;
	}

	private function __delete_tree($user_id) {
		$this->loadModel('Tree');
		$condition = array(
            'Tree.user_id' => $user_id 
            );
        if(!$this->Tree->deleteAll($condition,false)) {
            return false;
        }
        return true;
	}

	 
}