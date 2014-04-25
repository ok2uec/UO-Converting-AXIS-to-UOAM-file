<?php

//Convert Axis File to UOAM

function download($name, $type) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $name . '.' . $type . '"');
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    flush();
}

function check($www) {
    $input = file_get_contents($www);
    $exp = explode("[LOCATION]", $input);
    $count = count($exp) - 1;

    for ($i = 1; $i <= $count; $i++) {

        $ssaddvvvd = explode('SUBSECTION=', $exp[$i]);
        $ssaddvvff = explode('DESCRIPTION=', $ssaddvvvd[1]);

        $sadsadd = explode('DESCRIPTION=', $exp[$i]);
        $ssadddff = explode('POINT=', $sadsadd[1]);

        $sdaee = explode('POINT=', $exp[$i]);
        $sder = explode(' ', $sdaee[1]);
        $souradnice = explode(',', $sder[0]);

        echo '
+gate: ' . trim($souradnice[0]) . ' ' . trim($souradnice[1]) . ' ' . trim($souradnice[2]) . ' ' . trim($ssadddff[0]) . ' (' . trim($ssaddvvff[0]) . ')';
    }
}

download("AxisFileConverted", "map");
check($_GET["input"]);
?>
 
