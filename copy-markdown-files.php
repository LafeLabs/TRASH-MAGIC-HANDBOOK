<?php
$listurl = "https://raw.githubusercontent.com/LafeLabs/TRASH-MAGIC-HANDBOOK/refs/heads/main/markdown-files-list.txt";


if(isset($_GET["list"])){
    $listurl = $_GET["list"];
}

$baseurl = explode("markdown-files-list.txt",$dnaurl)[0];
$listraw = file_get_contents($listurl);
$list = json_decode($listraw);

foreach($list as $value){
    copy($baseurl.$value,$value);
}

?>
<a href = "index.html">CLICK ME(3/3)</a>
<style>
body{
    background-color:BLACK;
    font-family:Comic Sans MS;
    font-size:3em;
}
a{
        font-size:3em;
        color:#ff2cb4;

}
</style>
