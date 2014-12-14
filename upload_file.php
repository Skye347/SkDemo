<?php

$enter="\r\n";
$logwriting="[".date("Y-m-d h:i:sa")."] -----Uploading Demo building----------";
$file=fopen("upload_log.txt","a");

function writelog_s($file,$logwriting,$enter)
{
    echo "NAME:".$_FILES["file"]["name"]."<br>";
    echo "SIZE:".$_FILES["file"]["size"]."<br>";
    echo "TYPE:".$_FILES["file"]["type"]."<br>";
    echo "Path:/upload/".$_FILES["file"]["name"]."<br>";
    fwrite($file,$logwriting);
    fwrite($file,$enter);
    fwrite($file,"NAME:".$_FILES["file"]["name"]);
    fwrite($file,$enter);
    fwrite($file,"SIZE:".$_FILES["file"]["size"]."kb");
    fwrite($file,$enter);
    fwrite($file,"TYPE:".$_FILES["file"]["type"]);
    fwrite($file,$enter);
}

function typecheck_m1()
{
    if($_POST["option"]==1){
        return 1;
    }
    else{
        
    if(($_FILES["file"][type]=="image/gif")
     ||($_FILES["file"][type]=="image/jpeg")
     ||($_FILES["file"][type]=="image/pjpeg")){
         return 1;
     }
    else{
        return 0;
    }
    }
}

function typecheck_m2()
{
    if($_POST["option"]==1){
        return 1;
    }
    else{
        
    $temp=$_FILES["file"]["name"];
    //black position
    $allow_type_array=array(".jpg",".jpeg",".gif","png");
    $not_allow_type_array=array(".php",".txt",".asp");
    $id=0;
    $count_tmp=count($not_allow_type_array);
    for($roll_tmp=0;$roll_tmp<$count_tmp;$roll_tmp++){
        if(strpos($temp,$not_allow_type_array[$roll_tmp])){
            $id=1;
        }
    }

    if($id){
        return 1;
    }
    else{
        echo "typecheck whitelist denied<br>";
        return 0;
    }
    }
}

function sizecheck($size)
{
    if($_FILES["file"]["size"]<$size){
        return 1;
    }
    else{
        return 0;
    }
}

function writelog_m1($message,$file,$enter)
{
    echo "$message.<br>";
    fwrite($file,$message);
    fwrite($file,$enter);
}

if($_FILES["file"]["error"]==0)
{
    //write log
    writelog_s($file,$logwriting,$enter);
    if(file_exists("upload/".$_FILES["file"]["name"])){//existence error
        writelog_m1("Upload failed:File has already existed.<br>",$file,$enter);
    }
    elseif(typecheck_m2()){
        if(sizecheck(2000000)){//upload success
        move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$_FILES["file"]["name"]);
        writelog_m1("Upload successed.<br>",$file,$enter);
        }
        else{
        //size error    
        writelog_m1("Upload failed:File is out of size.<br>",$file,$enter);
        }
    }
    else{
       //type error
       writelog_m1("Upload failed:File type is not allowed.<br>",$file,$enter);
    }
}
else{
    echo "error:";
    echo $_FILES["file"]["error"];
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        
    </body>
</html>
