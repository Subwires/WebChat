		<?php
			$host = "localhost";
			$user = "root";
			$pass = "";
			$db_name = "webchat";
			$connection = new mysqli($host,$user,$pass,$db_name);
			
			function formatDate($date){
				return date('g:i a', strtotime($date));
			}
			
			
			
			$query = "SELECT * FROM chat ORDER BY id ASC";
			$run = $connection->query($query);
			while($row = $run->fetch_array()) :
		?>
		<div id="chatinfo">
			<span style="color:green;"><?php echo $row['name']; ?>:</span>
			<span style="color:black;"><?php echo $row['message']; ?></span>
			<span style="float:right;font-style:italic;color:blue"><?php echo formatDate($row['date']); ?></span>
		</div>
		<?php endwhile;?>