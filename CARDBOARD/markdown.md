## [EDIT THIS FILE](edit-markdown-file.php?filename=markdown.md)

## [index.html](index.html)

# Markdown: The Magic Book

Markdown is the language this book is written in. It is designed to be as "lightweight" a language as possible in the sense that it tries to both be as simple as possible and also require as few added characters as possible. The main reason we use it is that it is already very widely used for documentation of technology.  It is the language of the standard "README.md" file which is ubiquitous on open source code repositories, including ALL of the Trash Magic code sets. Markdown is also now widely used in scientific computing in the Jupyter notebooks.

Markdown is not always considered to be as "fundamental" a language of the World Wide Web as HTML, CSS, and JavaScript, but a case could be made that it is just as fundamental.  A very wide range of technology is now described for humans using this language. Without such documentation, the rest of these systems is not usable. Humans are an essential part of all human technology, and the language we use to tell other humans about what we've built is critical!

In Trash Magic, we display all documents in a web browser in HTML but write in Markdown. The way we accomplish this magic is with a FREE JavaScript Library called [Showdown.js](https://showdownjs.com/).  This critical piece of technology infrastructure which we are using to create the whole documentation media system in Trash Magic is created by one person, a medical doctor from Portugal named [Estevão Soares dos Santos](https://github.com/tivie).  To use this free library, we generally use the remote resource hosted for the whole of humanity at cloudflare.com by adding the following line of code to the head element of a HTML file we want to build Markdown functionality into:


```
<script src = "https://cdnjs.cloudflare.com/ajax/libs/showdown/1.8.6/showdown.js"></script>
```

 To load a Markdown file we begin by loading it like any other file in the Trash Magic system, by using load-file.php, which doesn't care what kind of file we are loading, as long as it's some kind of text. Once the file is loaded, if we want to display it as HTML we will create a "converter object" in Showdown and then choose a couple options as follows:
 
 ```
 var converter = new showdown.Converter();
// for more on options see here:
// https://github.com/showdownjs/showdown/wiki/Showdown-Options
converter.setOption('literalMidWordUnderscores', 'true');
converter.setOption('tables', 'true')
 ```
 
To convert a string variable called "scroll" which contains the contents of a Markdown file into HTML we use the following code:

```
rawhtml = converter.makeHtml(scroll);
```
 
And then put that HTML code into some HTML element in your document with code like this:

```
document.getElementById("scrollscroll").innerHTML = rawhtml;
```

This can be either put into a big scroll that covers the whole screen or some more specific space on the screen of the device pointed at the web page. 

Like HTML, there are really two very different things we want to do with Markdown code: display it and edit it.  The above code demonstrates using the [showdown.js](https://showdownjs.com/) library to display it, but for editing we also want to use  yet another free JavaScript library, [Ace.js](https://ace.c9.io/). This library has syntax highlighting for a large range of popular computer languages including Markdown. 

For the most part, we either edit *or* render into HTML, not both at the same time. The exception is the very useful Trash Magic app [readme.html](readme.html), which both displays and edits the README.md Markdown file that is present in all Trash Magic code sets, as well as most online open source code repositories.

This book was written with a combination of two Trash Magic markdown apps, which are [edit-book.html](edit-book.html) and [edit-markdown-file.php](edit-markdown-file.php). The first of these edits any and all markdown files in any given directory with a Trash Magic system in it.  Thus, any Trash Magic directory can become a whole book any time.  New markdown files are created in the [edit-book.html](edit-book.html) by putting the name of the new markdown file into the input at the top left of the screen, where it says "New File Name(end with .md)".  Be sure to end each new Markdown file with the appropriate .md suffix, or the editor won't know it's a markdown file.  

The sibling app to edit-book.html is [read-book.html](read-book.html), which also lists all the .md files in any given Trash Magic directory, but rather than edit them, it renders them all into HTML and displays the formatted document.  Read-book.html can be edited using [edit-html.html](edit-html.html) to change what the book looks like. Change the CSS code in the style tag in read-book.html in order to change what it looks like.  

To read a specific markdown file, we use the Trash Magic app read-markdown-file.php and pass it a filename to read.  We do this with the question mark and equals sign in a url in a browser. So for example to read book.md, we can use the following link:

### [read-markdown-file.php?filename=book.md](read-markdown-file.php?filename=book.md)

Note that the file does not have to be on the local server, it can be any Markdown file anywhere on the Internet, including a pastebin file or README file on some random Github Repository!

Markdown files are listed by [generate-dna.php](generate-dna.php) and copied by replicator.php. This makes them a part of the overall self-replicating set of files which make up Trash Magic.

Markdown is a critical componenent of how we create a fully self-replicating sets of files, because it is how humans tell other humans how to copy all the rest of it.  This book is intended to be a spore of a whole network of self-replicating books which include Markdown files together with the rest of the system.

Also, TRASHBOOK is an earlier version of the system, which we have used both to write other books by TRASH ROBOT which document TRASH MAGIC and GEOMETRON, but we've also used it to create self-replicating e books that are in the Public Domain on [Project Gutenberg](https://www.gutenberg.org/).  These books can be replicated from server to server with a click using client side JavaScript.

One other part of Markdown on the web is how we typeset mathematics. Whenever we wish to display mathematical equations in Trash Magic, we do so using the JavaScript library [mathjax.js](https://www.mathjax.org/).  This library is based on the math type setting system known as "LaTeX", prounced like "latex" but the "X" is pronounced like a "k", because it's really the Greek letter Chi.  This system is widely used in academic and scientific circles, and is the basis for how math is typeset in Jupyter notebooks, and in many popular science publications. 

Latex is also used to write books in Trash Magic, including very likely this one at some point. But we'll see.

Trash Magic Markdown apps
 
 - [edit-markdown-file.php](edit-markdown-file.php)
 - [edit-book.html](edit-book.html)
 - [read-book.html](read-book.html)
 - [readme.html](readme.html)
 - [README.md](README.md)
 - [read-markdown-file.php](read-markdown-file.php)
 - [read-book-mathjax.html](read-book-mathjax.html)
 