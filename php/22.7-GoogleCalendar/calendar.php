<?php 

if(!isset($title))
{
	$title = 'Calendar of Events';
	$keywords = "test, testing, acceptance, specification, example, calendar";
	$description = "A google calendar with events that are workshops from specification by example that uses the bootstrap " .
			"framework, a google calendar and a contact form";
	$project = 'Specification By Example';
	include('_layout.php');
	return;
}


?>
<iframe
	src="https://www.google.com/calendar/embed?title=Dream%20Cottage&amp;showTitle=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=lkp1nur6bhk6k9tb2rfqar0t2g%40group.calendar.google.com&amp;color=%232952A3&amp;src=en.canadian%23holiday%40group.v.calendar.google.com&amp;color=%23691426&amp;ctz=America%2FToronto"
	style="border-width: 0" width="800" height="600" frameborder="0"
	scrolling="no"></iframe>
