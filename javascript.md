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

