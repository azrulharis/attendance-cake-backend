<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Notification email template</title>
</head>
<body>
    <div style="width:100%; margin:0px auto; text-align:left;">
      <img src="<?php echo PUBLIC_URL.'img/'.Configure::read('Site.logo'); ?>" alt=" <?php echo Configure::read('Site.title')?>">
     
        <div style="padding-top:10px; font:16px/24px Arial, Helvetica, sans-serif;">
       		<p>Dear <?php echo $username; ?>,</p>
       		<p>Your material requested (<?php echo $mrn_number; ?>) is ready to collect from store.</p>
       		<p><?php echo $note; ?></p>
       		<p>Thank You</p>
       		<p><?php echo Configure::read('Site.title')?></p>
	    </div>
    </div>
</body>
</html>

