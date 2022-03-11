<?php
$colz=[
"Methane(CH4)",
"Benzene(C6H6)",
"Smoke",
"Carbon Monoxide(CO)",
"Hydrogen(H2)",
"Flammable gases",
"Humidity",
"Temperature",
"Carbon Dioxide(CO2)"
];
$conn = mysqli_connect('localhost', 'root', '', '60 metra');
$query="insert into `test 60 metra` values ("; 
foreach($argv as $value)
{
  $query.="$value, ";
}
$query.=")";
mysqli_query($conn,$query);
?>
