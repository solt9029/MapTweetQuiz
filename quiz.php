<?php
	require_once("config.php");//TwitterAPIキー情報を読み込む

	require 'TwistOAuth.phar';

	$people=array(
		"Canada"=>array(
			"Avril Lavigne"=>"AvrilLavigne",
			"Justin Bieber"=>"justinbieber",
			"Celine Dion"=>"celinedion",
			"Jim Carrey"=>"JimCarrey"
		),
		"America"=>array(//後からアメリカ人に直す
			"Avril Lavigne"=>"AvrilLavigne",
			"Justin Bieber"=>"justinbieber",
			"Celine Dion"=>"celinedion",
			"Jim Carrey"=>"JimCarrey"
		),
		"Japan"=>array(//後から日本人に直す
			"Avril Lavigne"=>"AvrilLavigne",
			"Justin Bieber"=>"justinbieber",
			"Celine Dion"=>"celinedion",
			"Jim Carrey"=>"JimCarrey"
		)
	);

	if(isset($_GET["country"])){
		$country=$_GET["country"];
	}

	$tweets=array();

	switch($country){
		case "America":
			//アメリカの有名人4人の中からランダムに選択する
			//$tweets変数にその人のツイートをランダムに取得する
			break;
		case "Japan":
			//日本の有名人4人の中からランダムに選択する
			//$tweets変数にその人のツイートをランダムに取得する
			break;
		case "Canada":
			//カナダの有名人4人の中からランダムに選択する
			//$tweets変数にその人のツイートをランダムに取得する
			break;
		default:
			break;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>MapTweetQuiz</title>
</head>
<body>
	<?php
		foreach($tweets as $tweet){
			echo $tweet;
		}
	?>
</body>
</html>