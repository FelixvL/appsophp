<?php
    include "_appsofunctions.php";
    echo showHeader();
?>
<a href=startsostudent.php class="mainvlak">overzicht</a>
<a href=vraagstudent.php class="mainvlak">vorige</a>
<a href=vraagstudent.php class="mainvlak">volgende</a>
<br><br>
VraagId: <input type="text" id="vraagid">
StudentId: <input type="text" id="studentid">
<br>
<textarea onkeyup="voegAntwoordToe()" id="antwoordStudentOpVraag"></textarea>
<br>
<div id="invoerstudent">one</div>

<?php
    echo showFooter();
?>