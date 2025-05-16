<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <!--

convert markdown +latext to html via showdown.js and mathjax.js

    -->
    <link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAAP//AP///wANAP8A5Dz6ABueRwAAt/8A6BonABo86AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAREREREREREREREAAAEREREREQCIgREREd3dwAAB3d3d3d3d3d3d3d3d3d3d3d3d3VVVVVVVQAFVVAAVVVQIiBRAiIBEQIAIBECAAERAgAgFgIABmYCIiBmAiIGZgIiIGYCIgZmYCIAaIAAMzMzAAiIiIiIiIiIiIiIiIiIiIiIgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" rel="icon" type="image/x-icon" />

    <!--Stop Google:-->
    <META NAME="robots" CONTENT="noindex,nofollow">
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/showdown/1.8.6/showdown.js"></script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

   <script src = "trashmagic.js"></script>

<!--
<link rel="stylesheet" href="trashbook.css">    

        <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
        <script>
            MathJax.Hub.Config({
                tex2jax: {
                inlineMath: [['$','$'], ['\\(','\\)']],
                processEscapes: true,
                processClass: "mathjax",
                ignoreClass: "no-mathjax"
                }
            });//			MathJax.Hub.Typeset();//tell Mathjax to update the math
        </script>
-->

</head>
<body>    
<div class = "data" id = "filenamediv"><?php
    
if(isset($_GET["filename"])){
    echo $_GET["filename"];
}
else{
    echo "README.md";
}

?></div>
<STYLE>
a{
    color:blue;
}
h1{
    background-color:#404040;
    width:90%;
    margin:auto;
    border-radius:1em;
}
pre{
  overflow:scroll;
}
body{
    overflow:hidden;
    background-color:#EEEEEE;
    font-family:Comic Sans MS;
}
#scrollscroll{
    text-align:justify;
    padding-left:1em;
    padding-right:1em;
    position:absolute;
    overflow:scroll;
    background-color:#eeeeee;
    font-size:2em;
    left:0px;
    top:0px;
    right:0px;
    bottom:0px;
}
#scrollscroll a{
    color:blue;
}
#scrollscroll img{
    max-width:80%;
    display:block;
    margin:auto;
    background-color:none;
}
.data{
    display:none;
}
h1,h2,h3,h4{
    text-align:center;
}   
</STYLE>
<div id = "scrollscroll"></div>
<script>



mode = "dark";
//mode = "light";


scroll = "";
rawhtml = "";
var converter = new showdown.Converter();
// for more on options see here:
// https://github.com/showdownjs/showdown/wiki/Showdown-Options
converter.setOption('literalMidWordUnderscores', 'true');
converter.setOption('tables', 'true')
    
filename = "README.md";

//loadscroll("scrolls/home");

loadscroll(document.getElementById("filenamediv").innerHTML);

localfile = true;



function loadscroll(scrollname){
    filename = scrollname;

    document.getElementById("scrollscroll").innerHTML = "";
    document.getElementById("scrollscroll").style.display = "block";
    var httpc666 = new XMLHttpRequest();
    httpc666.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            scroll = this.responseText;
            rawhtml = converter.makeHtml(scroll);
            document.getElementById("scrollscroll").innerHTML = rawhtml;
            //MathJax.Hub.Typeset();//tell Mathjax to update the math
            
            titles = document.getElementsByTagName("H1");
            for(var index = 0;index < titles.length;index++){
                rainbowstring(titles[index]);    
            }

        }
    };
    httpc666.open("GET", "load-file.php?filename=" + scrollname, true);
    httpc666.send();
    //MathJax.Hub.Typeset();//tell Mathjax to update the math
}


</script>
<style>

</style>
</body>
</html>