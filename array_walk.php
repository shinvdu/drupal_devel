<?php

chdir('/home/silas/app/cms/');//注释掉或者改为你自己的站的目录
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

//$tian = theme_get_registry();
print_r(theme_get_registry());
/*
 *print_r($tian);
 *function bao($values){
 *    print_r($values);
 *}
 *
 *print_r($tian);
 */
//array_walk($tian,'bao');

?>
