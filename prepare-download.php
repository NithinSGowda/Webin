<?php 
    $websiteName=$_GET["url"];
    echo "Got the url as $websiteName";
    exec("wget -r ".$websiteName." -P WEBSITES 2>&1",$op,$ret); 
    chmod("WEBSITES/.$websiteName",777);
    chmod("WEBSITES/.$websiteName./index.html",777);
    $script="<div class=\"jss\"><script defer src=\"mainbot.js\"></script></div>";

    exec("cp mainbot.js WEBSITES/$websiteName");
    exec("cp classicStyle.css WEBSITES/$websiteName");
    exec("cp -r Images WEBSITES/$websiteName");

    $handle = fopen("WEBSITES/".$websiteName."/index.html", 'a');
    fwrite($handle,$script);
    fclose($handle);

    header("Location: WEBSITES/".$websiteName."/index.html");
?>
