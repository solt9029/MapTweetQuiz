<?php
	require_once("config.php");//TwitterAPIキー情報を読み込む

	require "vendor/autoload.php";
	use Abraham\TwitterOAuth\TwitterOAuth;
	$connection=new TwitterOAuth(API_KEY,API_SECRET,ACCESS_TOKEN,ACCESS_TOKEN_SECRET);

	if(!isset($_GET["country"])){
		header("location:index.html");
	}
	if($_GET["country"]!=="Canada" && $_GET["country"]!=="America" && $_GET["country"]!=="Japan"){
		header("location:index.html");
	}

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
	<form action="judge.php" method="post">
		<?php echo "<input type='hidden' name='answer' value='".$person[0]."' >"; ?>
		<?php
			foreach($people[$country] as $person){
				echo "<input type='radio' name='account' value='".$person[0]."'>";
				echo $person[0];
				echo "<br>";
			}
		?>
		<input type="submit" value="回答">
	</form>
</body>
</html>