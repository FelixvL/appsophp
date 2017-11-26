<?php
    include "_appsofunctions.php";
    echo showHeader();
    if(isset($_SESSION['docentappso'])){
        if($_SESSION['docentappso'] == 'yes'){
            header('Location: docentbeheer.php');
        }
    }
    if(isset($_SESSION['studentappso'])){
        header('Location: startsostudent.php');
    }
?>
<br>
<form action="startsostudent.php" method="get">
    Naam: <input type="text" name="naamstudent" />
    <input type="submit" value="log in" />
</form>
Log in als docent door <b>geheim</b> in te voeren in het naamveld.
<?php
    echo showFooter();
?>