<!DOCTYPE html>
<html>
	<head>
		<style>
			body{
				font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
				background-color: #70a1ff;
			}
			table, td, th{
				border: 1px solid #30336b;
				width: 40%;
				text-align: center;
				border-collapse:collapse;
				background-color: #e66767;
				
			}
			table { margin: auto; }
		</style>
	</head>
	<body>
		
		<?php
			$servername = "remotemysql.com";
			$username = "yiDxTSfbwL";
			$password = "IyFDLfBOzJ";
			$dbname = "yiDxTSfbwL";
			$a=[];
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if ($conn->connect_error)
				die("Connection failed: " . $conn->connect_error);
			$sql = "SELECT * FROM student";
			$result = $conn->query($sql);
			echo "<br>";
			echo "<center> <strong>BEFORE SORTING</strong> </center>";
			echo "<table border='2'>";
				echo "<tr>";
					echo "<th>USN</th><th>NAME</th><th>Address</th></tr>"; 
					if ($result->num_rows> 0) {
						while($row = $result->fetch_assoc()) {
							echo "<tr>";
								echo "<td>". $row["usn"]."</td>";
								echo "<td>". $row["name"]."</td>";
								echo "<td>". $row["address"]."</td></tr>";
								array_push($a,$row["usn"]);
						}
					}
					else
						echo "Table is Empty";
			echo "</table>";
			$n=count($a);
			$b=$a;
			for ( $i = 0 ; $i< ($n - 1) ; $i++ ) {
				$pos= $i;
				for ( $j = $i + 1 ; $j < $n ; $j++ ) {
					if ( $a[$pos] > $a[$j] )
					$pos= $j;
				}
				if ( $pos!= $i ) {
					$temp=$a[$i];
					$a[$i] = $a[$pos];
					$a[$pos] = $temp;
				}
			}
			$c=[];
			$d=[];
			$result = $conn->query($sql);
			if ($result->num_rows> 0) {
				while($row = $result->fetch_assoc()) {
					for($i=0;$i<$n;$i++) {
						if($row["usn"]== $a[$i]) {
							$c[$i]=$row["name"];
							$d[$i]=$row["address"];
						}
					}
				}
			}
			echo "<br>";
			echo "<center> <strong>AFTER SORTING </strong><center>";
			echo "<table border='2'>";
				echo "<tr>";
					echo "<th>USN</th><th>NAME</th><th>Address</th></tr>"; 
					for($i=0;$i<$n;$i++) {
						echo "<tr>";
							echo "<td>". $a[$i]."</td>";
							echo "<td>". $c[$i]."</td>";
							echo "<td>". $d[$i]."</td></tr>";
					}
			echo "</table>";
			$conn->close();
		?>
	</body>
</html>