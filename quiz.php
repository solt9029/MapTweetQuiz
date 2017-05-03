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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="jumbotron-narrow.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<header class="jumbotron">
		<div class="container">
			<h1>MapTweetQuiz</h1>
			<p></p>
		</div>
	</header>
	<div class="container">
		<h1>有名人のツイート一覧</h1>
		<table class="table">
		<?php
			foreach($tweets as $tweet){
				echo "<tr><td>";
				echo $tweet->text;
				echo "</td></tr>";
			}
		?>
		</table>
		<form action="judge.php" method="post">
			<?php echo "<input type='hidden' name='answer' value='".$person[0]."' >"; ?>
			<?php
				foreach($people[$country] as $person){
					echo "<div class='radio'>";
					echo "<input type='radio' name='account' value='".$person[0]."'>";
					echo $person[0];
					echo "</div>";
				}
			?>
			<input type="submit" class="btn btn-block btn-info" value="回答">
		</form>
	</div>
</body>
</html>