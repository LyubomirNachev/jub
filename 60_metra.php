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
      height: 11.1111111%;
      width: 100%;
      display: block;
      border-top: none;
      border-left:none;
      background-color: rgba(0, 0, 0, 0);
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

<!-- <script>
setTimeout(function(){
   window.location.reload(1);
}, 1000);
</script> -->


<h1 style="color:#FFFFFF;">Sensor hub data</h1>
<div>
<table>
<tr> 
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
foreach($colz as $col){
   echo "<td>$col</td>";
}
?>
</tr> 
   <?php
      $rs = mysqli_query($conn,"SELECT * FROM `test 60 metra`");
      while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
      { 
     echo "<tr>"; 
     foreach($colz as $col){
      echo "<td>".$row[$col]."</td>";
     }
     echo "</tr>"; 
     }      
   ?>
</table>
</div>
<script>
   function func(operaciq)
{
    for(i=1;i<=9;i++){
        document.getElementById("div"+i).style.display='none';
        document.getElementById("button"+i).style.borderRight = "2px solid black";
    }
    document.getElementById("div"+operaciq).style.display='block';
    document.getElementById("button"+operaciq).style.borderRight = "none";
   }
</script>
<div style="background-image:url('./dancing_alien.gif');height: 350px;border: 2px solid black;display:block; margin-top: 10%;background-color: white;" class="rows">
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
if($divn==1){
   echo '<div id="div1" style="display: block;">';
}else{
   echo '<div id="div'.$divn.'" style="display: none;">';
}
?>
<svg  width="500" height="300" style="background-color:white;height: 100%;width: 100%;">
<!-- <line x1="10" y1="0" x2="210" y2="0" style="stroke:rgb(80,80,80);stroke-width:2" />
<line x1="10" y1="30" x2="210" y2="30" style="stroke:rgb(80,80,80);stroke-width:2" />
<line x1="10" y1="60" x2="210" y2="60" style="stroke:rgb(80,80,80);stroke-width:2" />
<line x1="10" y1="90" x2="210" y2="90" style="stroke:rgb(0,0,0);stroke-width:2" />

<text x="0" y="105" fill="blue">0</text>
<text x="0" y="75" fill="blue">1</text>
<text x="0" y="45" fill="blue">2</text>
<text x="0" y="15" fill="blue">3</text>

<line x1="10" y1="0" x2="10" y2="90" style="stroke:rgb(0,0,0);stroke-width:2" />
<line x1="50" y1="0" x2="50" y2="90" style="stroke:rgb(80,80,80);stroke-width:2" />
<line x1="90" y1="0" x2="90" y2="90" style="stroke:rgb(80,80,80);stroke-width:2" />
<line x1="130" y1="0" x2="130" y2="90" style="stroke:rgb(80,80,80);stroke-width:2" />
<line x1="170" y1="0" x2="170" y2="90" style="stroke:rgb(80,80,80);stroke-width:2" />
<line x1="210" y1="0" x2="210" y2="90" style="stroke:rgb(80,80,80);stroke-width:2" />

<text x="45" y="105" fill="blue">1</text>
<text x="85" y="105" fill="blue">2</text>
<text x="125" y="105" fill="blue">3</text>
<text x="165" y="105" fill="blue">4</text>
<text x="205" y="105" fill="blue">5</text>

<line x1="10" y1="0" x2="20" y2="40" style="stroke:rgb(255,0,0);stroke-width:2" />
<line x1="20" y1="40" x2="30" y2="20" style="stroke:rgb(255,0,0);stroke-width:2" />
<line x1="30" y1="20" x2="40" y2="70" style="stroke:rgb(255,0,0);stroke-width:2" />-->
<?php
      $ots=50;
      $w=500;
      $h=300;
      $rs = mysqli_query($conn,"SELECT * FROM `test 60 metra`");
      $mnr=mysqli_num_rows($rs)-1;
      //echo "<h1>$max</h1>";
      $fr=0;
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

</body>
</html>

