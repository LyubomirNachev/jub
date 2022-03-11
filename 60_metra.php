<!DOCTYPE html>
<html>
<head>
<title>Space hub data</title>
<style>
   body{
      background-color:yellow;
   }
   table{
      width:100%;
      border:1px solid #ff0000;
      background-color:lightgreen;
      border-collapse: collapse;
   }
   td{
      border:1px solid #ff0000;
      padding:0;
   }
</style>
</head>
<body>
<?php
$conn = mysqli_connect('localhost', 'root', '', '60 metra');

?>
<!-- <script>
setTimeout(function(){
   window.location.reload(1);
}, 1000);
</script> -->

<h1><img src="dancing_alien.gif" style="height:32pt" />Sensor hub data<img src="dancing_alien.gif" style="height:32pt" /></h1>
<div>
<table>
<tr> 
<td>Methane(CH4)</td>
<td>Benzene(C6H6)</td> 
<td>Smoke</td>
<td>Carbon Monoxide(CO)</td>
<td>Hydrogen(H2)</td>
<td>Flammable gases</td>
<td>Humidity</td>
<td>Temperature</td>
<td>Carbon Dioxide(CO2)</td> 
</tr> 
   <?php
      $rs = mysqli_query($conn,"SELECT * FROM `test 60 metra`");
      while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
      { 
     print "<tr>"; 
     print "<td>" . $row['Methane(CH4)'] . "</td>"; 
     print "<td>" . $row['Benzene(C6H6)'] . "</td>"; 
     print "<td>" . $row['Smoke'] . "</td>"; 
     print "<td>" . $row['Carbon Monoxide(CO)'] . "</td>";
     print "<td>" . $row['Hydrogen(H2)'] . "</td>";
     print "<td>" . $row['Flammable gases'] . "</td>";
     print "<td>" . $row['Humidity'] . "</td>";
     print "<td>" . $row['Temperature'] . "</td>"; 
     print "<td>" . $row['Carbon Dioxide(CO2)'] . "</td>"; 
     print "</tr>"; 
     }      
   ?>
</table>
</div>
<div>
<img src="dancing_alien.gif" />
</div>

</body>
</html>

