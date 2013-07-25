<?php 

$sJson='{"$t":1, "test":2}';

$oJson = json_decode($sJson);

print_r($oJson);

echo "<br /><br />the value of \$t is ", $oJson->{'$t'};



?>