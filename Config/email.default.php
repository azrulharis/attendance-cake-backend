<?php

/**

*

*

* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)

* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)

*

* Licensed under The MIT License

* For full copyright and license information, please see the LICENSE.txt

* Redistributions of files must retain the above copyright notice.

*

* @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)

* @link http://cakephp.org CakePHP(tm) Project

* @package app.Config

* @since CakePHP(tm) v 2.0.0

* @license http://www.opensource.org/licenses/mit-license.php MIT License

*/


 




/**

* This is email configuration file.

*

* Use it to configure email transports of CakePHP.

*

* Email configuration class.

* You can specify multiple configurations for production, development and testing.

*

* transport => The name of a supported transport; valid options are as follows:

* Mail - Send using PHP mail function

* Smtp - Send using SMTP

* Debug - Do not send the email, just return the result

*

* You can add custom transports (or override existing transports) by adding the

* appropriate file to app/Network/Email. Transports should be named 'YourTransport.php',

* where 'Your' is the name of the transport.

*

* from =>



* The origin email. See CakeEmail::from() about the valid values



*



*/



class EmailConfig {


public $test = array(
    'log' => true
);
 

public $default = array( 

  'transport' => 'Mail', 

);

public $smtp = array( 
  'host' => 'ssl://smtp.gmail.com',
  'port' => 587,
  'username' => 'email@domain.com',
  'password' => 'password',
  'mailtype' => 'html',
  'timeout' => 30,
  'wordwrap' => TRUE,
  'transport' => 'Smtp',
  'log' => false
);

/*
public $smtp = array(
  'host' => '193.9.200.1',
  'port' => 25,
  'username' => 'noreply@mytsg.com.my',
  'password' => 'ten@g@1234',
  'mailtype' => 'html',
  //'wordwrap' => TRUE,
  //'transport' => 'Smtp'
);
*/

 

public $fast = array( 
'from' => '',  
'sender' => '',  
'to' => null, 
'cc' => null, 
'bcc' => null, 
'replyTo' => null, 
'readReceipt' => null, 
'returnPath' => null,



'messageId' => true,



'subject' => null,



'message' => null,



'headers' => null,



'viewRender' => null,



'template' => false,



'layout' => false,



'viewVars' => null,



'attachments' => null,



'emailFormat' => null,



'transport' => 'Smtp',



'host' => 'localhost',



'port' => 25,



'timeout' => 30,



'username' => 'user',



'password' => 'secret',



'client' => null,



'log' => true,



);



}