<?php
error_reporting(0);
$web=$_POST['web'];
$ui=$_POST['ui'];
$grafik=$_POST['grafik'];
$sunucu=$_POST['sunucu'];
// kısalinkler
$grafiklink="diger/grafik.php";
$weblink="diger/web.php";
$uilink="diger/ui.php";
$sunuculink="diger/sunucu.php";
// kod cevap
if ($web && $ui & $grafik & $sunucu) {
    include_once $uilink;
    include_once $grafiklink;
    include_once $sunuculink;
    include_once $weblink;
}
else if ($web && $ui & $grafik) {
    include_once $uilink;
    include_once $grafiklink;
    include_once $sunuculink;

}
else if ($sunucu && $ui & $grafik) {
    include_once $uilink;
    include_once $sunuculink;
    include_once $grafiklink;

}
elseif ($web && $ui && $sunucu) {
    include_once $weblink;
    include_once $uilink;
    include_once $sunuculink;
}
else if ($web && $ui) {
    include_once $weblink;
    include_once $uilink;

}
else if ($web && $grafik) {
    include_once $weblink;
    include_once $grafiklink;

}
else if ($web && $sunucu) {
    include_once $weblink;

}
else if ($ui && $grafik) {
    include_once $uilink;
    include_once $grafiklink;

}
else if ($ui && $sunucu) {
    include_once $uilink;
    include_once $sunuculink;

}
else if ($grafik && $sunucu) {
    include_once $grafiklink;
    include_once $sunuculink;

}
else if ($web) {
    include_once $weblink;
}
else if ($ui) {
    include_once $uilink;
}
else if ($grafik) {
    include_once $grafiklink;
}
else if ($sunucu) {
    include_once $sunuculink;
}
else{
    include_once $weblink;
    include_once $sunuculink;
    include_once $grafiklink;
    include_once $uilink;
}
?>