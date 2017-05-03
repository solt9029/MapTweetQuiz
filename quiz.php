<?php
error_reporting(E_ALL);
	require_once("config.php");//TwitterAPIキー情報を読み込む



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
	<meta charset="utf-8">
	<title>MapTweetQuiz</title>
</head>
<body>
	<?php
		foreach($tweets as $tweet){
			echo $tweet;
		}
		var_dump("aiueo");
	?>
</body>
</html>