<?php
//month Range
function rangeMonth($datestr) {
date_default_timezone_set(date_default_timezone_get());
$dt = strtotime($datestr);
$res['start'] = date('Y-m-d', strtotime('first day of this month', $dt));
$res['end'] = date('Y-m-d', strtotime('last day of this month', $dt));
return $res;
}
//week range
function rangeWeek($datestr) {
date_default_timezone_set('America/Chicago');
$dt = strtotime($datestr);
$res['start'] = date('N', $dt)==1 ? date('Y-m-d', $dt) : date('Y-m-d', strtotime('last sunday', $dt));
$res['end'] = date('N', $dt)==7 ? date('Y-m-d', $dt) : date('Y-m-d', strtotime('next saturday', $dt));
return $res;
}
?>