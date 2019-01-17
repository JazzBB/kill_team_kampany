<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/main_page.css" />
<link rel="stylesheet" type="text/css" href="css/table_kill_team.css" />
<link rel="stylesheet" type="text/css" href="css/loader.css" />
</head>
<body>
<div class="nav">
	<div class="nav-header">
		<div class="nav-title">Kill Team Kampány
		</div>
	</div>
	<div class="nav-btn">
    <label for="nav-check">
      <span></span>
      <span></span>
      <span></span>
    </label>
  </div>
	<input type="checkbox" id="nav-check">
	<div class="nav-links">
		<a href="#fordulo">Pontok fordulónként</a>
		<a href="#eroforras">Erőforrások</a>
	</div>
</div>
<a id="button"><img src="img/up.png"></a>
<br>
	<div class="row">
		<div class="column">
			<?php
			$conn=mysqli_connect('localhost', 'root', '','mirror_match');
			mysqli_query($conn,"SET NAMES UTF8");
			$sql=mysqli_query($conn,"SELECT jatekos, csapatnev, frakcio, SUM(elso + masodik + harmadik + negyedik + otodik) as kampanypont FROM 2019_kampany GROUP BY jatekos ORDER BY kampanypont DESC");
			echo "			
							<table class='kill_team' width='100%'>				
									<caption>A kampány jelenlegi állása</caption>
								<thead>
									<th style='width:17%'; text-align:center;' scope='col'>Játékos</th>
									<th style='width:43%; text-align:center;' scope='col'>Csapatnév</th>
									<th style='width:20%; text-align:center;' scope='col'>Frakció</th>
									<th style='width:30%; text-align:center;' scope='col'>Kampány pont</th>

								</thead>
				";
			while ($res=mysqli_fetch_row($sql))
			{
				$jatekos=$res[0];
				$csapatnev=$res[1];
				$frakcio=$res[2];
				$kampanypont=$res[3];
		
				echo "
			 			<tr>
			 				<td text-align:center;' data-label='Játékos'>".$jatekos."</td>
			 				<td text-align:center;' data-label='Csapatnév'>".$csapatnev."</td>
							<td text-align:center;' data-label='Frakció'>".$frakcio."</td>
							<td text-align:center;' data-label='Kampánypont'>".$kampanypont."</td>
			 			</tr>
					";
			}
			echo "</table>"
			?>
			</div>
			<div class="column">
				<?php
			$conn=mysqli_connect('localhost', 'root', '','mirror_match');
			mysqli_query($conn,"SET NAMES UTF8");
			$sql=mysqli_query($conn,"SELECT datum,kiiras FROM 2018_kampany_info");
			echo "			
							<table class='kill_team' width='100%'>
									<caption>Információk a kampánnyal kapcsolatban</caption>
									<thead>
									<th style='width:20%; text-align:center;' scope='col'>Dátum</th>
									<th style='width:80%; text-align:center;' scope='col'></th>
									</thead>
				";
			while ($res=mysqli_fetch_row($sql))
			{
				$datum=$res[0];
				$kiiras=$res[1];
				echo "
			 			<tr>
			 				<td text-align:center;' data-label='Dátum'>".$datum."</td>
			 				<td text-align:center;' >".$kiiras."</td>
			 			</tr>
					";
			}
			echo "</table>"

			?>
			</div>
	</div>
	<br>
	<div class="row">
	<div class="column">
		<?php
			$conn=mysqli_connect('localhost', 'root', '','mirror_match');
			mysqli_query($conn,"SET NAMES UTF8");
			$sql=mysqli_query($conn,"SELECT jatekos, csapatnev, elso, masodik, harmadik, negyedik, otodik, SUM(elso + masodik + harmadik + negyedik + otodik) as kampanypont FROM 2019_kampany GROUP BY jatekos ORDER BY kampanypont DESC");
			echo "
							<table class='kill_team' width='100%' id='fordulo'>
									<caption>A kampány jelenlegi állása fordulónként lebontva</caption>
								<thead>
									<th style='width:auto' scope='col'>Játékos</th>
									<th style='width:25%' scope='col'>Csapatnév</th>
									<th style='width:10%' scope='col'>I. forduló</th>
									<th style='width:10%' scope='col'>II. forduló</th>
									<th style='width:10%' scope='col'>III. forduló</th>
									<th style='width:10%' scope='col'>IV. forduló</th>	
									<th style='width:10%' scope='col'>V. forduló</th>	
									<th style='width:10%' scope='col'>Összesített pontszám</th>									
								</thead>
				";
			while ($res=mysqli_fetch_row($sql))
			{
				$jatekos=$res[0];
				$csapatnev=$res[1];
				$elso=$res[2];
				$masodik=$res[3];
				$harmadik=$res[4];
				$negyedik=$res[5];
				$otodik=$res[6];
				$kampanypont=$res[7];				
				echo "
			 			<tr>
									<td data-label='Játékos'>".$jatekos."</th>
									<td data-label='Csapatnév'>".$csapatnev."</th>
									<td data-label='I. forduló'>".$elso."</th>
									<td data-label='II. forduló'>".$masodik."</th>
									<td data-label='III. forduló'>".$harmadik."</th>
									<td data-label='IV. forduló'>".$negyedik."</th>	
									<td data-label='V. forduló'>".$otodik."</th>	
									<td data-label='Összesített'>".$kampanypont."</th>	
			 			</tr>
					";
			}
			echo "</table>"
			?>
	</div><br><br>
	</div>
	<br>
	<div class="row">
		<div class="column">
		<?php
			$conn=mysqli_connect('localhost', 'root', '','mirror_match');
			mysqli_query($conn,"SET NAMES UTF8");
			$sql=mysqli_query($conn,"SELECT frakcio, SUM(nyersanyag) as nyersanyag ,SUM(territorium) as territorium,SUM(felderites) as felderites,SUM(moral) as moral FROM 2019_kampany GROUP BY frakcio");
			echo "
								<table class='kill_team' width='100%' id='eroforras'>
									<caption>Erőforrások frakciónként a kampányban</caption>						
								<thead>
									<th width=14% scope='col'>Frakció</th>
									<th width=20% scope='col'>Nyersanyag</th>
									<th width=20% scope='col'>Territórium</th>
									<th width=20% scope='col'>Felderítés</th>
									<th width=20% scope='col'>Morál</th>
								</thead>
			";
			while ($res=mysqli_fetch_row($sql))
			{
				$frakcio=$res[0];	
				$nyersanyag=$res[1];
				$territorium=$res[2];
				$felderites=$res[3];
				$moral=$res[4];
				echo "
			 			<tr>
									<td data-label='Frakció'>".$frakcio."</th>
									<td data-label='Nyersanyag'>".$nyersanyag."</th>
									<td data-label='Territorium'>".$territorium."</th>
									<td data-label='Felderítés'>".$felderites."</th>
									<td data-label='Morál'>".$moral."</th>	
			 			</tr>
					";
			}
			echo "</table>"
			?>
			</div>
	</div>
</div>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="js/scrolltop.js"></script>
</body>
</html>
