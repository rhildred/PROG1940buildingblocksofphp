<?php 

date_default_timezone_set("America/Toronto");
$tNow = time();
printf("The time now is %s<br />", $tNow );

$aDate = getdate($tNow);
print_r($aDate);

printf("<br />The date and time now is %s", date("m/d/y g:i:s a e", $tNow));



?>