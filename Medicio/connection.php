<?php

	function connect()
	{
		$conn = mysqli_connect('localhost', 'root', 'root', 'ohmc');

		if (!$conn)
			return false;

		return $conn;
	}


	//$table = mysqli_query($conn, "select * from USERS;");

	//$i = $table->num_rows;

	//while ($row = $table->fetch_row())
	//{
	//	print_r ($row);
	//}
?>