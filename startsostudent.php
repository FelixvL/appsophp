<?php
    include "_appsofunctions.php";
    if(isset($_GET['naamstudent'])){
        inloggenStudentOfDocent($_GET['naamstudent']);
    }
    echo showHeader();
?>
<br>
<a href=index.php>terug</a>
<br>
<a href=vraagstudent.php>ga naar vraag</a>
<br>
Start SO Student
<?php
    echo "Welkom: ".$_SESSION['studentappso'];;
?>
<br>
<?php
    echo showFooter();
?>