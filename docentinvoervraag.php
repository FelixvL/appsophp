<?php
    include "_appsofunctions.php";
    echo showHeader();
    if(isset($_REQUEST['vraag'])){
        voerVraagIn($_REQUEST['vraag'], $_REQUEST['code'], $_REQUEST['uitleg']);
    }
?>
<br>
<a href=docentbeheer.php>terug</a>
<br>
docent invoer vraag
<br>
<form action="docentinvoervraag.php" action="post">
Vraag
<br>
<textarea name="vraag"></textarea>
<br>
Code
<br>
<textarea name="code"></textarea>
<br>
Uitleg
<br>
<textarea name="uitleg"></textarea>
<input type="submit" value="voegtoe">
</form>
<?php
    echo showFooter();
?>