<?php
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