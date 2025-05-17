## [EDIT THIS PAGE](edit-markdown-file.php?filename=javascript.md)

## [home](index.html)

# TRASH MAGIC JAVASCRIPT

JAVASCRIPT IS THE LANGUAGE WHICH DOES ACTIONS IN A WEB DOCUMENT.  WE USE JAVASCRIPT TO MAKE "APPLICATIONS" ALSO KNOWN AS "APPS" THAT CAN RUN IN A WEB BROWSER.  JAVSCRIPT IS A "C-LIKE LANGUAGE" IN THAT IT LOOKS LIKE THE MUCH OLDER LANGUAGE KNOWN AS C.  JAVASCRIPT IS NOT RELATED TO JAVA.  WE CAN ADD JAVASCRIPT CODE ANYWHERE IN AN HTML DOCUMENT WITH THE "SCRIPT" TAG.  JAVASCRIPT IS ONE OF THE THREE CORE LANGUAGES OF THE WORLD WIDE WEB, ALONG WITH [HTML](https://en.wikipedia.org/wiki/HTML) AND [CSS](https://en.wikipedia.org/wiki/CSS).


LEARN JAVASCRIPT AND YOU CAN CREATE ANY APPLICATION YOU WANT!  JAVASCRIPT IS ALL POWERFUL!  JAVASCRIPT CAN BE USED FOR ANYTHING YOU MIGHT POSSIBLY WANT TO DO WITH MODERN INFORMATION TECHNOLOGY!

## JAVASCRIPT LINKS

 - [W3 SCHOOLS TUTORIAL](https://www.w3schools.com/js/)
 - [WIKIPEDIA ARTICLE](https://en.wikipedia.org/wiki/JavaScript)
 - [MOZILLA DEVELOPMENT NETWORK LINK](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
 - [CODEPEN.IO](https://codepen.io/)
 

A GREAT DEAL OF THE POWER OF JAVASCRIPT IS THE FREE LIBRARIES WHICH ARE AVAILABLE FOR EVERYONE ON THE ENTIRE WORLD WIDE WEB TO USE FOR FREE!  THERE ARE NUMEROUS SUCH LIBRARIES!  THEY DO MATH, ART, MUSIC, TYPE SETTING, DATA SCIENCE, AND JUST ABOUT ANYTHING ELSE YOU CAN IMAGINE!  

THERE ARE A SET OF CORE JAVASCRIPT LIBRARIES WHICH ARE CRITICAL FOR MAKING TRASH MAGIC WORK.  THOSE LIBRARIES ARE AS FOLLOWS:

 - [QRCODE.JS](https://davidshimjs.github.io/qrcodejs/)
 - [P5.JS](https://p5js.org/)
 - [SHOWDOWN.JS](https://showdownjs.com/)
 - [HAMMER.JS](https://hammerjs.github.io/)
 - [MATHJAX.JS](https://hammerjs.github.io/)
 - [MATH.JS](https://mathjs.org/)
 - [ACE.JS](https://ace.c9.io/)
 - [TRACK-LIST.JS](https://github.com/mirisuzanne/track-list)
 - [QRCODE.JS](https://github.com/mirisuzanne/track-list)

AND THERE ARE LIBRARIES WHICH ARE PART OF TRASH MAGIC, NAMELY 

 - [TRASHMAGIC.JS](trashmagic.js)
 - [GEOMETRON.JS](geometron.js)
 - [TAROT.JS](tarot.js)

## Javascript in Organic Media

Oragnic media is media which can be created, edited, deleted, and replicated from the client side of a web browser. This means that anyone who loads an organic web page into a browser can carry out all these actions on the files on the server. It is an anarchist approach to information technology, in which there are no private or protected files on any given network.  

The most basic functions of this are loading and saving files from the server using the front end of the browser.  We use the [XMLHttpRequest object](https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest) to pass information between the front and back side of the browser.  We use the [encodeURIComponent](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/encodeURIComponent) function to make sure the data getting passed is in a form compatible with being a [URI](https://developer.mozilla.org/en-US/docs/Glossary/URI) so that it can be passed through [HTTP](https://developer.mozilla.org/en-US/docs/Web/HTTP) without causing any problems. 


The Trash Magic Wall is perhaps the simplest Trash Magic application(app) which demonstrates both loading and saving of files from the server side file system. In the wall app, a text file called wall.txt is loaded into a [textarea html element](https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/textarea) when the file [wall.html](wall.html) file is loaded into a browser.  This is carried out with the following code snippet:


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

This code starts by creating an empty string variable called wall, which will contain the text in the actual wall.  The name of the file, wall.txt,  is then held in another string variable called currentfile. The code then creates a new XMLHttpRequest object which it names httpc. It then uses the Trash Magic php script [load-file.php](php/load-file.php) to "GET" the contents of the file, first using the "open" method to initialize a request and then the "send" method to send it(whatever that means).  Then, the onreadystatechange method detects when the ready state of the object changes to completed, which it tests for using the readyState and status methods.  When the information is finally delivered to the web browser, it is in the instance property "responseText", and the string variable "wall" is set to the value of the returned data. Finally, that string is put into the textarea element called "wall" with the input attribute "value" of the wall element which we can access using the JavaScript method "[getElementById](https://developer.mozilla.org/en-US/docs/Web/API/Document/getElementById)".  

This completes the process by which any file can be loaded into a browser.  But we also need to be able to save to files if we are to have a fully organic media system.  This is done with the Trash Magic PHP script [save-file.php], as shown in the following code snippet from [wall.html](wall.html):

```
document.getElementById("wall").onkeyup = function() {
    wall = this.value;
    data = encodeURIComponent(this.value);
    var httpc = new XMLHttpRequest();
    var url = "save-file.php";        
    httpc.open("POST", url, true);
    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
    httpc.send("data="+data+"&filename=" + currentfile);//send text to save-file.php
}
```

This code is a function built into the "[keyup](https://developer.mozilla.org/en-US/docs/Web/API/Element/keyup_event)" event of the HTML element "wall".  Note that my methods of using JavaScript here are perhaps archaic and eccentric, but they work.  At some point a reader will no doubtedly want to rewrite this using modern JavaScript best practices, presumably with some kind of event listener syntax that I still find hard to understand. But what it actually does is any time a user of the web page types with their cursor in the "wall" textarea, the keystrokes on their keyboard will fire the event that saves the whole thing on every key stroke.  Any other user who loads the page on their machine will then see the wall in the most recent state as of the time when their browser loads the file.  If two users both edit at the same time, they will edit over the top of each other and make a mess!  We assume in Trash Magic that many users interact with the same web page, but not all at the same time.  

The one more thing we need in order to be able to build full load and save capability into any app we want is the ability to load and save JSON data. [JSON](https://en.wikipedia.org/wiki/JSON) is the JavaScript Object Notation, and is a very widely used format for moving data between different information systems.  We can use JSON to pass data from one app to another, as well as from JavaScript that runs in the web browser and Python which runs on a server(which we can also edit using Trash Magic).  JSON is the format used by Facebook to build their infamous "facebook feed".  It is very widely used across all of technology today.  

An example Trash Magic app which uses JSON is the TRASH MAGIC SET app [set.html](set.html).  The following is the code snippet which loads the JSON data in [set.txt](set.txt):

```
trashset = [];
setindex = 0;

var httpc = new XMLHttpRequest();
httpc.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        trashset = JSON.parse(this.responseText);
        document.getElementById("titleinput").value = trashset[setindex].title;
        document.getElementById("textbox").value = trashset[setindex].text;
        for(var index = 0;index < trashset.length;index++){
            var newdiv = document.createElement("DIV");
            newdiv.innerHTML = trashset[index].title;
            newdiv.className = "element";
            document.getElementById("scroll").appendChild(newdiv);
            newdiv.id = "e" + index.toString();
            newdiv.onclick = function(){
                setindex = parseInt(this.id.substring(1));
                document.getElementById("titleinput").value = trashset[setindex].title;
                document.getElementById("textbox").value = trashset[setindex].text;
            }
        }
        elements = document.getElementsByClassName("element");
        rainbow(elements);
    }
};
httpc.open("GET", "load-file.php?filename=trashset.txt", true);
httpc.send();
```

One incredibly awesome thing about JavaScript is that it does not distinguish between arrays and JSON objects. You can make arrays of objects and objects with arrays in them with impunity, creating very general objects of all kinds!  For dealing with JSON, the core element of the code snippet above is 

```
    trashset = JSON.parse(this.responseText);
```

which is where the raw data is converted into an actual JSON object that can be manipulated using JavaScript.  What is harder to remember than "JSON.parse" is the syntax for saving JSON files as text with a actually human readable format that has newlines and tabs or spaces to create something that has some order on your computer screen.  The following code snippet from [set.html](set.html) shows how we save JSON code with a tab or some spaces:

```
function savejson(){
    
    var url = "save-file.php";        
    var httpc = new XMLHttpRequest();
    httpc.open("POST", url, true);
    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    httpc.send("data="+encodeURIComponent(JSON.stringify(trashset,null,"    "))+"&filename=trashset.txt");//send text to save-file.php
    
}

```

The most important code here for understanding how we handle JSON is this:

```
 httpc.send("data="+encodeURIComponent(JSON.stringify(trashset,null,"    "))+"&filename=trashset.txt");
```

Note that the [stringify method](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/JSON/stringify) of the [JSON object](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/JSON) has a "replacer" which we have to set to null in addition to the string variable that specifies the indent, which can be tabs or some spaces.  

Now we have the tools to load any file, be it a text or code file or a JSON file, and save it. This is enough for a totally organic media system, where all users on a network can edit all files. This is a network without private data. It is a network without personal data. It is a network without user access control. It is a network where property has been abolished, a truly free network. But we must also be able to delete any file on the system.  

To understand how we delete files, let's take a look at the Trash Magic app [delete-html.html](delete-html.html).  This starts with a code snippet that also gets us the very important function of listing files:

```
files = [];
var httpcUpload = new XMLHttpRequest();
httpcUpload.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        files = JSON.parse(this.responseText);
        loadfeed();
    }
};
httpcUpload.open("GET", "list-files.php", true);
httpcUpload.send();

```

This is how we fetch a list of files. We use the Trash Magic PHP script [list-files.php](php/list-files.txt) to deliver a JSON array of strings, each of which is the name of a file.  This is then stuck in a global JSON array variable we call files.  Some people do not like global variables, but those people are perhaps too invested in the propertarian world view and have not fully embraced anarchist web development ideas.  When a user loads a web page into a web browser, that document becomes their entire reality.  It is an act of supreme hubris to declare global variables all the time, but that is totally justified by the power of this medium(HTML).  That global variable is then available for the function loadfeed() to do what it does.  

Next, we have a function which takes the list of files and generates a feed of text elements in a user's web browser which is a list of all files on the system along with a DELETE button which is a big red "X":

```
function loadfeed(){
    for(var index = 0;index < files.length;index++) {
        if(files[index].includes(".") && files[index] != "index.html" && (files[index].substring(files[index].length - 5) == ".html") || (files[index].substring(files[index].length - 4) == ".css") || (files[index].substring(files[index].length - 4) == ".txt")  || (files[index].substring(files[index].length - 3) == ".js") || (files[index].substring(files[index].length - 3) == ".md") || (files[index].substring(files[index].length - 3) == ".MD")){
            var newuploadbox = document.createElement("DIV");
            newuploadbox.classList.add("filebox");
            document.getElementById("feed").appendChild(newuploadbox);
            var newdiv = document.createElement("DIV");
            newdiv.innerHTML = files[index];
            newdiv.className = "filelabel";
            newuploadbox.appendChild(newdiv);
        
            var newspan = document.createElement("SPAN");
            newspan.innerHTML = "X";
            newuploadbox.appendChild(newspan);
            newspan.classList.add("button");
            newspan.classList.add("deletebutton");
            newspan.onclick = function(){
                var filename = this.parentElement.getElementsByClassName("filelabel")[0].innerHTML; 
                var httpc = new XMLHttpRequest();
                var url = "delete-file.php";         
                httpc.open("POST", url, true);
                httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
                httpc.send("filename=" + filename);//send text to delete-file.php
                this.parentElement.parentElement.removeChild(this.parentElement);
            }           
        }
    }    
}

```

This function creates a set of [div elements](https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/div), one for each file on the system, which have two [span elements](https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/span), one for the file name and one for the delete button which is a big red X.  To make the DELETE buttons into buttons we use the ["onclick" function](https://www.w3schools.com/jsref/event_onclick.asp) on the ["click" event](https://developer.mozilla.org/en-US/docs/Web/API/Element/click_event) which is built into JavaScript. When a delete button is clicked, the code once again creates a XMLHttpRequest to pass information between the front end and back end of the system, and engages with the trash magic PHP script [delete-file.php](php/delete-file.txt), which deletes the file. Also, this bit of code deletes the object from the DOM(Document Object Model) in the HTML document, removing it from what the users sees. The effect of this is that clicking a delete button INSTANTLY and IRREVERSIBLY deletes a file and aloso removes any record of it existing from the system, and removes it from a user's view!

Some readers may find this shocking. It is an extreme position to take as an information system designer that all users on the system are able to instantly delete all files.  But this is absolutely essential for the long term health and survival of the network.  Making it easy and fast to delete is how we protect the system from influx of bad information.  If you want good content to survive, you replicate it fast and far. If it replicates, and bad content is deleted, the overall flow is for things to get better over time. We recall some of the laws of trash magic, which are that 

1. everything replicates
2. everything evolves
3. everything dies


Media death is an important part of organic media being a functioning media ecosystem.

## File Uploads and the Freebox

In addition to creating, editing, deleting and replicating files, we also want to be able to upload files from any given user device to any given server. Again, this is an anarchist mode of replication where we have no private user data and only share what we want to share with the whole community.  Any harmful material is immediately deleted. 

In order to carry out this task of uploading, we use yet another Trash Magic PHP script, upload-image.php, as well as our old friend list-files.php to list the files and delete-file.php so that we can have a hair trigger on deleting any unwanted images quickly. 

The main Trash Magic app for image sharing is [freebox.html](freebox.html).

The way we create an uploader is with an [HTML form element](https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/form) which calls upload-image.php with an "action" as follows:


```
 <form id = "uploadform" action="upload-image.php" method="post" enctype="multipart/form-data">
                <span id ="uploadspan">UPLOAD:</span>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit" id ="submitinput">
    </form>   
```

That HTML snippet alone is enough to create an upload button!  But we want to also see all the images in a folder and be able to delete them, so we add a div to the body as follows:

```
<div id = "imagefeed"></div>
```

and then use JavaScript to create a list of images with DELETE buttons to delete all unwanted images:


```
deletemode = true;
//deletemode = false;

uploadImages = [];

var httpcUpload = new XMLHttpRequest();
httpcUpload.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        uploadImages = JSON.parse(this.responseText);
        loadimagefeed();
    }
};
httpcUpload.open("GET", "list-files.php", true);
httpcUpload.send();

function loadimagefeed(){

    for(var index = 0;index < uploadImages.length;index++) {
        if(uploadImages[index].includes(".png") || uploadImages[index].includes(".PNG") || uploadImages[index].includes(".jpg") || uploadImages[index].includes(".JPG") ||uploadImages[index].includes(".jpeg") || uploadImages[index].includes(".gif") ||uploadImages[index].includes(".GIF")){
            
            var newuploadbox = document.createElement("DIV");
            newuploadbox.classList.add("imagebox");
            var newimg = document.createElement("IMG");
            newimg.src = uploadImages[index];
            newimg.classList.add("uploadimage");
            newuploadbox.appendChild(newimg);
            document.getElementById("imagefeed").appendChild(newuploadbox);
    
            var newdiv = document.createElement("DIV");
            newdiv.innerHTML = uploadImages[index];
            newdiv.className = "filelabel";
            newuploadbox.appendChild(newdiv);
        
            if(deletemode){
                var newspan = document.createElement("SPAN");
                newspan.innerHTML = "DELETE";
                newuploadbox.appendChild(newspan);
                newspan.classList.add("button");
                newspan.classList.add("deletebutton");
                newspan.onclick = function(){
                    var imageurl =this.parentElement.getElementsByClassName("uploadimage")[0].src; 
                    imagefilename = imageurl.split("/")[imageurl.split("/").length-1];
                    console.log("imagefilename");
                    var httpc = new XMLHttpRequest();
                    var url = "delete-file.php";         
                    httpc.open("POST", url, true);
                    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
                    httpc.send("filename=" + imagefilename);//send text to deletefile.php
                    this.parentElement.parentElement.removeChild(this.parentElement);
                }   
            }   
            
            
        }
    }    
}
```

And that's the FREEBOX!

That alone is a very powerful social media tool. It's a great way to get user generated content quickly and easily in a private wireless network in a venue space.  Always have QR codes(see below) that direct users to a freebox if you want to make it easy to use one.
 

## Ace.js and Code Editors

We now have a bare bones system for loading, saving, and deleting arbitrary files. But in order to build a fully organic information technology system, we also want to be able to edit code using software that knows something about whateve language we are editing the code of. To do this, we use the JavaScript library [Ace.js](https://ace.c9.io/), which has syntax highlighting for a wide range of commonly used languages, including all of the ones we use here.  Ace is a huge help in building Trash Magic! Without it, we would not be able to build such a light weight system for self-editing of code.  

We have constructed several code editing apps in Trash Magic.  They are the following:

 - [edit-index.html](edit-index.html)
 - [edit-html.html](edit-html.html)
 - [edit-book.html](edit-book.html)
 - [edit-php.html](edit-php.html)
 
Taken together, the code editors of Trash Magic are a totally self-contained self-editing set of files!  edit-html.html literally edits itself. 

To use the Ace.js library, we add the following code snippet to the "head" element of the document:

```
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.6/ace.js" type="text/javascript" charset="utf-8"></script>
```

Then to make an editor, we create the following bit of HTML in the body of the document:

```
<div id="maineditor" contenteditable="true" spellcheck="false"></div>
```

And then we create an editor by use of the following JavaScript code:

```

editor = ace.edit("maineditor");
editor.setTheme("ace/theme/github");
//editor.setTheme("ace/theme/vibrant_ink");
editor.getSession().setMode("ace/mode/html");
editor.getSession().setUseWrapMode(true);
editor.$blockScrolling = Infinity;
editor.setTheme("ace/theme/vibrant_ink");
```

To load the file into the editor we use the following code:

```
currentFile = "index.html";
var httpc = new XMLHttpRequest();
httpc.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        filedata = this.responseText;
        setmode();
        editor.setValue(filedata);
        document.getElementById("currentfilename").innerHTML = currentFile;
    }
};
httpc.open("GET", "load-file.php?filename=" + currentFile, true);
httpc.send();
```

The above function calls yet another function, setmode(), which sets the code mode. This is awesome!! It has many language choices!! See below for a list of languages in the code:

```
function setmode(){
    if(currentFile.substring(currentFile.length-3,currentFile.length) == ".py"){
        editor.getSession().setMode("ace/mode/python");
    }
    if(currentFile.substring(currentFile.length-3,currentFile.length) == ".txt"){
        editor.getSession().setMode("ace/mode/text");
    }    
    if(currentFile.substring(currentFile.length-3,currentFile.length) == ".md"){
        editor.getSession().setMode("ace/mode/markdown");
    }
    if(currentFile.substring(currentFile.length-4,currentFile.length) == ".tex"){
        editor.getSession().setMode("ace/mode/latex");
    }
    if(currentFile.substring(currentFile.length-3,currentFile.length) == ".js"){
        editor.getSession().setMode("ace/mode/javascript");
    }    
    if(currentFile.substring(currentFile.length-4,currentFile.length) == ".ino"){
        editor.getSession().setMode("ace/mode/java");
    }   
    if(currentFile.substring(currentFile.length-4,currentFile.length) == ".css"){
        editor.getSession().setMode("ace/mode/css");
    }       
    if(currentFile.substring(currentFile.length-4,currentFile.length) == ".php"){
        editor.getSession().setMode("ace/mode/php");
    }       
    if(currentFile.substring(currentFile.length-5,currentFile.length) == ".html"){
        editor.getSession().setMode("ace/mode/html");
    }   
    if(currentFile.substring(currentFile.length-5,currentFile.length) == ".json"){
        editor.getSession().setMode("ace/mode/json");
    }       
    
}
```

That's a lot of languages!  It's everything we need to build up a whole information system.  

Finally, to fully understand the editor code life cycle, we look at the function which saves the file as a user edits it in a browser:

```
document.getElementById("maineditor").onkeyup = function(){
    data = encodeURIComponent(editor.getSession().getValue());
    var httpc = new XMLHttpRequest();
    var url = "save-file.php";        
    httpc.open("POST", url, true);
    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
    httpc.send("data="+data+"&filename="+currentFile);//send text to save-file.php
}
```

And that's it!  Ace.js combined with the basic elements of Trash Magic to create a system of code files which can edit themselves and each other, all on the client side of a browser.  

## Markdown: The Magic Book

Now that we can edit all of the kinds of code, we will use yet another fantastic JavaScript library, [showdown.js](https://showdownjs.com/), to convert [markdown](https://en.wikipedia.org/wiki/Markdown) code into HTML which can be displayed well in a web browser. Markdown is a critical element of the system, since it is how this book is written and how all documentation on Github and similar free open source resources is written. It is also a standard part of modern scientific computing, forming an important part of the [jupyter notebook system](https://en.wikipedia.org/wiki/Project_Jupyter).   Showdown.js take text in a Markdown format and converts it to HTML. Plain JavaScript and Trash Magic can then be used to take markdown files and turn them into something displayed in the browser.  

To invoke the showdown.js library, we include the following code in the head element of an html document:

```
<script src = "https://cdnjs.cloudflare.com/ajax/libs/showdown/1.8.6/showdown.js"></script>
```

Now, we create a showdown converter object:

```
var converter = new showdown.Converter();
converter.setOption('literalMidWordUnderscores', 'true');
converter.setOption('tables', 'true')
```
Then to actually load a markdown file, which we call a "scroll" in Trash Magic, we use the following code:

```
filename = "book.md";
loadscroll("book.md");

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
        }
    };
    httpc666.open("GET", "load-file.php?filename=" + scrollname, true);
    httpc666.send();

}

```

And that is how this book works! This book is a set of markdown files which are loaded by the load-file.php script, converted to html with showdown.js, and then displayed in a browser with css code to decide what it looks like. 

One final point about the markdown conversion is that if we want to write scientific and technical documents which have equations embedded in them, we want to be able to use the same kind of mathematical type setting that both Github and Jupyter use: [LaTeX](https://en.wikipedia.org/wiki/LaTeX).  To do this we use the [Mathjax JavaScript library](https://www.mathjax.org/).  If we want to invoke this, we generally add some code to specify how it will work along with calling the remote library, by adding the following to the head element of an html document:

```
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
```

Now the key thing is that any time a scroll is loaded we want to run the follwing code *after the code gets loaded*:

```
MathJax.Hub.Typeset();//tell Mathjax to update the math
```

So for example, we update the scroll load function as follows:

```

function loadscroll(scrollname){
    filename = scrollname;
    document.getElementById("editlink").href = "edit-markdown-file.php?filename=" + filename;
    document.getElementById("scrollscroll").innerHTML = "";
    document.getElementById("scrollscroll").style.display = "block";
    var httpc666 = new XMLHttpRequest();
    httpc666.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            scroll = this.responseText;
            rawhtml = converter.makeHtml(scroll);
            document.getElementById("scrollscroll").innerHTML = rawhtml;
        	MathJax.Hub.Typeset();//tell Mathjax to update the math
        }
    };
    httpc666.open("GET", "load-file.php?filename=" + scrollname, true);
    httpc666.send();
}

```



## Qrcode apps with qrcode.js

Qr codes form an essential element of the Trash Magic system. They allow us to turn physical objects into hypertext in a powerful way.  In the early days of QR Codes they were not widely used, and one usually had to download a special app to read them. But no more!  Now, all the major smart phone manufacturers ship their products with built in QR code recognition in their camera software.  

QR codes can point to any [url](https://en.wikipedia.org/wiki/URL)!  This is a vastly more powerful tool than people have fully realized yet!  They can point to both puplic web pages but also to private network resources on a local wifi network.  Public web pages can point to physical spaces using map pages which point back to physical spaces which have objects with QR codes which point back to web resources. Thus, QR Codes can create complext hypertext networks that blur the line between physical spaces and hypertext documents in HTML, and between local physical web servers and global cloud servers.

To create QR code apps we use the [qrcode.js](https://davidshimjs.github.io/qrcodejs/) JavaScript library.

To invoke the QR code library, we add the following code to the head element of a html file:

```
<script src = "https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
```


Then we will create a div element with the id "qrcode" by adding the following code to the body somewhere:

```
<div id = "qrcode"></div>
```

And then to create a QR code, we put the following code somewhere in a script element:

```
codesquaresize = 512;
globalurl = window.location.href;
qrcode = new QRCode(document.getElementById("qrcode"), {
	text: globalurl,
	width: codesquaresize,
	height: codesquaresize,
	colorDark : "#000000",
	colorLight : "#ffffff",
	correctLevel : QRCode.CorrectLevel.H
});

```

this will make a qr code that is 512 pixels squared, with the url in globalurl, with full conrast from black to white, specified in colorDark and colorLight.  This is all that is needed to make a qr code that points to whatever page it's on. The JavaScript code:

```
globalurl = window.location.href;
```

fetches the url of whatever page a users browser is pointed to.  This is how we make mobile web pages instantaneously self-relpicating. If someone loads a Trash Magic page on a mobile device, they can hold it up and anyone else around them can scan to instantly be on the same page. And the web developer never needs to go add some image of the QR code, they can just copy and paste the code here and every page will always have a QR cod pointing back to itself.  


The main Trash Magic QR code apps are:

 - [qrcode.html](qrcode.html)
 - [qrcode-page.html](qrcode-page.html)
 - [qrcode-list.html](qrcode-list.html)
 - [edit-qrcode-list.html](edit-qrcode-list.html)


The first of these, [qrcode.html](qrcode.html), simply creates one single big qr code of whatever url you put in the input.  As simple as this is, it is a very important and powerful element of the Trash Magic system. This allows any user on any page in any system to create a big qr code to any url to print and paste on something. This can be used to create a big cardboard sign which can be scanned from a road by passerby, a physical hyperlink made of trash.  Many people have access to free printer resources in various places at work or at home, and can contribute to the spread of trash magic by using this one simple app.

The second one, [qrcode-page.html](qrcode-page.html), creates a whole page of identical QR codes, each with the same URL and whatever custom text you put in. In order to get a whole bunch of QR codes to load, we engage in some shenanigans with passing of base 64 code between the object that has the qr code and various images that we add to an HTML document. 


The main feature to note in how we create the array of QR codes in JavaScript in that app is the following function:

```
function loadtable(){
    globalurl = document.getElementById("urlinput").value;
    urltext = document.getElementById("textinput").value;
    qrcode.makeCode(globalurl);
    pngcode = document.getElementById("qrcode").getElementsByTagName("IMG")[0].src;
    document.getElementById("linklink").href = globalurl;
    document.getElementById("linklink").innerHTML = globalurl;
    table.innerHTML = "";
    for(var row = 0;row < 8;row++){
        var newtr = document.createElement("TR");
        table.appendChild(newtr);
        for(var col = 0;col < 8;col++){
            var newtd = document.createElement("TD");
            newtr.appendChild(newtd);
            var newimg = document.createElement("img");
            newimg.style.width = "120px";
            newimg.src = pngcode;
            newtd.appendChild(newimg);
        }
        var newtr = document.createElement("TR");
        table.appendChild(newtr);
        for(var col = 0;col < 8;col++){
            var newtd = document.createElement("TD");
            newtr.appendChild(newtd);
            newtd.innerHTML = urltext;
            newtd.className = "urltext";
        }
    }
}

```

This code builds a table, creating rows, adding td elements, and then putting images in the td's and setting the src attriute of the images to be a copy of the image created by the qrcode.js library inside the qrcode div element called "qrcode".  

The second two apps are to edit and print sets of different QR codes.  This creates a physical link tree, where a physical piece of trash with a single piece of paper wheate pasted to it can point to a whole set of different things represented by urls.  These can be ideas, web pages, apps, servers, people, places, machines, books, music, really anything you can possibly imagine and express with language.  

Because it's short, we will include the entire source code for [qrcode-list.html](qrcode-list.html) here:


```
<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <!--

TRASH MAGIC!

PUBLIC DOMAIN NO COPYRIGHT!

SELF-REPLICATING HTML!

CAPS LOCK ALWAYS ON!

   -->
   <!--Stop Google:-->
   <META NAME="robots" CONTENT="noindex,nofollow">
<link href="data:image/x-icon;base6r4,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAAP//AP///wANAP8A5Dz6ABueRwAAt/8A6BonABo86AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAREREREREREREREAAAEREREREQCIgREREd3dwAAB3d3d3d3d3d3d3d3d3d3d3d3d3VVVVVVVQAFVVAAVVVQIiBRAiIBEQIAIBECAAERAgAgFgIABmYCIiBmAiIGZgIiIGYCIgZmYCIAaIAAMzMzAAiIiIiIiIiIiIiIiIiIiIiIgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" rel="icon" type="image/x-icon">

   <title>HYPERSPACE</title>    
   <script src = "https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</head>
<style>
body,input{
    font-family:Comic Sans MS;
}
a{
    font-family:Comic Sans MS;
    COLOR:BLACK;
}
td{
    padding:1em 1em 1em 1em;
}
</style>
<body>    
<table id = "maintable">
</table>
<script>


codesquaresize = 170;
numberofcolunms = 8;

marginsize = 40;
fontsize = 12;


currentfile = "qrcode-list.txt";
hyperspace = [];
var httpc = new XMLHttpRequest();
httpc.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        hyperspace = JSON.parse(this.responseText);
        loadtable();

    }
};
httpc.open("GET", "load-file.php?filename=" + currentfile, true);
httpc.send();


function loadtable(){
    document.getElementById("maintable").innerHTML = "";
    var newtr = document.createElement("TR");
        document.getElementById("maintable").appendChild(newtr);
        for(var index = 0;index < hyperspace.length;index++){
            if(index > 0 && index%numberofcolunms == 0){
                var newtr = document.createElement("TR");
                document.getElementById("maintable").appendChild(newtr);  
            }
            var newtd = document.createElement("TD");
            newtr.appendChild(newtd);
            var newspan = document.createElement("span");
            var newa = document.createElement("A");
            
            
            newa.innerHTML = hyperspace[index].text;
            newa.href = hyperspace[index].url;
            var newdiv = document.createElement("span");
            qrcode = new QRCode(newdiv,{
            	text: hyperspace[index].url,
            	width: codesquaresize,
            	height: codesquaresize,
            	colorDark : "#000000",
            	colorLight : "#FFFFFF",
            	correctLevel : QRCode.CorrectLevel.H
            });
            newspan.appendChild(newdiv);
            newspan.appendChild(newa);
            newtd.appendChild(newspan);
        }
}


</script>
</body>
</html>
```

This app creates a JSON object called "hyperspace" loaded from a file called "qrcode-list.txt", which is an array of JSON objects which each have the attributes "url" and "text", for the url to point the qr code to and the text to display, respectively.  The JavaScript goes through each element of the hyperspace array and bilds up a table with spans in the elements which it draws QR codes in as well as a "a" element hyperlink that has the text as a hyperlink to whatever the url is. So that when this file loads in a browser, a user can click to go to the link, but when it's printed a user can scan to go to the same link. This is media that crosses the boundaries between the physical and the virtual.

The list of URLS and text elements stored in qrcode-list.txt is edited with the [edit-qrcode-list.html](edit-qrcode-list.html) app.  The details of this app are beyond the scope of this chapter, since it uses Geometron.

## music players with [track-list.js](https://github.com/mirisuzanne/track-list)

If we want to create music players, we can use a free open source JavaScript Library called [track-list.js](https://github.com/mirisuzanne/track-list) to play tracks in order and provide a user interface for play, rewind and so on.  Alternatively, we can use the [WebAmp](https://webamp.org/)
 JavaScript library.  
 
 
 
## P5.js and p5sound.js

P5JS is one of the most powerful technologies ever created. 

## Math and physics in JavaScript

JavaScript has no built in support for complex numbers. This can be a problem for various scientific applications.  To deal with any complex number math we may need, we can use [math.js](https://mathjs.org/).  


## Embedded Systems in JavaScript

[Microsoft MakeCode](https://www.microsoft.com/en-us/makecode) is a system for controlling a variety of physical hardware devices using a web-based graphical language.  However, under the hood of that graphical language is JavaScript!  So this is a way to make hardware control into JavaScript.  I konw very little about this other than that it works, and seems to be pretty easy to get started on. 

