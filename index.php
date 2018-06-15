<?

	require 'steamauth/steamauth.php';
	require 'steamauth/userInfo.php';

	if(isset($_SESSION['steamid']))
	{
		$id = $_SESSION['steamid'];

	}
	else{

		#not logged in

	}


?>




<html>
<header><title>This is title</title></header>
<body>
DotaDrafter version 0.1
</body>


<? 

	//search_Words
	$match_id = "";
	$homepage = "";
	$radiant_win = "";
	$match_ids = [];



	function add_string_to_array($array, $string){

		array_push($array, $string);

		return $array;
	}


	function look_for_string($word, $text)
	{
		if (strpos($text, $word) !== false) {
		    echo $text[55] + $text[56] + $text[57];
		} 
		else {
		    echo 'false';
		} 	
	}



	#dictionary of top500 ranked players
	$array2 = [
    "paparazi" => 137193239,
    "california" => 181716137,
    "sufail" => 111620041,
    "xxs" => 129958758,
    "limppp" => 12231202,
    "abed" => 154715080,
    "limpp" => 12231202,
    "costabile" => 86822085,
    "muchaaa" => 282359850,
    "monster" => 86975889,
    "palantimos" => 116881520,
    "crystallize" => 114619230,
    "evad" => 92214321,
    "maybe" => 106863163,
    "alacrity" => 118233883,
    "forev" => 88933594,
    "greedtoovercomemyweak" => 359068880,
    "blank" => 194818271,
    "ramzess" => 132851371,
    "ori" => 107803494,
    "bty" => 156745021,
    "chessie" => 172424257,
    "kpii" => 87012746,
    "cendoll" => 156328257,
    "kaka" => 139876032
	];

	$array = [
    "sufail" => 111620041,
    "kaka" => 139876032
	];



	
	foreach($array as $key=>$value) {
	    $account_id =  $array[$key];

	    $url_string = "https://api.steampowered.com/IDOTA2Match_570/GetMatchHistory/V001/?format=json&key=6BBA3821AD660B398F38F86552FCE117&account_id=".$account_id;

	    $homepage = $homepage.file_get_contents($url_string);
 
	}


	
	while(strpos($homepage, "match_id", $offset)!==false){

		$match_id_str = "";

		$str_index = strpos($homepage, "match_id",$offset);

		for ($x = 10; $x <= 16; $x++) {
		    $match_id_str = $match_id_str.$homepage[$str_index+$x];
		}
		
		$string = $homepage[$str_index];
		array_push($match_ids, $match_id_str);
		//+1 so the algorithm does not find the same string again
		$offset = $str_index+1;

		

		

	}	

	for($i=0; $i<sizeof($match_ids); $i++){


		echo $match_ids[$i]."<br>";
	

	}

	
	
	for($i=0; $i<2; $i++){

		$match_details = "";
		$radiant_win = "";

		$match_details_str = "https://api.steampowered.com/IDOTA2Match_570/GetMatchDetails/v1/?key=6BBA3821AD660B398F38F86552FCE117&match_id=".$match_ids[$i];

		$match_details = file_get_contents($match_details_str);

		echo $match_details."<br>";
		echo "who wins? <br>";
		echo $match_details[strpos($match_details, "radiant_win")+13]."<br>";



	
	}

	



 	if(isset($_SESSION['steamid'])) {?>
		<li class="dropdown">
		   <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="img-rounded" src="<?=$steamprofile['avatar'];?>"> <b><?=$steamprofile['personaname'];?></b><b class="caret"></b></a>
		   <span class="dropdown-arrow"></span>
		   <ul class="dropdown-menu">
		   <li><a href="https://www.lifewire.com/how-to-test-a-suspicious-link-without-clicking-it-2487171"> Option 1 </a></li>
		   <li><a href="https://api.steampowered.com/IDOTA2Match_570/GetMatchHistory/V001/?format=json&key=6BBA3821AD660B398F38F86552FCE117&skill=1&min_players=10&matches_requested=101&account_id=12231202"> GetMatchHistory </a></li>
		   <li><a href="https://api.steampowered.com/IDOTA2Match_570/GetMatchHistoryBySequenceNum/v1/?key=6BBA3821AD660B398F38F86552FCE117"> Option 3 </a></li>
		   <li><a href="https://api.steampowered.com/IDOTA2Match_570/GetMatchDetails/v1/?key=6BBA3821AD660B398F38F86552FCE117&match_id=3952121010"> Get Match Details </a></li>
		   <li class="divider"></li>
		   <li><a href="steamauth/logout.php">Logout</a></li>
		   </ul>
		   </li>﻿
<? } else {?>
		<li><a href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>
<? } ?>

<?



		
	






	





?>

<div>
	<?echo loginbutton();?>

</div>


</html>