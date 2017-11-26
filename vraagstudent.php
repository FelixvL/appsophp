<?php
    include "_appsofunctions.php";
    echo showHeader();
?>
<br>
<a href=startsostudent.php>overzicht</a>
<br>
<a href=vraagstudent.php>volgende</a>
<br>
<a href=vraagstudent.php>vorige</a>
<br>
<textarea onkeyup="voegAntwoordToe()" id="antwoordStudentOpVraag"></textarea>

Vraag Student
<br>
<?php
    echo showFooter();
?>