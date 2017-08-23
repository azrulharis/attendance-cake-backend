<?php /*
Email Template placeholders
*/
Configure::write('Placeholder',array('User'=>array(
											'username'=>array('placeholder'=>'#USERNAME#','guideline'=>'Username can display with this placeholder.'),							
											'firstname'=>array('placeholder'=>'#FIRSTNAME#','guideline'=>'Firstname can display with this placeholder.'),
											'lastname'=>array('placeholder'=>'#LASTNAME#','guideline'=>'Lastname can display with this placeholder.'),
											'mobile_number'=>array('placeholder'=>'#MOBILENUMBER#','guideline'=>'Mobile number can display with this placeholder.'),
											'password'=>array('placeholder'=>'#PASSWORD#','guideline'=>'password can display with this placeholder.'),
											'tree_placeholder'=>array('placeholder'=>'#TREEPLACEHOLDER#','guideline'=>'User placeholder (Ie: MBG-T1-001) can display with this placeholder.')
									  	),
									  'Config'=>array(
											'Site.name'=>array('placeholder'=>'#SITENAME#','guideline'=>'Site name can display with this placeholder.'),
											'Site.link'=>array('placeholder'=>'#SITELINK#','guideline'=>'Site link can display with this placeholder.'),
											'Site.admin_email'=>array('placeholder'=>'#ADMINEMAIL#','guideline'=>'Admin email can display with this placeholder.'),
											'Site.support_email'=>array('placeholder'=>'#SUPPORTEMAIL#','guideline'=>'Support email can display with this placeholder.'),
											'Site.company_address'=>array('placeholder'=>'#SITEADDRESS#','guideline'=>'Site address can display with this placeholder.')
											),
									   'Generate'=>array(
											'activation_link'=>array('placeholder'=>'#ACTIVATIONLINK#','guideline'=>'Activation link can display with this placeholder.'),
											'site_logo'=>array('placeholder'=>'#SITELOGO#','guideline'=>'Site logo can display with this placeholder.'),
											'login_link' =>array('placeholder'=>'#LOGINLINK#','guideline'=>'Login link can display with this placeholder.'),
											'register_link' =>array('placeholder'=>'#REGESTERLINK#','guideline'=>'Registration link can display with this placeholder.')
											),
										'Contact'=>array(
											'name'=>array('placeholder'=>'#NAME#','guideline'=>'Contact user name can display with this placeholder.'),
											'email'=>array('placeholder'=>'#EMAIL#','guideline'=>'Contact user email can display with this placeholder.'),
											'message'=>array('placeholder'=>'#MESSAGE#','guideline'=>'Contact user message can display with this placeholder.')
											),
										'Subscribe'=>array(
												'name'=>array('placeholder'=>'#USERNAME#','guideline'=>'Subscribe user email can display with this placeholder.')
											),
									
									)
				);
				?>