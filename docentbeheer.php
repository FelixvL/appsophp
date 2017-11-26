<?php
    include "_appsofunctions.php";
    echo showHeader();
?>
<br>
<a href=docentoverzichtstudent.php>bekijk studenten</a>
<br>
<a href=docentoverzichtantwoord.php>bekijk antwoorden</a>
<br>
<a href=docentinvoervraag.php>nieuwe vraag</a>
<br>
Docent beheer
<?php
    toonAlleVragen();
    echo showFooter();
?>