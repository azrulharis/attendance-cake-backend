<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET, POST');
header("Content-Type: application/json");
header("Access-Control-Allow-Credentials: true");

App::uses('AppController', 'Controller');
/**
 * Attendances Controller
 *
 * @property Attendance $Attendance
 * @property PaginatorComponent $Paginator
 */
class AttendancesController extends AppController {

/** 
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');

	public function beforeFilter() { 
		parent::beforeFilter();
		$this->Auth->allow('api_index', 'api_view', 'api_in', 'api_out');
	} 
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Attendance->recursive = 0;
		$this->set('attendances', $this->Paginator->paginate());
	}

	public function api_index() { 
		$this->Attendance->recursive = 0;
		$json = $this->Paginator->paginate();
		$this->set(array(
            'json' => $json,
            '_serialize' => array('json')
        ));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Attendance->exists($id)) {
			throw new NotFoundException(__('Invalid attendance'));
		}
		$options = array('conditions' => array('Attendance.' . $this->Attendance->primaryKey => $id), 'recursive' => 2);
		$this->set('attendance', $this->Attendance->find('first', $options));
	}

	public function api_view($id = null) {
		if (!$this->Attendance->exists($id)) {
			throw new NotFoundException(__('Invalid attendance'));
		}
		$options = array('conditions' => array('Attendance.' . $this->Attendance->primaryKey => $id), 'recursive' => -1);
		$attendance = $this->Attendance->find('first', $options);

		$workers = $this->Attendance->AttendanceWorker->find('all', array(
			'conditions' => array(
				'AttendanceWorker.attendance_id' => $id
				),
			'recursive' => 0,
			'contain' => array(
				'User' => array(
					'fields' => array(
						'User.id',
						'User.username',
						'User.name',
						'User.mobile_number' 
						)
					)
				)
			)); 

		$this->set(array(  
			'attendance' => $attendance,
			'workers' => $workers,
            '_serialize' => array('attendance', 'workers')
        )); 
	}



	public function api_out($project_group_id = null, $attendance_id = null) { 
		$message = '';
		$status = false;
		if ($this->request->is(array('post', 'put'))) { 

			if(!isset($this->request->data['worker'])) {
				$message = 'Please check atlease 1 worker';
			} elseif(count($this->request->data['worker']) < 1) {
				$message = 'Please check atlease 1 worker';
			} elseif(!is_numeric($this->request->data['user_id'])) {
				$message = 'Please supply valid data';
			} elseif(!is_numeric($project_group_id)) {
				$message = 'Invalid project group id';
			} elseif(!is_numeric($attendance_id)) {
				$message = 'Invalid attendance id';
			} else { 
				// Check attendance for today already create
				$att = $this->Attendance->find('first', array(
					'conditions' => array(
						'Attendance.id' => $attendance_id 
						),
					'recursive' => -1
					));
				if($att) {

					// Proceed to update
					$this->Attendance->id = $attendance_id;
					$this->request->data['Attendance']['modified'] = $this->date; 
					if ($this->Attendance->save($this->request->data)) {  
						// Insert photo 
						$this->loadModel('AttendanceFile');
						$this->AttendanceFile->create();
						$this->request->data['AttendanceFile']['attendance_id'] = $last_id;
						$this->request->data['AttendanceFile']['name'] = $this->request->data['photo'];
						$this->request->data['AttendanceFile']['dir'] = '';

						if($this->AttendanceFile->save($this->request->data['AttendanceFile'])) {
							$file_id = $this->AttendanceFile->getLastInsertId();

							// Insert worker clock in
							$worker = $this->request->data['worker'];
							$remark = $this->request->data['worker_remark'];
							$working_location = $this->request->data['working_location'];
							$this->loadModel('AttendanceWorker');
							for($i = 0; $i < count($worker); $i++) {
								/*$update = $this->AttendanceWorker->updateAll(
									array(
										''
										)
									)*/
								$this->AttendanceWorker->create();
								$workers = array(
									'attendance_id' => $last_id, 
									'attendance_file_out' => $file_id,
									'user_id' => $worker[$i], 
									'created' => $this->date, 
									'modified' => NULL, 
									'time_in' => $this->date, 
									'time_out' => NULL,
									'total_hours' => 0, 
									'adjusted_time' => 0, 
									'remark' => $remark[$i], 
									'working_location' => $working_location[$i], 
									'ot' => 'No', 
									'status' => 'In'
									);
								if(!$this->AttendanceWorker->save($workers)) {
									$message = 'Error 125. Please';
								}
							}
							// insert each worker attendance
							$attendance_id = $last_id;
							$status = true;
							$message = 'Attendance has been saved';	
						} 
						
					} else {
						$message = 'Attendance could not be saved';
					} 
				}  
			} 
		} 
        $this->set(array(
        	'attendance_id' => $attendance_id,
			'status' => $status,
			'message' => $message,
            '_serialize' => array('attendance_id', 'status', 'message')
        )); 
	}
 

	/*
	*	If attendance id is null, then create Attendance
	*	POST http://192.168.0.157/ekong/attendances/api_in/{project_group_id}/{attendance_id}.json
	*/
	public function api_in($project_group_id = null, $attendance_id = null) {
		
		$message = '';
		$status = false;
		if ($this->request->is('post')) { 

			if(!isset($this->request->data['worker'])) {
				$message = 'Please check atlease 1 worker';
			} elseif(count($this->request->data['worker']) < 1) {
				$message = 'Please check atlease 1 worker';
			} elseif(!is_numeric($this->request->data['user_id'])) {
				$message = 'Please supply valid data';
			} elseif(!is_numeric($project_group_id)) {
				$message = 'Invalid project group id';
			} else {

				if($attendance_id != null) {
					// Check attendance for today already create
					$att = $this->Attendance->find('first', array(
						'conditions' => array(
							'Attendance.id' => $attendance_id 
							),
						'recursive' => -1
						));
					if($att) {
						// Proceed to update
						$this->request->data['Attendance']['modified'] = $this->date;

						if ($this->Attendance->save($this->request->data)) { 
							$last_id = $this->Attendance->getLastInsertId();

							// Insert photo 
							$this->loadModel('AttendanceFile');
							$this->AttendanceFile->create();
							$this->request->data['AttendanceFile']['attendance_id'] = $last_id;
							$this->request->data['AttendanceFile']['name'] = $this->request->data['photo'];
							$this->request->data['AttendanceFile']['dir'] = '';

							if($this->AttendanceFile->save($this->request->data['AttendanceFile'])) {
								$file_id = $this->AttendanceFile->getLastInsertId();

								// Insert worker clock in
								$worker = $this->request->data['worker'];
								$remark = $this->request->data['worker_remark'];
								$working_location = $this->request->data['working_location'];
								$this->loadModel('AttendanceWorker');
								for($i = 0; $i < count($worker); $i++) {
									$this->AttendanceWorker->create();
									$workers = array(
										'attendance_id' => $last_id, 
										'attendance_file_id' => $file_id,
										'user_id' => $worker[$i], 
										'created' => $this->date, 
										'modified' => NULL, 
										'time_in' => $this->date, 
										'time_out' => NULL,
										'total_hours' => 0, 
										'adjusted_time' => 0, 
										'remark' => $remark[$i], 
										'working_location' => $working_location[$i], 
										'ot' => 'No', 
										'status' => 'In'
										);
									if(!$this->AttendanceWorker->save($workers)) {
										$message = 'Error 125. Please';
									}
								}
								// insert each worker attendance
								$attendance_id = $last_id;
								$status = true;
								$message = 'Attendance has been saved';	
							} 
							
						} else {
							$message = 'Attendance could not be saved';
						} 
					}

				} else {
					$this->Attendance->create();
					$this->request->data['Attendance'] = $this->request->data;
					$this->request->data['Attendance']['created'] = $this->date;
					$this->request->data['Attendance']['time_in'] = $this->date;
					$this->request->data['Attendance']['project_group_id'] = $project_group_id;

					if ($this->Attendance->save($this->request->data)) { 
						$last_id = $this->Attendance->getLastInsertId();

						// Insert photo
						$this->loadModel('AttendanceFile');
						$this->AttendanceFile->create();
						$this->request->data['AttendanceFile']['attendance_id'] = $last_id;
						$this->request->data['AttendanceFile']['name'] = $this->request->data['photo'];
						$this->request->data['AttendanceFile']['dir'] = '';

						if($this->AttendanceFile->save($this->request->data['AttendanceFile'])) {
							$file_id = $this->AttendanceFile->getLastInsertId();

							// Insert worker clock in
							$worker = $this->request->data['worker'];
							$remark = $this->request->data['worker_remark'];
							$working_location = $this->request->data['working_location'];
							$this->loadModel('AttendanceWorker');
							for($i = 0; $i < count($worker); $i++) {
								$this->AttendanceWorker->create();
								$workers = array(
									'attendance_id' => $last_id, 
									'attendance_file_id' => $file_id,
									'user_id' => $worker[$i], 
									'created' => $this->date, 
									'modified' => NULL, 
									'time_in' => $this->date, 
									'time_out' => NULL,
									'total_hours' => 0, 
									'adjusted_time' => 0, 
									'remark' => $remark[$i], 
									'working_location' => $working_location[$i], 
									'ot' => 'No', 
									'status' => 'In'
									);
								if(!$this->AttendanceWorker->save($workers)) {
									$message = 'Error 125. Please';
								}
							}
							// insert each worker attendance
							$attendance_id = $last_id;
							$status = true;
							$message = 'Attendance has been saved';	
						} 
						
					} else {
						$message = 'Attendance could not be saved';
					}
				} 	
			} 
		} 
        $this->set(array(
        	'attendance_id' => $attendance_id,
			'status' => $status,
			'message' => $message,
            '_serialize' => array('attendance_id', 'status', 'message')
        ));
		/*
		$users = $this->Attendance->User->find('list');
		$projects = $this->Attendance->Project->find('list');
		$companies = $this->Attendance->Company->find('list');
		$projectGroups = $this->Attendance->ProjectGroup->find('list'); 
		
		$this->set(array(
			'status' => $status,
			'message' => $message,
            'users' => $users,
            'projects' => $projects,
            'companies' => $companies,
            'projectGroups' => $projectGroups,
            '_serialize' => array('status', 'message', 'users', 'projects', 'companies', 'projectGroups')
        ));

        
        $post = $this->request->data;
        $this->set(array(
			'post' => $post, 
            '_serialize' => array('post')
        ));
        */
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Attendance->exists($id)) {
			throw new NotFoundException(__('Invalid attendance'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Attendance->save($this->request->data)) {
				$this->Session->setFlash(__('The attendance has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attendance could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Attendance.' . $this->Attendance->primaryKey => $id));
			$this->request->data = $this->Attendance->find('first', $options);
		}
		$users = $this->Attendance->User->find('list');
		$projects = $this->Attendance->Project->find('list');
		$companies = $this->Attendance->Company->find('list');
		$projectGroups = $this->Attendance->ProjectGroup->find('list');
		$this->set(compact('users', 'projects', 'companies', 'projectGroups'));
	}

	/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Attendance->create();
			if ($this->Attendance->save($this->request->data)) {
				$this->Session->setFlash(__('The attendance has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attendance could not be saved. Please, try again.'));
			}
		}
		$users = $this->Attendance->User->find('list');
		$projects = $this->Attendance->Project->find('list');
		$companies = $this->Attendance->Company->find('list');
		$projectGroups = $this->Attendance->ProjectGroup->find('list');
		$this->set(compact('users', 'projects', 'companies', 'projectGroups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Attendance->id = $id;
		if (!$this->Attendance->exists()) {
			throw new NotFoundException(__('Invalid attendance'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Attendance->delete()) {
			$this->Session->setFlash(__('The attendance has been deleted.'));
		} else {
			$this->Session->setFlash(__('The attendance could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
