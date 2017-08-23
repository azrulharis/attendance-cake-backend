<?php
/**
 *
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */
?>
<?php
  echo $this->Html->meta('icon');
  echo $this->Html->css(array(
    '/vendors/print/print_2.css',
    '/vendors/print/bootstrap.min.css',
    
  ));  
  echo $this->fetch('meta');
  echo $this->fetch('css'); 
?>

<?php echo $this->fetch('content'); ?>
<?php
      echo $this->Html->script(array(
        '/vendors/jquery/dist/jquery.min.js',
        '/vendors/bootstrap/dist/js/bootstrap.min.js',
        '/vendors/fastclick/lib/fastclick.js',
        '/vendors/nprogress/nprogress.js',
        '/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
        '/build/js/custom.min.js',
        '/vendors/jquery_UI/jquery-ui.min.js',
        '/vendors/jquery_UI/jquery-ui-timepicker-addon.js'
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
<style type="text/css">

.page {
  size: a4;
}
.page :left {
  margin-left: 0.5cm;
}
.page :right {
  margin-left: 0.5cm;
}
h1 {
  page-break-before: always;
}
h1, h2, h3, h4, h5 {
  page-break-after: avoid;
}
table, figure, .footer {
  page-break-inside: avoid;
}
.footer{
 
  margin-top: -70px;
  position: relative;

}
.book {
    page-break-before: always;
    
}
#page-number{
  counter-increment: mukasurat
}
#page-number:after {
    bottom: 0px;
    
    content: "Page " counter(mukasurat);

}
.page-break{
    page-break-before:always;
}
.front{

  padding-top: 250px;
  bottom: 0px;
}
.last{

  padding-top: 785px;
  bottom: 0px;
}
</style>





