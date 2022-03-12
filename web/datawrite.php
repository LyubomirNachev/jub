
<?php
$conn = mysqli_connect('localhost', 'root', '', '60 metra');
$query="insert into `test 60 metra` (`Humidity`,`Temperature`,`Hydrogen(H2)`,`LPG`,`Methane(CH4)`,`Smoke`,`Alchohol`,`Carbon Dioxide(CO2)`,`Carbon Monoxide(CO)`,`Flammable gases`) values ("; 

$r=0;
foreach($argv as $k => $value)
{
    if($r){
        $query.="$value";
        if($k<count($argv)-1){
            $query.=", ";
        }
    }
    $r=1;
}
$query.=")";
echo $query;
mysqli_query($conn,$query);
$nr = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `test 60 metra`"));
if($nr>20){
mysqli_query($conn,"delete from `test 60 metra` ORDER BY `time` ASC limit 1");
}
?>
