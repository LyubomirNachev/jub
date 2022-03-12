<!DOCTYPE html>
<html>
<head>
<title>Space hub data</title>
<style>
   table{
      width:100%;
      border:2px solid black;
      background-color:lightblue;
      border-collapse: collapse;
   }
   td{
      border:2px solid black;
      padding:0;
   }
   .btnz{
      margin: 0px;
      height: 10%;
      width: 100%;
      display: block;
      border-top: none;
      border-left:none;
      background-color: rgba(0, 0, 0, 0);
   }
   .rows{
      background-image:url('./dancing_alien.gif');
      height: 380px;
      border: 2px solid black;
      display:block;
      margin-top: 50px;
      background-color: white;
   }
   svg{
      margin:30px;
   }
</style>
</head>
<body background="space_background.png">
<?php

$conn = mysqli_connect('localhost', 'root', '', '60 metra');
/*

$conn = mysqli_connect('localhost', 'root', '', '60 metra');
$query="insert into `test 60 metra` values ("; 
foreach($argv as $value)
{
  $query.="$value, ";
}
$query.=")";
mysqli_query($conn,$query);
$nr = mysql_num_rows(mysqli_query($conn,"SELECT * FROM `test 60 metra`"));
if($nr>100){
mysqli_query($conn,"delete from `test 60 metra` order by # desc limit 1");
}
*/
?>

<script>
setTimeout(function(){
   window.location.reload(1);
}, 5000);
</script>


<h1 style="color:#FFFFFF;"><img style="height:24pt" src="dancing_alien2.gif" /> Sensor hub data <img style="height:24pt" src="dancing_alien2.gif" /> </h1>
<div>
<table>
<tr> 
<?php
$colz=[
   "Humidity",
   "Temperature",
   "Hydrogen(H2)",
   "LPG",
   "Methane(CH4)",
   "Smoke",
   "Alchohol",
   "Carbon Dioxide(CO2)",
   "Carbon Monoxide(CO)",
   "Flammable gases"
   ];
$colz2=[
   "time",
   "Humidity",
   "Temperature",
   "Hydrogen(H2)",
   "LPG",
   "Methane(CH4)",
   "Smoke",
   "Alchohol",
   "Carbon Dioxide(CO2)",
   "Carbon Monoxide(CO)",
   "Flammable gases"
   ];
foreach($colz2 as $col){
   echo "<td>$col</td>";
}
?>
</tr> 
   <?php
      $rs = mysqli_query($conn,"SELECT * FROM `test 60 metra`");
      while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
      { 
     echo "<tr>"; 
     foreach($colz2 as $col){
      echo "<td>".$row[$col]."</td>";
     }
     echo "</tr>"; 
     }      
   ?>
</table>
</div>
<script>
   function func(operaciq){
   for(i=1;i<=9;i++){
        document.getElementById("div"+i).style.display='none';
        document.getElementById("button"+i).style.borderRight = "2px solid black";
    }
    document.getElementById("div"+operaciq).style.display='block';
    document.getElementById("button"+operaciq).style.borderRight = "none";
    sessionStorage.setItem("operaciq", operaciq);
   }
</script>
<div class="rows">
                <div style="display: inline;width: 20%;float: left; height:100%; " class="column">
                    <?php 
                    foreach($colz as $k => $col){
                      if($k==0){
                        echo '<button id="button'.($k+1).'" class="btnz" style="border-right: none;" onclick="func('.($k+1).')">'.$col.'</button>';
                      }else if($k==count($colz)-1){
                        echo '<button id="button'.($k+1).'" class="btnz" style="border-bottom: none;" onclick="func('.($k+1).')">'.$col.'</button>';
                      }else{
                      echo '<button id="button'.($k+1).'" class="btnz" onclick="func('.($k+1).')">'.$col.'</button>';
                      }
                     }
                    ?>
                </div>
            <div class="column" style="float: left;">
<?php 
$divn=1;
foreach($colz as $col){
$rs = mysqli_query($conn,"SELECT * FROM `test 60 metra`");
$max=-600;
while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
{ 
if($row[$col]>$max){
   $max=$row[$col];
}
}
$max+=$max/10;
if($max==0){
   $max=1;
}   
if($divn==1){
   echo '<div id="div1" style="display: block;">';
}else{
   echo '<div id="div'.$divn.'" style="display: none;">';
}
?>
<svg  width="500" height="300" style="background-color:white;">
<?php
      $ots=70;
      $w=500;
      $h=300;
      $rs = mysqli_query($conn,"SELECT * FROM `test 60 metra`");
      $mnr=mysqli_num_rows($rs)-1;
      //echo "<h1>$max</h1>";
      $fr=0;

      for($i=0;$i<=5;$i++){
         echo '<text x="10" y="'.($h-$ots-$i*($h-$ots)/5+10*($i==5)).'" fill="blue">'.round($i*$max/5, 2).'</text>';
         echo '<line x1="'.$ots.'" y1="'.($h-$ots-$i*($h-$ots)/5).'" x2="'.$w.'" y2="'.($h-$ots-$i*($h-$ots)/5).'" style="stroke:rgb(80,80,80);stroke-width:1" />';
         echo '<line x1="'.($ots+$i*($w-$ots)/5).'" y1="0" x2="'.($ots+$i*($w-$ots)/5).'" y2="'.($h-$ots).'" style="stroke:rgb(0,0,0);stroke-width:1" />';
      }

      while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)){
         //echo "<h2>$mnr</h2>";
      if($fr>0){ 
      echo "<line x1=\"".($ots+($fr-1)*($w-$ots)/$mnr)."\" y1=\"".($h-($ots+($h-$ots)*$lar[$col]/$max))."\" x2=\"".($ots+$fr*($w-$ots)/$mnr)."\" y2=\"".($h-($ots+($h-$ots)*$row[$col]/$max))."\" style=\"stroke:rgb(255,0,0);stroke-width:2\" />";
      }
      $lar=$row;
      $fr++;
      }

      echo '<line x1="'.$ots.'" y1="'.($h-$ots).'" x2="'.$w.'" y2="'.($h-$ots).'" style="stroke:rgb(0,0,0);stroke-width:2" />';
      echo '<line x1="'.$ots.'" y1="0" x2="'.$ots.'" y2="'.($h-$ots).'" style="stroke:rgb(0,0,0);stroke-width:2" />';
?>
</svg>
</div>
<?php 
$divn++;
} ?>
</div>
</div>
<script>
   if(sessionStorage.getItem("operaciq")!==null){
   func(sessionStorage.getItem("operaciq"));
   }
</script>
</body>
</html>

