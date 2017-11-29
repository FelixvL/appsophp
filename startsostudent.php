<?php
    include "_appsofunctions.php";
    if(isset($_GET['naamstudent'])){
        inloggenStudentOfDocent($_GET['naamstudent']);
    }
    echo showHeader();
?>
<a href=index.php class="mainvlak">terug</a>
<a href=vraagstudent.php?vraagnr=1 class="mainvlak">start</a>
<br><br>
<?php
    toonAlleVragen();
    echo showFooter();
?>