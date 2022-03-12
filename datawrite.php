<?php
""
$conn = mysqli_connect('localhost', 'root', '', '60 metra');
$query="insert into `test 60 metra` (`Humidity`,`Temperature`,`Hydrogen(H2)`,`Methane(CH4)`,`Smoke`,`Alchohol`,`Carbon Dioxide(CO2)`,`Carbon Monoxide(CO)`,`Flammable gases`) values ("; 
foreach($argv as $value)
{
  $query.="$value, ";
}
$query.=")";
mysqli_query($conn,$query);
$nr = mysql_num_rows(mysqli_query($conn,"SELECT * FROM `test 60 metra`"));
if($nr>100){
mysqli_query($conn,"delete from `test 60 metra` where id=1");
}
?>
