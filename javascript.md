## [EDIT THIS PAGE](edit-markdown-file.php?filename=javascript.md)

## [home](index.html)

# JAVASCRIPT

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


The Trash Magic Wall is perhaps the simplest Trash Magic application(app) which demonstrates both loading and saving of files from the server side file system. In the wall app, visible on a live system at [wall.html](wall.html)



```
    data = encodeURIComponent(editor.getSession().getValue());//get data
    var httpc = new XMLHttpRequest();//create a XMLHttpRequest
    var url = "save-file.php";        
    httpc.open("POST", url, true);
    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
    httpc.send("data="+data+"&filename="+currentFile);//send text to save-file.php
```

