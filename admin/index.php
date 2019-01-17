<html>
<body>

<link rel="stylesheet" type="text/css" href="../css/main_page.css" />
<link rel="stylesheet" type="text/css" href="../css/table_kill_team.css" />
<link rel="stylesheet" type="text/css" href="../css/loader.css" />
<div class="row">
	<div class="column">
	<?php
			$conn=mysqli_connect('localhost', 'root', '','mirror_match');
			mysqli_query($conn,"SET NAMES UTF8");
			$sql=mysqli_query($conn,"SELECT jatekos, csapatnev, frakcio FROM 2019_kampany GROUP BY jatekos ORDER BY jatekos ASC");
			echo "			
							<table class='kill_team' width='100%'>				
									<caption>A kampány jelenlegi állása</caption>
								<thead>
									<th style='width:17%'; text-align:center;' scope='col'>Játékos</th>
									<iframe name='hiddenFrame' width='0' height='0' border='0' style='display: none;'></iframe>
									<th style='width:43%; text-align:center;' scope='col'>Csapatnév</th>
									<th style='width:20%; text-align:center;' scope='col'>Frakció</th>
				";
			while ($res=mysqli_fetch_row($sql))
			{
				$jatekos=$res[0];
				$csapatnev=$res[1];
				$frakcio=$res[2];
		
				echo "
			 			<tr>
			 				<td text-align:center;' data-label='Játékos'>".$jatekos."</td>
			 				<td text-align:center;' data-label='Csapatnév'>".$csapatnev."</td>
							<td text-align:center;' data-label='Frakció'>".$frakcio."</td>
						</tr>
					";
			}
			echo "</table>";
			
	?>
		    <form action="insert.php" method="post" target="hiddenFrame">
			<input type="text" name="jatekos"/>
			<input type="text" name="csapatnev" />
			<input type="text" name="frakcio" />
			<input type="submit" onclick="reload()" />
	</div>
	<div class="column">
			
	</div>
</form>
</div>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="../js/reload.js"></script>
</body>
</html>