<?php
""
$conn = mysqli_connect('localhost', 'root', '', '60 metra');
$query="insert into `test 60 metra` (`Methane(CH4)`, `Benzene(C6H6)`, `Smoke`, `Carbon Monoxide(CO)`, `Hydrogen(H2)`, `Flammable gases`, `Humidity`, `Temperature`, `Carbon Dioxide(CO2)`) values ("; 
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
