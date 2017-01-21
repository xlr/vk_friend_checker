<?php         
require "au.php";
$u_id = '???'; //id usera
$log = "log_$u_id.txt";//файл куда будет идти сохранение id

$url2 = "http://site.com/$log"; // где лежит локальный файл со списком друзей
$url1 = "https://api.vk.com/method/friends.get?user_id=$u_id";

	$friends = file_get_contents($url1);
		$friends1 = json_decode($friends);
					//var_dump($friends1->response);
					//echo "<br> <br>";
	$friends2 = file_get_contents($url2);	
		$friends3 = json_decode($friends2);	
					//var_dump($friends3->response);
					//echo "<br> <br>";
					
	$result1 = array_diff($friends3->response, $friends1->response);
	echo "Удалила:<br>";
	if($result1 == null) {echo "никого!";} else 
	#{print_r($result1);}
		{
			$i=1;
			foreach ($result1 as $v) {
				echo "<a target=\"_blank\" href=\"http://vk.com/id$v\">$i - $v</a><br>";
			$i++;
			}
		}	
	echo "<br> <br>";
	$result2 = array_diff($friends1->response, $friends3->response);
	echo "Добавила:<br>";
	if($result2 == null) {echo "никого!";} else 
	#{print_r($result1);}
		{
			$i=1;
			foreach ($result2 as $v) {
				echo "<a target=\"_blank\" href=\"http://vk.com/id$v\">$i - $v</a><br>";
			$i++;
			}
		}	
?>

<br>
<form method="get">
	<input type="submit" name="submit" value="save" />
</form>
<a href="/index.php">Главная</a>
<?php

if($_GET['submit']){

	$file = fopen ($log, "w+");
	if (!$file){
		echo("ошибка открытия файла");
	}else{
		//foreach($friends1->response as $rec){
			fputs ($file, $friends."\n");
			
		//}
		echo "все ок, файл записан<br>";
	
	fclose ($file);	
	}
}

?>