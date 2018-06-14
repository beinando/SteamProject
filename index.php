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
Hello world
</body>


<? 



	#dictionary of top500 ranked players
	$array = [
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

	foreach($array as $key=>$value) {
	    $account_id =  $array[$key];
	    
	    
	}

	echo $array[0];
	echo "<br>";


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



	function add_string_to_array($array, $string){


		array_push($array, $string);



		return $array;
		


	}


	function look_for_string($word, $text)
	{

		if (strpos($text, $word) !== false) {
		    echo $text[55] + $text[56] + $text[57];
		} else {
		    echo 'false';
		}
		

    	
	}
    
	
    	

	$file = 'people.txt';
	$homepage = file_get_contents("https://api.steampowered.com/IDOTA2Match_205790/GetMatchHistory/v1/?key=6BBA3821AD660B398F38F86552FCE117&matches_requested=100");
	file_put_contents($file, $homepage);

	#file_put_contents($file, $homepage);

	look_for_string("match_id",$homepage);

	$offset = 0;

	$index1 = 0;
	

	for($pages = 0 ; $pages<3; $pages++){


		for ($x = 0; $x <= 100; $x++){

			

			if(strpos($homepage, "match_id", $offset+10)==false){

				
				
				break;
			}

			echo "hello mattse";

			$match_id_str = "";
			$index1  = strpos($homepage, "match_id", $offset+10);
			$offset = $index1;

			#10 to 16: this is the letters after the search-word "match_id"  (the actual number)
			for ($x = 10; $x <= 16; $x++) {
			    $match_id_str = $match_id_str.$homepage[$index1+$x];
			}

			echo "offset";
			echo "<br>";
			echo $offset;
			echo "<br>";
			echo "match_id_str";
			echo "<br>";
			echo $match_id_str;
			echo "<br>";





			
		}
		echo "<br>";
		echo "______________________________";
		echo "<br>";

		$cmd_url  = "https://api.steampowered.com/IDOTA2Match_570/GetMatchHistory/v1/?key=6BBA3821AD660B398F38F86552FCE117&start_at_match_id=3952121001";

		
		echo "cmd_url: ";
		echo "<br>";
		echo $cmd_url;


		$homepage = file_get_contents($cmd_url);
		echo $homepage;
		echo "<br>";
		file_put_contents($file, $homepage, FILE_APPEND);
	}


		
	






	





?>

<div>
	<?echo loginbutton();?>

</div>


</html>