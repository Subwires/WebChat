<!DOCTYPE html>

<html>
	<head>
		<title> Web chatroom</title>
	<link rel="stylesheet" href="style.css" media="all"/>
		<script>
			function ajax(){
				
				var  req = new XMLHttpRequest();
				req.onreadystatechange = function(){
					
					if (req.readyState == 4 && req.status == 200){
						document.getElementById('chat').innerHTML = req.responseText;
					}
					
				}
				req.open('GET','chat.php', true);
				req.send();
				
			}
			setInterval(function(){ajax()},1000);
		</script>
	</head>
	
<body onload="ajax()";>

<div id="container">
	<div id="chatbox">
		<div id="chat"></div>
	</div>
	
		<form method="post" action="index.php">
		<input type="text" name="name" placeholder="Enter your name"/>
		<textarea name="message" placeholder="Enter your message"></textarea>
		<input type="submit" name="submit" value="Send"/>
		<?php
			$host = "localhost";
			$user = "root";
			$pass = "";
			$db_name = "webchat";
			$connection = new mysqli($host,$user,$pass,$db_name);
			

		
		if (isset($_POST['submit'])){
			$name = $_POST['name'];
			$message = $_POST['message'];
			$query2 = "INSERT INTO chat (name,message) values ('$name', '$message')";
			$run = $connection->query($query2);
			
			if ($run){
				echo "<embed loop='false' src='chat.wav' hidden='true'/>";
			}
		}

		?>
		</form>
</div>




</body>
</html>
