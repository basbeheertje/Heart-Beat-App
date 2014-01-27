<?php

	$con=mysqli_connect("127.0.0.1","schoolminor","schoolminor","schoolminor");
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$devicedata = array();

	$result = mysqli_query($con,"SELECT * FROM devicedata ORDER BY id desc");

	while($row = mysqli_fetch_array($result)){
		
		$devicedata[] = $row;
		
	}

	mysqli_close($con);

?>
<table border="1">
	<thead>
		<tr><td>ID</td><td>Date</td><td>Time</td><td>State</td><td>Hartslag</td><td>User</td><td>Device</td></tr>
	</thead>
	<tbody>
		<?php foreach($devicedata as $data){ ?>
		<tr>
			<td><?php echo $data['id'];?></td>
			<td><?php echo $data['date'];?></td>
			<td><?php echo $data['time'];?></td>
			<td><?php echo $data['state'];?></td>
			<td><?php echo $data['value'];?></td>
			<td><?php echo $data['creator'];?></td>
			<td><?php echo $data['device'];?></td>
		</tr>
		<?php } ?>
	</tbody>
</html>