<?php
chdir('/home/silas/app/cms/');//change to drupal root
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

$sql = 'select td.name, ac.* from {term_data} td inner join {woger_amazon_categories_nid} ac on td.tid = ac.term_id where td.vid=9 order by td.tid, ac.language';
$result = db_query($sql);
$recored = array();
while($item = mysql_fetch_array($result)){
    if (isset($temp) && $item['term_id'] == $temp['term_id'] && $item['language'] == $temp['language']){
        if (!isset($recored[$item['term_id'].'-'.$item['language']])) {
            $recored[$item['term_id'].'-'.$item['language']][] = $temp;
        }
        $recored[$item['term_id'].'-'.$item['language']][] = $item;
    }
    $temp = $item;
}
$output = array();
$amazon_categories = all_amazon_category();
foreach ($recored as  $group) {
    $output[] = array(
        'term_id' => '-----',
        'term_name' => '-----',
        'amazon_categary_id' => '-----',
        'amazon_categary_name' => '-----',
        'language' => '-----',
        'url' => '-----',
    );
    foreach ($group as $single) {
        $output[] = array(
            'term_id' => $single['term_id'],
            'term_name' => $single['name'], 
            'amazon_categary_id' => $single['woger_amazon_categories_id'],
            'amazon_categary_name' => $amazon_categories[$single['woger_amazon_categories_id']]['name'],
            'language' => $single['language'],
            'url' => 'woger_amazon?term='.$single['term_id']. '&lang=' . $single['language'],
        );

    }
}

array_to_csv_download($output,'export.csv',',');

function array_to_csv_download($array, $filename = "export.csv", $delimiter=";") {
    $f = fopen('php://memory', 'w'); 
    foreach ($array as $line) { 
        fputcsv($f, $line, $delimiter); 
    }
    fseek($f, 0);
    header('Content-Type: application/csv');
    header('Content-Disposition: attachement; filename="'.$filename.'"');
    fpassthru($f);
}

function all_amazon_category(){
    $sql = 'select * from {woger_amazon_categories}';
    $categories = array();
    $result = db_query($sql);
    while($item = mysql_fetch_array($result)){
        $categories += array(
            $item['amazon_id'] => $item,
        );
    }
    return $categories;
}
?>
