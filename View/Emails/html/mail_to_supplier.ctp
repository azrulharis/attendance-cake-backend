<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Supplier Registration - Tenaga Switchgear Sdn Bhd</title>
</head>
<body>
    <div style="width:100%; margin:0px auto; text-align:left;">
      <img src="<?php echo PUBLIC_URL.'img/'.Configure::read('Site.logo'); ?>" alt=" <?php echo Configure::read('Site.title')?>"> 
        <div style="padding-top:10px; font:16px/24px Arial, Helvetica, sans-serif;">
       		<p>Dear <?php echo $username; ?>,</p>
       		<p>Your supplier registration for <b><?php echo $name; ?></b> has been Approved by Procurement Department.</p>
       		<p>Your supplier code is: <?php echo $code; ?>. Please save for future refference.</p>
          
          <p>Thank You</p> 
          <p><a href="<?php echo Configure::read('Site.url'); ?>"><?php echo Configure::read('Site.title'); ?></a></p>
	    </div>
    </div>
</body>
</html>

