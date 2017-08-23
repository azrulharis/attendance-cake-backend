<?php

/*
Email Template placeholders
*/
Configure::write('newsletter.Placeholder',array(
									  'Config'=>array(
											'Site.name'=>array('placeholder'=>'#SITENAME#','guideline'=>'Site name can display with this placeholder.'),
											'Site.link'=>array('placeholder'=>'#SITELINK#','guideline'=>'Site link can display with this placeholder.'),
											'Site.admin_email'=>array('placeholder'=>'#ADMINEMAIL#','guideline'=>'Admin email can display with this placeholder.'),
											'Site.support_email'=>array('placeholder'=>'#SUPPORTEMAIL#','guideline'=>'Support email can display with this placeholder.'),
											'Site.company_address'=>array('placeholder'=>'#SITEADDRESS#','guideline'=>'Site address can display with this placeholder.')
											),
									   'Generate'=>array(
											'site_logo'=>array('placeholder'=>'#SITELOGO#','guideline'=>'Site logo can display with this placeholder.'),
											),
										'Subscribe'=>array(
												'name'=>array('placeholder'=>'#USERNAME#','guideline'=>'Subscribe user email can display with this placeholder.')
											)
									)
				);



?>