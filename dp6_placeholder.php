<?php

chdir('/home/silas/app/cms/');//注释掉或者改为你自己的站的目录
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

/*
$tids;  // An array of term IDs
$type; // string identifying a content type.
$args = array_merge($tids, array($type));

$r = db_query("SELECT nid FROM {term_node} WHERE tid IN (".db_placeholders($tids, 'int').") AND type='%s'", $args);
 */
/*
$tids = array(234,3423,423,23);

//$sql = "SELECT nid FROM {term_node} WHERE tid IN (".db_placeholders($tids, 'varchar').")";
$sql = "SELECT nid FROM {term_node} WHERE tid IN (".db_placeholders($tids, 'int').")";
print $sql;
 */

$all_nid = array(1,34,23,42,345,2344,523);
$sql_lang = 'select nid, language from {node} where nid in (' . db_placeholders($all_nid, 'int') . ')';
$src_lang = db_query($sql_lang, $all_nid);
while( $nid_lang = mysql_fetch_array($src_lang)){
    print_r($nid_lang);
}

?>
