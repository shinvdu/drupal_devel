<?php
function test($logic = true){
    if ($logic) {
        return true;
    }else {
        return false;
    }
}
if (true && !test(true)) {
    echo 'yes';
}else {
    echo 'no';
}
?>
