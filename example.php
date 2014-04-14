<?php 

include 'BR.Waves.class.php';

//for city id 233
$waves = new BR_Waves(233);

//current day
var_dump($waves1->today()); 

//tomorrow
var_dump($waves1->tomorrow()); 

//week
var_dump($waves1->week()); 

//2 days
var_dump($waves1->for_days(2)); 


 ?>