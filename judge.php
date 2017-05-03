<?php
if(isset($_POST["answer"]) && isset($_POST["account"])){
	$answer=$_POST["answer"];
	$account=$_POST["account"];
	if($answer===$account){
		header("location:correct.html");
	}else{
		header("location:wrong.html");
	}
}else{
	header("location:index.html");
}