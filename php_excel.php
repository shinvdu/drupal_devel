<?php

function read_excel($file){
  require 'phpexcel/PHPExcel.php';
  $objReader = new PHPExcel_Reader_Excel5();
  $objReader->setReadDataOnly(true);
  $objPHPExcel = $objReader->load($file);

  $rowIterator = $objPHPExcel->getActiveSheet()->getRowIterator();
  $array_data = array();
  foreach($rowIterator as $row){
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
    $rowIndex = $row->getRowIndex();
    if(1 == $rowIndex || 2 == $rowIndex) continue;//skip first row
    // $array_data[$rowIndex] = array('A'=>'', 'B'=>'','C'=>'','D'=>'');
    foreach ($cellIterator as $i => $cell) {
      if($i === 0){
        $InvDate= $cell->getValue();

        $array_data[$rowIndex][]  = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($InvDate)); 
        continue;
      }else{
        $array_data[$rowIndex][] =  $cell->getCalculatedValue();
      }
      if (empty($array_data[$rowIndex][1]) && empty($array_data[$rowIndex][3]) && empty($array_data[$rowIndex][3])) {
        unset($array_data[$rowIndex]);
      }
    }
  }
  return $array_data;
}
