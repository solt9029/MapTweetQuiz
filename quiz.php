<?php
	error_reporting(E_ALL);
	require_once("config.php");//TwitterAPIキー情報を読み込む

	require "vendor/autoload.php";
	use Abraham\TwitterOAuth\TwitterOAuth;
	$connection=new TwitterOAuth(API_KEY,API_SECRET,ACCESS_TOKEN,ACCESS_TOKEN_SECRET);

	$people=array(
		"Canada"=>array(
			array("Avril Lavigne","AvrilLavigne"),
			array("Justin Bieber","justinbieber"),
			array("Celine Dion","celinedion"),
			array("Jim Carrey","JimCarrey")
		),
		"America"=>array(//後からアメリカ人に直す
			array("Donald Trump","realDonaldTrump"),
			array("Taylor Swift","taylorswift13"),
			array("Tom Cruise","TomCruise"),
			array("McDonald's","McDonalds")
		),
		"Japan"=>array(//後から日本人に直す
			array("有吉弘行","ariyoshihiroiki"),
			array("松本人志","matsu_bouzu"),
			array("西野カナ","kanayanofficial"),
			array("小泉純一郎","J_Koizumi_Japan")
		)
	);

	$country="";

	if(isset($_GET["country"])){
		$country=$_GET["country"];
	}

	$tweets=array();

	$person=$people[$country][rand(0,3)];
	$tweets=$connection->get("statuses/user_timeline",array(
			"screen_name"=>"@".$person[1],
			"count"=>"5"
	));

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>MapTweetQuiz</title>
</head>
<body>
	<?php
		foreach($tweets as $tweet){
			echo $tweet->text;
			echo "<br>";
		}
	?>
</body>
</html>