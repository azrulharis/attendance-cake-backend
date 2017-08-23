<!DOCTYPE html>
<html lang="en">
  <head>
<?php
  echo $this->Html->meta('icon');
  echo $this->Html->css(array(
    '/vendors/print/bootstrap.min.css?v=12',   
    '/build/css/printing.css?v=12', 
  ));  
  echo $this->fetch('meta');
  echo $this->fetch('css'); 
?>
</head> 
  <body>  
<?php echo $this->fetch('content'); ?>
  </body> 
 <?php
      echo $this->Html->script(array( 
        '/vendors/jquery/dist/jquery.min.js',
        '/vendors/bootstrap/dist/js/bootstrap.min.js' 
      ));
    ?>     


<script type="text/javascript">
 

$(document).ready(function() {
  window.print();

    var afterPrint = function() {
        window.history.back();
    };

    if (window.matchMedia) {
        var mediaQueryList = window.matchMedia('print');
        mediaQueryList.addListener(function(mql) {
            if (mql.matches) {
                beforePrint();
            } else {
                afterPrint();
            }
        });
    }
    window.onafterprint = afterPrint; 

 });
</script>
