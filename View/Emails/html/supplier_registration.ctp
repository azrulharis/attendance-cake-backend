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
       		<p>You have 1 new Supplier waiting for your review and approval.</p>
       		<p>Click link below for more info:</p>
          <p>Local Area Network : <a href="<?php echo Configure::read('Site.intranet'); ?><?php echo $link; ?>">View using LAN</a></p>
          <p>Internet : <a href="<?php echo Configure::read('Site.url'); ?><?php echo $link; ?>">View using internet</a></p> 
          <p>Thank You</p> 
          <p><a href="<?php echo Configure::read('Site.url'); ?>"><?php echo Configure::read('Site.title'); ?></a></p>
	    </div>
    </div>
</body>
</html>

