<?php
  /**
   * Export all member records in .xls format
   * with the help of the xlsHelper
   */
 
  //declare the xls helper
  //$xls= new XlsHelper();
  
  $xls= $this->Xls;
 
  //input the export file name
  $xls->setHeader('Subscribers_'.date('Y_m_d'));
 
  $xls->addXmlHeader();
  $xls->setWorkSheetName('Subscribe');
  
 //1st row for columns name
  $xls->openRow();
//$xls->writeString('Id');
  $xls->writeString('Name');
  $xls->writeString('email');
  $xls->writeString('Phone');
  $xls->closeRow();
   
  //rows for data
  foreach ($models as $model):
    $xls->openRow();
  //  $xls->writeNumber($model['Subscribe']['id']);
    $xls->writeString($model['Subscribe']['name']);
    $xls->writeString($model['Subscribe']['email']);
    $xls->writeString($model['Subscribe']['phone']);
    $xls->closeRow();
  endforeach;
  
  $xls->addXmlFooter();
  exit();
?> 