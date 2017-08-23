<?php

/*
*	Allow all access
*/
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET, POST');
header("Content-Type: application/json");
header("Access-Control-Allow-Credentials: true");

/** 
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9 
 */
App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $date;

	public $user_id;

	public $group_id;

	public $designation;

	public $att_conf = array();

	public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            ),
			'authenticate' => array(
				'Form' => array(
					'scope' => array('User.status' => '1')
				),
			),
        ),
        'Session',
        'RequestHandler' => array(
			'viewClassMap' => array(
				'xls' => 'CakeExcel.Excel',
				'xlsx' => 'CakeExcel.Excel'
			)
		), 
    	'Cookie'
		//'DebugKit.Toolbar',
    );
	
    public $helpers = array('Html', 'Form', 'Session');
	
	public $uses = array(
		'Configuration.Configuration',
		'EmailTemplate.EmailTemplate',
	);


	public $theme = "";


    public function beforeFilter() { 

    	// set cookie options
	    $this->Cookie->key = 'qSI232qs*&sXOw!adre@34SAv!@*(XSL#$%)asGb$@11~_+!@#HKis~#^';
	    $this->Cookie->httpOnly = true;

	    if (!$this->Auth->loggedIn() && $this->Cookie->read('remember_me_cookie')) {
	        $cookie = $this->Cookie->read('remember_me_cookie');

	        $this->loadModel('User');

	        $user = $this->User->find('first', array(
	            'conditions' => array(
	                'User.username' => $cookie['username'],
	                'User.password' => $cookie['password']
	            )
	        ));
 
	    }   

    	$this->date = date('Y-m-d H:i:s');

    	// Load notification
    	$user_id = $this->Session->read('Auth.User.id');
    	$notifications = $this->__get_notification($user_id, 10);
    	$notification_counter = count($this->__get_notification($user_id));
    	$this->set('notifications', $notifications);
    	$this->set('notification_counter', $notification_counter);
    
		//Configure AuthComponent
		$this->Configuration->load();
		$this->Auth->loginAction = array(
          'controller' => 'users',
          'action' => 'login',
          'admin' => false,
		  'plugin' => false
        );
        $this->Auth->logoutRedirect = array(
          'controller' => 'users',
          'action' => 'login',
          'admin' => false,
		  'plugin' => false
        );
        $this->Auth->loginRedirect = array(
          'controller' => 'users',
          'action' => 'dashboard', 
		  'plugin' => false
        );
		
		$this->check_group();
		 
		if($this->params['plugin']=='content') {
			$this->layout = 'content';
		}
		
		if($this->params['plugin']=='blog') {
			$this->layout = 'blog';
		} 
 		
		$user_id = $this->Session->read('Auth.User.id');
		$group_id = $this->Session->read('Auth.User.group_id');
 		
		$controller = $this->params['controller']; 

		$designation = $this->check_designation();
		// Inject role to view
		$this->set('designations', $designation);
		
		$this->user_id = $user_id;
		$this->group_id = $group_id;

		$this->att_conf = array(
			'start' => Configure::read('Site.start_hour'),
			'end' => Configure::read('Site.end_hour'),
			'lunch' => Configure::read('Site.lunch'),
			);

	}

	protected function send_gcm($registrationIds, $messages) {
		// API access key from Google API's Console
		define( 'API_ACCESS_KEY', Configure::read('Site.gcm_api') );
		 
		// prep the bundle
		$msg = array
		(
			'message' 	=> 'here is a message. message',
			'title'		=> 'This is a title. title',
			'subtitle'	=> 'This is a subtitle. subtitle',
			'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
			'vibrate'	=> 1,
			'sound'		=> 1,
			'largeIcon'	=> 'large_icon',
			'smallIcon'	=> 'small_icon'
		);
		$fields = array
		(
			'registration_ids' 	=> $registrationIds,
			'data'			=> $messages
		);
		 
		$headers = array
		(
			'Authorization: key=' . API_ACCESS_KEY,
			'Content-Type: application/json'
		);
		 
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
		return $result;
	}

	// IOS
	protected function send_ios() { 
		// Provide the Host Information. 
	    $tHost = 'gateway.sandbox.push.apple.com';

	    $tPort = 2195; 
	    // Provide the Certificate and Key Data.

	    $tCert = 'dev.pem'; 
	    // Provide the Private Key Passphrase (alternatively you can keep this secrete

	    // and enter the key manually on the terminal -> remove relevant line from code).

	    // Replace XXXXX with your Passphrase

	    $tPassphrase = 'xxxxxx'; 
	    // Provide the Device Identifier (Ensure that the Identifier does not have spaces in it).

	    // Replace this token with the token of the iOS device that is to receive the notification. 
	    $tToken = 'ada56107075e4d00f9da001b0ad71200cb953b99266e506884f6eab06f13f666';

	    // The message that is to appear on the dialog. 
	    $empresa = "Petiskeira";

	    $tAlert = $empresa . ' tem um recado para você!';

	    // The Badge Number for the Application Icon (integer >=0). 
	    $tBadge = 1;

	    // Audible Notification Option. 
	    $tSound = 'default';

	    // The content that is returned by the LiveCode "pushNotificationReceived" message. 
	    $tPayload = '{"endereco":"lauro oscar diefenthaeler","tel":"51 3561-8797","numero":"243","complemento":"0","id":"9","nome":"petiskeira","msg":"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum."}';

	    // Create the message content that is to be sent to the device. 
	    $tBody['aps'] = array ( 
			    'alert' => $tAlert, 
			    'badge' => $tBadge, 
			    'sound' => $tSound, 
	    	);

	    $tBody ['payload'] = $tPayload;

	    // Encode the body to JSON. 
	    $tBody = json_encode ($tBody);

	    // Create the Socket Stream. 
	    $tContext = stream_context_create ();

	    stream_context_set_option ($tContext, 'ssl', 'local_cert', $tCert);

	    // Remove this line if you would like to enter the Private Key Passphrase manually. 
	    stream_context_set_option ($tContext, 'ssl', 'passphrase', $tPassphrase);

	    // Open the Connection to the APNS Server. 
	    $tSocket = stream_socket_client ('ssl://'.$tHost.':'.$tPort, $error, $errstr, 30, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $tContext);

	    // Check if we were able to open a socket. 
	    if (!$tSocket) 
	    	exit ("APNS Connection Failed: $error $errstr" . PHP_EOL);

	    // Build the Binary Notification.

	    $tMsg = chr (0) . chr (0) . chr (32) . pack ('H*', $tToken) . pack ('n', strlen ($tBody)) . $tBody;

	    // Send the Notification to the Server.

	    $tResult = fwrite ($tSocket, $tMsg, strlen ($tMsg));

	    if ($tResult) { 
	    	echo 'Delivered Message to APNS' . PHP_EOL; 
	    } else {
	    	echo 'Could not Deliver Message to APNS' . PHP_EOL;
	    } 

	    // Close the Connection to the Server. 
	    fclose ($tSocket);
	}

	protected function spell_number($input) {
		$f = new \NumberFormatter("en", NumberFormatter::SPELLOUT); 
        $number = explode('.', $input);
        $output = $f->format($number[0]) . ' and ' . $f->format($number[1]) . ' cent'; 
        return ucwords($output);
	}

	protected function update_sale_order_progress($sale_job_child_id, $status) {
		// Update sale order progress
 		$this->loadModel('Saleorder');
 		$progress = $this->Saleorder->updateAll(
 			array(
 				'SaleOrder.progress' => "'".$status."'"
 				),
 			array(
 				'SaleOrder.sale_job_child_id' => $sale_job_child_id
 				)
 			);
 		if($progress) {
 			return true;
 		}
 		return false;
	}

	public function afterFilter() {
		//$this->Session->renew();
	}

	private function check_designation() {
		$user_id = $this->Session->read('Auth.User.id');
		$group_id = $this->Session->read('Auth.User.group_id');
		
	}

	
	private function check_group() {
		$this->theme = 'Default';  
		if (!isset($this->request->params['admin']) && Configure::read('Site.status') == 0){
			$this->theme = 'Default';
			$this->layout = 'maintenance';
			$this->set('title_for_layout', __('Site down for maintenance'));
		} else {
			$this->theme = 'Default';
			$this->layout = 'admin';
			$this->set('title_for_layout', __('Admin'));
		} 

		if ($this->params['plugin'] == 'acl') {
			$this->theme = 'Default';
			$this->layout = 'acl';
		}

		if ($this->request->is('ajax')) {
			$this->theme = 'Default';
			$this->layout = 'ajax';
		}   
	}

	private function __get_notification($user_id, $limit = NULL) {
		$this->loadModel('Notification');
		$condition = array();
		
		$condition['conditions']['Notification.user_id'] = $user_id;
		$condition['conditions']['Notification.status'] = 0;
		$condition['order']['Notification.id'] = 'DESC';

		if($limit != NULL) {
			$condition['limit'] = 10; 
		} 
		$Notification = $this->Notification->find('all', $condition);
		return $Notification;
	}

	protected function _insert_notification($data = array()) {
		$this->loadModel('Notification'); 
		$this->Notification->Create();
		$data = array(
			'user_id' => $data['user_id'],
			'body' => $data['body'],
			'created' => date('Y-m-d H:i:s'),
			'status' => 0,
			'type' => $data['type'],
			'link' => $data['link']
			);
		return $this->Notification->save($data);
	}

	protected function generate_code($prefix, $number) {
		$str_pad = Configure::read('Site.str_pad');
		$num = str_pad($number, $str_pad, 0, STR_PAD_LEFT);
		return $prefix . $num;
	}

	protected function send_email($data = array()) {
		$Email = new CakeEmail('default'); 
		$Email->from(array(Configure::read('Site.email') => 'RPS Auto Reply'));
		$Email->to(array($data['to'])); 
		$Email->subject($data['subject']); 
		$Email->emailFormat('html');
		$Email->template($data['template'])->viewVars($data['content']); 
		return $Email->send(); 
	}

	protected function insert_log($user_id, $name, $link, $type) {
		$this->loadModel('UserLog');
		$this->UserLog->create();
		$log = array(
			'name' => $name,
			'link' => $link,
			'created' => $this->date,
			'user_id' => $user_id,
			'type' => $type,
			'ip' => $this->request->clientIp(),
			'user_agent' => $this->request->header('User-Agent')
			);
		if($this->UserLog->save($log)) {
			return true;
		} else {
			return false;
		}
	}
 
}
