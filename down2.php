<?php

// open the file in a binary mode
$name = 'upload_log.txt';
$fp = fopen($name, 'rb');

// send the right headers
header("Content-Type: application/octet-stream");
header("Content-Length: " . filesize($name));

// dump the picture and stop the script
fpassthru($fp);
exit;

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
