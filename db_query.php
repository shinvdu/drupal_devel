<?php

chdir('/home/silas/app/cms/');//注释掉或者改为你自己的站的目录
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
$aid = 30;
$attribute_name = db_query('select attribute_name from {woger_workflow_attributes} where attribute_id = %d limit 1', $aid);
$xie = mysql_num_rows($attribute_name);
exit(print($xie));
if ($attribute_name ) {
    exit('yes');
}else{
    exit('no');
}
/*
$tian = mysql_fetch_row($attribute_name);
if (empty($tian)) {
    exit('yes');
}else{
    exit('no');
}
 */
die(print_r(mysql_fetch_row($attribute_name)));

?>
