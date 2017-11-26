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
VraagId: <input type="text" id="vraagid">
StudentId: <input type="text" id="studentid">
<textarea onkeyup="voegAntwoordToe()" id="antwoordStudentOpVraag"></textarea>
Vraag Student
<br>
<div id="invoerstudent">one</div>
<?php
    echo showFooter();
?>