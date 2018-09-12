<!DOCTYPE html>
<html>
<head>
	<title>World of warcraft</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../assets/css/Apis.css">
</head>
<body id="warcraft">

	<div id="war">
		<?php
			error_reporting(0);
			$key="kwv7q2hqhrcm4nycbzmzu73w4fqcau86";

			/*Mediante el siguiente if se obtiene la informacion basica del nick gracias a la variable isset que permite determinar si una variable esta definida*/

			if (isset($_GET['informacion']) && isset($_GET['id'])) {
				$informacion= $_GET['informacion'];
				$id= $_GET['id'];


				/*Les recuerdo que la api_key tiene una duracion de un día*/
				$url="https://api.battlenet.com.cn/sc2/profile/".$id."/1/".$informacion."/?locale=zh_CN&apikey=".$key;

				if($json= file_get_contents($url)){
					/*Con el json decode se decodifica la informacion para poder mostrala de una manera mas organizada*/
					$datos= json_decode($json, true);

					echo "Datos basicos: "."<br>";
					echo "<br>"." ID: ". ($datos["id"])."<br>";
					echo " Nick: ". ($datos["displayName"])."<br>";
					echo " Nombre del equipo: ". ($datos["clanName"])."<br>";
					echo " Nivel: ". ($datos["swarmLevels"]["level"])."<br>";
					echo " Total Nivel XP: ". ($datos["swarmLevels"]["terran"]["totalLevelXP"])."<br>";
					echo " Total de Puntos: ". ($datos["achievements"]["points"]["totalPoints"])."<br>";
					echo " Liga 1 vs 1: ". ($datos["career"]["highest1v1Rank"])."<br>";
					echo " Liga Team: ". ($datos["career"]["highestTeamRank"])."<br>";
				}
				else{
					echo "El nick o el id no existen";
					exit();
				}
			}
		?>
	</div>
</body>
</html>