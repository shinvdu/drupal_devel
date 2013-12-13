<?php

chdir('/home/silas/app/cms');//注释掉或者改为你自己的站的目录
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
$data = array(
    'product_group_name'    => 'bsbsb',
    'product_group_roles'   => 3,
);

$result = drupal_write_record('woger_workflow_product_group', $data);
echo db_last_insert_id('woger_workflow_product_group', 'id');
/*
 *$sql = 'SELECT LAST_INSERT_ID()';
 *$id = mysql_fetch_row(db_query($result));
 *print_r($id);
 */
?>
