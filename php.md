## [RETURN TO MAIN BOOK](read-markdown-file.php?filename=book.md)
## [EDIT THIS CHAPTER](edit-markdown-file.php?filename=php.md)

![](https://upload.wikimedia.org/wikipedia/commons/3/31/Webysther_20160423_-_Elephpant.svg)

# PHP and Trash Magic

[PHP](https://en.wikipedia.org/wiki/PHP) is one of the the core languages of the World Wide Web, along with HTML, JavaScript, and CSS.  It has its roots in the very beginnings of the Web, around the middle of the 1990s. PHP originally stood for "Personal Home Page", and was intended as an alternative to HTML which people can write web documents in.  Web browsers will look for an index.html file on servers when you point your browser to the server, and if they don't find that and there is an index.php file, that will load instead. A file that ends in .php but has regular HTML in it will load as normal. The letters PHP have been changed to stand for "PHP: Hypertext Preprocessor".  

But inside that HTML-like file, a PHP file can have code that does things on the server which are impossible without a server side language! PHP bridges the gap from front end to back end. PHP is how we build fully anarchist information architecture, where the client side of the browser can carry out arbitrary tasks on the server side.

In earlier versions of Trash Magic, we constructed a number of pages out of PHP.  However, what has evolved over time is to make the smallest, simplest possible PHP scripts which only do one simple thing, and to then use HTML and JavaScript to build up more complex systems.  

The two most fundamental operations in working with files on the server side are to load a file and save a file.  In Trash Magic we try to create names with as clear as possible a purpose, where the name of the file is of the form verb-object, in so-called "[kebab case](https://developer.mozilla.org/en-US/docs/Glossary/Kebab_case)", where the words are all separated by hyphens like little bits of food on a kebab skewer. So we start with the two most widely used scripts, which are save-file.php and load-file.php.  

the full code for save-file.php is as follows:

```
<?php
    $data = $_POST["data"]; //get data 
    $filename = $_POST["filename"];//get filename
    $file = fopen($filename,"w");// create new file with this name
    fwrite($file,$data); //write data to file
    fclose($file);  //close file
?>
```

PHP syntax can take some getting used to based on any experience with any other language.  Variables all start with dollars signs for some reason.  The variable $_POST is what PHP calls a "[superglobal](https://www.w3schools.com/php/php_superglobals.asp)", and it fetches information passed via a URL. In Trash Magic, we use JavaScript to pass both a file name and the data to be saved via this method. Then fopen, fwrite, and fclose are PHP functions which communicate with the file system on the server to open, write and close a file.  

To load data from a file, we use load-file.php, which is listed in full below:

```
<?php
$filename = $_REQUEST["filename"];//filename
$data = file_get_contents($filename);//get contents of file
echo $data;//print contents
?>
```

Here, we use another "super global", _REQUEST to get a filename, load the contents of that file and then "echo" it(PHP for "print"), which allows it to be passed back to the front end of the browser. 

To use these two tools to edit files, we give the following examples of loading and saving from [wall.html](wall.html)

```
wall = "";
currentfile = "wall.txt";
var httpc = new XMLHttpRequest();
httpc.open("GET", "load-file.php?filename=" + currentfile, true);
httpc.send();
httpc.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        wall = this.responseText;
        document.getElementById("wall").value = wall;  
    }
};

```

The above code fetches a file called wall.txt and puts its contents in a JavaScript string variable called wall, which it then puts into a textarea element called "wall".  The following code, also from [wall.html](wall.html), shows how to use save-file.php to save a file:

```
currentfile = wall.txt;
var httpc = new XMLHttpRequest();
var url = "save-file.php";        
httpc.open("POST", url, true);
httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
httpc.send("data="+data+"&filename=" + currentfile);//send text to save-file.php
```

To delete files, we use delete-file.php, which is listed in full below:

```
<?php
    $filename = $_POST["filename"];
    unlink($filename);
?>
```
Not much to it!  This uses the PHP command "unlink" to actually delete a file from the file system on the server side!  There is no undo, and there are not restrictions on arbitrary users deleting things! This is a core part of what makes Trash Magic organic media: everything dies. It is through replication that things live on, not by simply "not dying".  To use this PHP script, we pair it with the following JavaScript to delete a file from an HTML app:

```
filename = "myfile.txt";
var httpc = new XMLHttpRequest();
httpc.open("POST", delete-file.php, true);
httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
httpc.send("filename=" + filename);//send text to delete-file.php
```
This code put into a script element in any given html file will allow that html file to delete any file on the system(including itself).


The simplest form of replication is caried out by copy.php, which simply copies a file to another location on the server.  Note that the source file can be remote!  Once servers are in a Trash Magic network, we can copy files from one to another at will with no restrictions.  The following is the full code of copy.php:

```
<?php

// copy from a url to a local file on server 

if(isset($_GET["from"]) && isset($_GET["to"])){
    $from = $_GET["from"];
    $to = $_GET["to"];
    copy($from,$to);
}


?>
<a href = "index.html">CLICK TO GO HOME</a>

<style>
a{
    font-size:3em;
}
</style>
```

This script shows another aspect of PHP, the fact that we can put HTML, CSS and JavaScript into it as needed to make it easier to interact with the client side of the web browser.  This has a big hyperlink in it that makes it easy for a user to navigate their browser back to "index.html", the home page of whatever server they're on.  To use copy.php, you can copy any file from anywhere to anywhere on a given server by using ? and &, which are two very important aspects of PHP.  They are standard ways of feeding information into a PHP, the basic format is copy.php?from=filename1&to=filename2 to copy filename1 to filename2.  Note that this will write over any existing file with that name, which is part of the point!  This is how we can make any page into any other page instantly with a click.  We can create hyperlinks which carry out the action of replacing index.html with some other page or Trash Magic app.  

For example, if we want to replace the main page of any given trash magic page(index.html) with a Trash Magic wall app on say www.us-highway-36.net/ffbus/, we can put the following into a browser bar and it will carry out the replacement:

```
https://www.us-highway-36.net/ffbus/copy.php?from=wall.html&to=index.html
```

And then when we click back to index.html and reload the browser the new page should appear!  This is why it is important to always also make another html file for any given index.html that backs it up. By having a default Trash Magic home page at specifically trashmagic.html, we can then always go back to that by entering the following into the browser bar to go back to regular Trash Magic:

```
https://www.us-highway-36.net/ffbus/copy.php?from=trashmagic.html&to=index.html
```
## System Replication 

One of the most fundamental characteristics which distinguishes trash magic from other information systems is how it replicates.  Any Trash Magic system is generally a set of files which are all replicated together as a set.  The list of files is in a JSON object stored in a text file called dna.txt.  This file is created by use of another Trash Magic PHP script called generate-dna.php, which does exactly what it says, simply lists the files on the system and puts them in a JSON object which separates out the PHP files specifically(more on this later).  The PHP script which generates the dna is listed in full here:

```
<a style ="font-family:Comic Sans MS;color:blue;font-size:1.5em;" href = "index.html">index.html</a>
<pre>
<?php
    $files = scandir(getcwd());
    $phpfiles = scandir(getcwd()."/php");
    $htmlfiles = [];
    foreach($files as $value){
        if(substr($value,-4) == ".txt" || substr($value,-4) == ".css" || substr($value,-5) == ".html" || substr($value,-3) == ".md" || substr($value,-3) == ".py" || substr($value,-3) == ".sh" || substr($value,-3) == ".js"){
            array_push($htmlfiles,$value);
        }
    }

    $dna = json_decode("{}");
    $dna->html = $htmlfiles;

    $dna->php = [];
    foreach($phpfiles as $value){
        if($value[0] != "."){
            array_push($dna->php,$value);
        }
    }
    echo json_encode($dna,JSON_PRETTY_PRINT);
    $file = fopen("dna.txt","w");// create new file with this name
    fwrite($file,json_encode($dna,JSON_PRETTY_PRINT)); //write data to file
    fclose($file);  //close file

?>
</pre>

```

This shows some very important features of PHP that we make use of in Trash Magic. The first of these is how [JSON](https://en.wikipedia.org/wiki/JSON) is handled by PHP. We first create the PHP variable $dna, an empty JSON object with the following code:

```
$dna = json_decode("{}");
```

Unlike in JavaScript, which uses a "dot" notation for objects, PHP uses a text arrow formed from a hyphen and a greater than sign.  The object has two arrays of strings, one called "html" which lists all non-PHP flies in the main directory of the set and one called "php" which lists only the PHP files.  The for loops clean out any files that are not of some type that we want replicated. Then a very important point in all this is that the code needs to be in a "pre" html element in order to actually display well, and then the syntax 

```
json_encode($dna,JSON_PRETTY_PRINT)
```
inside a pre will have the newlines that it needs to have to be readable. If it is not in a pre element, it will ignore newlines and all the data will be in a hard to read jumble. Also we use PHP's same file handling commands as we used in save-file.php and load-file.php to save the finished JSON file in dna.txt.  This list is now ready to pass along to the replicator!

The core replication code that copies a trash magic set to any given server is replicator.php. This is very fundamental to the structure of Trash Magic. It is the only thing a Trash Magician requires to replicate the whole system. One replicator.php script uploaded to any given server can clone whole universes of sets from any other server on any given network.  

The full code for replicator.php is as follows:


```
<?php
$dnaurl = "https://raw.githubusercontent.com/LafeLabs/TRASH-MAGIC-HANDBOOK/refs/heads/main/dna.txt";

if(isset($_GET["dna"])){
    $dnaurl = $_GET["dna"];
}

$baseurl = explode("dna.txt",$dnaurl)[0];
$dnaraw = file_get_contents($dnaurl);
$dna = json_decode($dnaraw);

mkdir("php");

copy("https://raw.githubusercontent.com/LafeLabs/TRASH-MAGIC-HANDBOOK/refs/heads/main/php/replicator.txt","replicator.php");


foreach($dna->html as $value){
    
    copy($baseurl.$value,$value);

}


foreach($dna->php as $value){
 
    copy($baseurl."php/".$value,"php/".$value);
    copy($baseurl."php/".$value,explode(".",$value)[0].".php");

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

```

This replicator replicates this book!  It replicates all of the elements!  Every chapter, every app, every page, every helper file, and every php script, it's all copied by this. This is a self-replicating ebook! This very book right here!

The code has in it lines which identify the URL of the dna to copy from and the replicator to copy from. The program assumes that the dna and php live on the same server, and finds the "base url" which is where all files are stored, and then fetches every single of of those files one by one using the insanely powerful php "[copy](https://www.php.net/manual/en/function.copy.php)" command.  Every file is copied!  But note that we copy both the PHP files as PHP files and also make copies of them in the php directory as .txt files. This allows us to edit PHP files as described below.  Note that any random files you want to copy from any random servers on any random network can also be manually added by adding more copy lines.  Also note that copying huge files sometimes fails.  This is never a problem for files of under a megabyte though, which all our files always are.  Even the full geometron.js library is under 100k!  




## How Trash Magic PHP self-edits



## PHP CODE AS RAW TEXT(alphabetical):

  - [php/branch.txt](php/branch.txt)
  - [php/compile-php.txt](php/compile-php.txt)
  - [php/copy-book.txt](php/copy-book.txt)
  - [php/copy.txt](php/copy.txt)
  - [php/delete-branch.txt](php/delete-branch.txt)
  - [php/delete-file.txt](php/delete-file.txt)
  - [php/edit-markdown-file.txt](php/edit-markdown-file.txt)
  - [php/generate-dna.txt](php/generate-dna.txt)
  - [php/list-branches.txt](php/list-branches.txt)
  - [php/list-files.txt](php/list-files.txt)
  - [php/load-file.txt](php/load-file.txt)
  - [php/local-replicator.txt](php/local-replicator.txt)
  - [php/print-markdown-file.txt](php/print-markdown-file.txt)
  - [php/read-markdown-file-mathjax.txt](php/read-markdown-file-mathjax.txt)
  - [php/read-markdown-file.txt](php/read-markdown-file.txt)
  - [php/replicator.txt](php/replicator.txt)
  - [php/save-file.txt](php/save-file.txt)
  - [php/save-png.txt](php/save-png.txt)
  - [php/upload-image.txt](php/upload-image.txt)