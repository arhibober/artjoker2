<?php						
	function onDB (&$result, $table_name)
	{
		connect_to_DB ($conn);
		$result = mysqli_query ($conn, "SELECT * FROM ".$table_name);
		if (!$result)
		{
			echo " Can't select from ".$table_name;
			return;
		}
	}	
  
	function connect_to_DB (&$conn)
	{  
		$conn = mysqli_connect ("localhost:3306", "root", "", "test")
			or die ("Невозможно установить соединение: ".mysqli_error ());
			mysqli_query ($conn, 'SET NAMES "utf8" COLLATE "utf8_general_ci"');
		if (!mysqli_set_charset ($conn, "utf8"))
		{
			echo "Ошибка при загрузке набора символов utf8: ".mysqli_error ($link);
			exit ();
		}
		$database = "artjoker";
		mysqli_select_db ($conn, $database); // выбираем базу данных
	}

	function toDB ($name, $email, $territory)
	{
		connect_to_DB ($conn);
		$result = mysqli_query ($conn, "INSERT INTO PEOPLE VALUES(NULL, '".$name."', '".$email."', '".$territory."')");
		if (!$result)
		{
			echo "Can't insert into PEOPLE";
			return;
		}
		echo "<p>
		Информация о человеке успешно загружена.
		</p>";
	}
?>