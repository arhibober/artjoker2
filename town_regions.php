<?php
	include "functions.php";
	if ($_GET ["ind1"] > 0)
	{
		$i = 0;		
		onDB ($result, "t_koatuu_tree");
		while ($row = mysqli_fetch_array ($result))
			if (($row [1] == $_GET ["ind1"]) && ($row [4] == 3))
				$i++;
		if ($i > 0)
		{
			echo "<div>
					Район *:
					<select data-placeholder='Выберите район города...' class='chosen-select' tabindex='-1' name='town_regions' size='1' id='town_regions' onChange='SubmitForm ()'>
						<option value=''></option>";
						onDB ($result, "t_koatuu_tree");
						while ($row = mysqli_fetch_array ($result))
							if (($row [1] == $_GET ["ind1"]) && ($row [4] == 3))
								echo "<option value='".$row [0]."'>".$row [2]."</option>";
					echo "</select>
					</div>
					<script language='javascript'>
						$('#town_regions').chosen ();
					</script>";
		}
	}