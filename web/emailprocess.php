<?php
$myfile = fopen("/www/iskun.net/web/mail.html", "w") or die("Unable to open file!");
while($f = fgets(STDIN)){
    fwrite($myfile, $f);
}

fclose($myfile);  
mail("luuanhquyen@gmail.com", "ggg", "ggg"); 
die();  
?>
