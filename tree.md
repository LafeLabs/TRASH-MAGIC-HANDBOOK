## [EDIT THIS CHAPTER](edit-markdown-file.php?filename=tree.md)

## [RETURN TO MAIN BOOK](index.html)

# Tree 

The Trash Magic System is a living system. Users on the client side of the web browser can branch the treet of Trash Magic using the Trash Magic app [branch.html](branch.html).  This app lists all the branches below whatever branch the user is presently in.  Branches are just a directory(also known as a folder on some systems) with a full Trash Magic set in it.  

To create a new branch in Trash Magic the branch app invokes the Trash Magic PHP script branch.php. To illustrate how that works, we include the full code of branch.php below:

```
<?php
$branchname = $_GET["branchname"];//get branch name
mkdir($branchname);//create directory with branch name

if(isset($_GET["replicator"])){
    $replicatorurl = $_GET["replicator"];
    copy($replicatorurl,$branchname."/replicator.php");
}
else{
    copy("php/local-replicator.txt",$branchname."/replicator.php");    
}

echo "<a href = \"".$branchname."/replicator.php\">CLICK ME(2/3)</a>";

?>
<style>
body{
    background-color:BLACK;
    font-family:Comic Sans MS;
    font-size:3em;
}
    a{
        font-size:3em;
        color:#ff2cb4;
;
    }
</style>
```

As is often the case, PHP allows us to perform actions on the server very much like what we would do from the [*nix](https://en.wikipedia.org/wiki/Unix-like) command line.  Users can pass a branch name to the PHP using the question mark and "branchname=". This can be done manually if you want, to get an understanding of how to use this kind of raw Trash Magic power. To do that, try using the following link to create a branch called "branchbranch":

## [branch.php?branchname=branchbranch](branch.php?branchname=branchbranch)

Then navigate back to this page, and return to [branch.html](branch.html) and click the link to BECOME THE DESTROYER, then DELETE the branch!

[CREATE](branch.html)! [DESTROY!](branch.html)



# Tree Code

 - [branch.html](branch.html)
 - [php/list-branches.txt](php/list-branches.txt)
 - [php/delete-branch.txt](php/delete-branch.txt)
 - [php/branch.txt](txt/branch.txt)


