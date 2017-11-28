<?php
    include "_appsofunctions.php";
    echo showHeader();
?>
<a href=docentoverzichtstudent.php class="mainvlak">bekijk studenten</a>
<a href=docentoverzichtantwoord.php class="mainvlak">bekijk antwoorden</a>
<a href=docentinvoervraag.php class="mainvlak">nieuwe vraag</a>
<br><br>
<?php
    toonAlleVragenBeheer();
    echo showFooter();
?>