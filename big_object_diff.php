<?php

chdir('/home/silas/app/cms/');//注释掉或者改为你自己的站的目录
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

function woger_array_recursive_diff($aArray1, $aArray2) {
    $aReturn = array();

    foreach ($aArray1 as $mKey => $mValue) {
        if (is_array($mValue) || is_object($mValue)) {

            if ( is_array( $aArray2 ) ) {
                $aRecursiveDiff = woger_array_recursive_diff($mValue, $aArray2[$mKey]);
            } else {
                $aRecursiveDiff = woger_array_recursive_diff($mValue, $aArray2->$mKey);
            }

            if (count($aRecursiveDiff)) { $aReturn[$mKey] = $aRecursiveDiff; }

        } else {
            if ( is_array( $aArray2 ) ) {
                if ($mValue != $aArray2[$mKey]) {
                    $aReturn[$mKey] = $mValue;
                }
            } else {
                if ($mValue != $aArray2->$mKey) {
                    $aReturn[$mKey] = $mValue;
                }
            }

        }

    }

    return $aReturn;
}


?>
