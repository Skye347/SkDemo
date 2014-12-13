<html>
<body>
<?php
    
/*var defining*/

$enter="\r\n";
$logwriting="[".date("Y-m-d h:i:sa")."] -----Demo building-----Sk is learning-----";
$message=$_POST['message'];

/*open a file*/

$file=fopen("log.txt","a");

/*writing*/

if(fwrite($file,$logwriting)){
    echo "Writing log success<br>";
    }
  else{
    echo "Writing log fail<br>";
    }

if(fwrite($file,$message)){
    echo "Writing message success<br>";
    }
  else{
    echo "Writing message fail<br>";
    }

fwrite($file,$enter);

/*close fileing*/

fclose($file);

?>

</body>
</html>