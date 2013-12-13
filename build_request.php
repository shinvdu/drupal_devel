<?php

chdir('/home/silas/app/cms');//注释掉或者改为你自己的站的目录
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
$call_query = db_query('SELECT * FROM {woger_actions_call}');
while($call = mysql_fetch_array($call_query)){
    print _woger_actions_build_up_request($call)."\n";
}
?>
