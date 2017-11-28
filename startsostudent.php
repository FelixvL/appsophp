<?php
    include "_appsofunctions.php";
    if(isset($_GET['naamstudent'])){
        inloggenStudentOfDocent($_GET['naamstudent']);
    }
    echo showHeader();
?>
<a href=index.php class="mainvlak">terug</a>
<a href=vraagstudent.php class="mainvlak">ga naar vraag</a>
<br><br>
<?php
    toonAlleVragen();
    echo showFooter();
?>