#BR_Waves

Get Brazilian Waves info.

##How to discover city code

	http://servicos.cptec.inpe.br/XML/listaCidades?city=[CITYNAME]

**Example:**

	http://servicos.cptec.inpe.br/XML/listaCidades?city=sao paulo
	

##Create new instance

	$city_id = 233; //Maceio-AL
	$waves = new BR_Waves($city_id);
	

###Get info for current day

	$today = $waves->today();
	
###Get info for tomorow

	$tomorrow = $waves->tomorrow();
	
###Get info for next 5 days (week)

	$week = $waves->week();


###Get info for specific day

	//current day + 3
	$e_day = $waves->day(3);



###Get info for days

	//interval: current day + 3
	$for_days = $waves->for_days(3);


##Returns

###One result

Return one object with data, example:

![One Result](https://raw.githubusercontent.com/madeinnordeste/BR_Waves/master/extras/today.png "One Result")

* today()
* tomorrow()
* day()

	
###Multiple results

Return array with multiple objetcs, example:

![Multiple Result](https://raw.githubusercontent.com/madeinnordeste/BR_Waves/master/extras/2days.png "Multiple Result")

* for_days()
* week()




	

	


	