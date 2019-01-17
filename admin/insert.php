<html>
<body>
<?php

$con = mysqli_connect("localhost","root","");
mysqli_query($con,"SET NAMES UTF8");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
mysqli_select_db($con, "mirror_match");
$sql="INSERT INTO 2019_kampany (jatekos, csapatnev, frakcio) VALUES ('$_POST[jatekos]','$_POST[csapatnev]','$_POST[frakcio]')";
if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error());
  }
echo "1 record added";
mysqli_close($con)
?>
</body>

</html>