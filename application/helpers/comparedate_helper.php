<?php

defined("BASEPATH") or exit('access denied');
if (!function_exists('compareFuncByDate')) {

    function compareFuncbyDate($a, $b) {
        $t1 = strtotime($a["Date"]);
        $t2 = strtotime($b["Date"]);

        return ($t2 - $t1);
    }

}
