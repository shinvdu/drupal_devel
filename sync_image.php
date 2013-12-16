<?php
/*
 * log format
----------------------------------------------------------
status:
fid: 
path: /mntsd/sdlfj/lsjflj/jpg
dowload status:  success
store content status: success
----------------------------------------------------------

----------------------------------------------------------
status:
fid: 
path: sites/mntsd/sdlfj/lsjflj/jpg
dowload status: failed
         error:        
store   status:
         error:        
----------------------------------------------------------
 *
 */
set_time_limit(0);
$base_root = '/home/silas/app/cms-851';
$domain = 'http://cms.woger-cdn.com/';

$db = array(
    'database' => 'cms',
    'user' => 'root',
    'password' => 'H0tmail!8',
    'host' => 'localhost',
    'table' => 'wgr_drupal_files',
);

function create_dir($path){
    if (!file_exists($path)){
        create_dir(dirname($path));
        mkdir($path);
    }
}

function db_file_records($db){
    $db_conn = mysql_connect($db['host'],$db['user'], $db['password']);
    mysql_select_db($db['database']);
    $sql =<<<tian
select * from  {$db['table']}
tian;
    $db_result = mysql_query($sql);
    $return = array();
    while($item = mysql_fetch_array($db_result)){
        $return[] = $item;
    }
    return $return;
}

function retrieve_content($domain, $path){
    if (!file_exists($path)) {
        try{
            $image = file_get_contents($domain . $path);
        } 
        catch( Exception $e){
            print '****************' . $path . '**************************'."\n";
            print_r(
                array(
                    'path' => $path,  
                    'status' => 'download failed',
                    'message' => $e->getMessage(),
                )
            );
            print '-----------------------------------------------------------'."\n";
            $return = false;
        }

    }else {
        $return = false;
    }

    return $image ? $image : $return;
}
function put_contents(){
    // code...
}

/*
chdir($base_root);
foreach (db_file_records($db) as $recored) {
    $image = retrieve_content($domain, $recored['filepath']);
    if ($image) {
        create_dir(dirname($recored['filepath']));
        $status = file_put_contents($recored['filepath'], $image);
    }
}
 */

/*
test database
print_r(db_file_records($db));
 */
print_r(db_file_records($db));
