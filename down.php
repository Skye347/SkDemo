<?php
    
$filename=$_POST["filename"];
if(file_exists("upload/".$filename)){
    $file=fopen("upload/".$filename,"rb");
    header('Content-Disposition: attachment; filename='.$filename);
    Header("Content-type: application/octet-stream");
    header("Content-Length: " . filesize($file));
    //输出文件内容
    fpassthru($file);
    //$buffer=1024; 
    //$file_count=0; 
    //向浏览器返回数据 
    //while(!feof($file)){ 
    //var_dump(filesize($file));
   
    //echo "1<br>";
    //$file_con=fread($file,$buffer); 
    //$file_count+=$buffer; 
    //echo $file_con; 
    //} 
    fclose($file);
}
else{
    echo "file not exist!<br>";
}
?>
