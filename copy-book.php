<?php
$bookurl = "https://raw.githubusercontent.com/LafeLabs/TRASH-MAGIC-HANDBOOK/refs/heads/main/book.txt";

if(isset($_GET["bookurl"])){
    $bookurl = $_GET["bookurl"];
}

$baseurl = explode("book.txt",$dnaurl)[0];
$listraw = file_get_contents($listurl);
$list = json_decode($listraw);

foreach($list as $value){
    copy($baseurl.$value,$value);
}

?>
<a href = "index.html">read-book.html</a>
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
