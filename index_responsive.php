<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/main_page_responsive.css" />
<link rel="stylesheet" type="text/css" href="css/table.css" />
</head>
<body>
<div class='wraper'>
<div class='header'>
	<a href="#">Ranglista</a>
    <a href="#">Admin felület</a>
	<a href="#">Sugo</a>
</div>
<div class="middle">
	<div class="container">
		<main class="content">
			<?php
			$conn=mysqli_connect('localhost', 'root', '','mirror_match');
			mysqli_query($conn,"SET NAMES UTF8");
			$sql=mysqli_query($conn,"SELECT jatekos, csapatnev, frakcio, kampanypont FROM 2018_kampany ORDER BY kampanypont DESC");
			echo "
							<table class='kill_team'>
								<tr>
								<th style='width:100%' colspan=4>A kampány jelenlegi állása</th>
								</tr>
								<tr>
									<th width=100>Játékos</th>
									<th width=250>Csapatnév</th>
									<th width=100>Frakció</th>
									<th width=100>Kampány pont</th>

								</tr>
				";
			while ($res=mysqli_fetch_row($sql))
			{
				$jatekos=$res[0];
				$csapatnev=$res[1];
				$frakcio=$res[2];
				$kampanypont=$res[3];
		
				echo "
			 			<tr>
			 				<td width=100 style='text-align:center;'>".$jatekos."</td>
			 				<td width=250 style='text-align:center;'>".$csapatnev."</td>
							<td width=100 style='text-align:center;'>".$frakcio."</td>
							<td width=100 style='text-align:center;'>".$kampanypont."</td>
			 			</tr>
					";
			}
			echo "</table>"
			?>

	<table class='kill_team'>
								<br>
								<tr>
									<th style='width=100%;' colspan=8>A kampány jelenlegi állása fordulónként lebontva</th>
								</tr>
							</table>
							<table class='kill_team'>
								<tr>
									<th width=100>Játékos</th>
									<th width=250>Csapatnév</th>
									<th width=10>I. forduló</th>
									<th width=10>II. forduló</th>
									<th width=10>III. forduló</th>
									<th width=10>IV. forduló</th>	
									<th width=10>V. forduló</th>	
									<th width=10>Összesített pontszám</th>									
								</tr>		
					</main>						

	</div>

<aside class="right-sidebar">
				<?php
			$conn=mysqli_connect('localhost', 'root', '','mirror_match');
			mysqli_query($conn,"SET NAMES UTF8");
			$sql=mysqli_query($conn,"SELECT datum,kiiras FROM 2018_kampany_info");
			echo "			
							<table class='kill_team'>
								<tr>
									<th style='text-align:center;'>Dátum</th>
									<th width=300 style='text-align:center;'>Információ</th>
								</tr>
				";
			while ($res=mysqli_fetch_row($sql))
			{
				$datum=$res[0];
				$kiiras=$res[1];
				echo "
			 			<tr>
			 				<td style='text-align:center;'>".$datum."</td>
			 				<td style='text-align:center;'>".$kiiras."</td>
			 			</tr>
					";
			}
			echo "</table>"

			?>
</div>
</div>
</body>
</html>
