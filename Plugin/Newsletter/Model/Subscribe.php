<?php
App::uses('NewsletterAppModel', 'Subscribe.Model');
/**
 * Post Model
 *
 * @property User $User
 */
class Subscribe extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	//public $displayField = 'title';
	//public $name = 'Subscribe';
	
    public $virtualFields = array(    
    'vname' => 'CONCAT(Subscribe.email, " [",Subscribe.name,"] ")'
   );

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please fill the name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please fill the email',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'email' => array(
        		'rule' => array('email', true),
        		'message' => 'Please enter a valid email address'
   			 ),
			 'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'This email already exists', 
			),
			/*'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'email already exist.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),*/
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
	
	 function import($filename) {
        // to avoid having to tweak the contents of
        // $data you should use your db field name as the heading name
        // eg: Post.id, Post.title, Post.description
 
        // set the filename to read CSV from
        $filename = $filename;
        
        // open the file
	    $handle = fopen($filename, "r");
         
        // read the 1st row as headings
       //$header = fgetcsv($handle);
      	$header = array('name','email','phone');
	  
        // create a message container
        $return = array();
 
        // read each data row in the file
		$i = 0;
		$saved = 0;
		$failed = 0;
		while (($row = fgetcsv($handle)) !== FALSE) {
            $i++;
            if($i != 1)
			{
				$data = array();
				// for each header field
				foreach ($header as $k=>$head) {
					// get the data field from Model.field
					if (strpos($head,'.')!==false) {
						$h = explode('.',$head);
						$data[$h[0]][$h[1]]=(isset($row[$k])) ? $row[$k] : '';
					}
					// get the data field from field
					else {
						$data['Subscribe'][$head]=(isset($row[$k])) ? $row[$k] : '';
					}
				}
				// see if we have an id            
				$id = isset($data['Subscribe']['id']) ? $data['Subscribe']['id'] : 0;
			
				// we have an id, so we update
				if ($id) {
					// there is 2 options here,
					// option 1:
					// load the current row, and merge it with the new data
					//$this->recursive = -1;
					//$post = $this->read(null,$id);
					// $data['Post'] = array_merge($post['Post'],$data['Post']);
					// option 2:
					// set the model id
					$this->id = $id;
				}
				// or create a new record
				else {
					$this->create();
				}
				
				$this->set($data);
				// save the row
				$return['data'][] = $data; 
				if (!$this->save($data) && !$this->validates()) {
					$failed++;
				}
	 			else
				{
					$saved++; 
				}
			}
 		}
		
		$return['saved'] = $saved;
		$return['failed'] = $failed;
        // close the file
        fclose($handle);
     
        // return the messages
        return $return;
         
    }
}
