<!-- 
this program generates the file dna.txt which lists the files to replicate 
-->
<a style ="font-family:Comic Sans MS;color:blue;font-size:1.5em;" href = "index.html">index.html</a>

<br>
<a style ="font-family:Comic Sans MS;color:blue;font-size:1.5em;" href = "edit-html.html">edit-html.html</a>
<br>
<a style ="font-family:Comic Sans MS;color:blue;font-size:1.5em;" href = "edit-php.html">edit-php.html</a>
<br>
<a style ="font-family:Comic Sans MS;color:blue;font-size:1.5em;" href = "edit-book.html">edit-book.html</a>
<br>
<br/>
<pre>
<?php

    $files = scandir(getcwd());
    $list = [];
    foreach($files as $value){
        if(substr($value,-3) == ".md"){
            array_push($list,$value);
        }
    }

    echo json_encode($list,JSON_PRETTY_PRINT);

    $file = fopen("markdowd-files-list.txt","w");// create new file with this name
    fwrite($file,json_encode($list,JSON_PRETTY_PRINT)); //write data to file
    fclose($file);  //close file

?>
</pre>
