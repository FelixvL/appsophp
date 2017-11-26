<?php
    include "_appsofunctions.php";
    echo showHeader();
?>
<br>
<a href=docentbeheer.php>terug</a>
<br>
docent overzicht antwoorden
<?php
    $recordSet = getAlleRecordsVanTabel("antwoord");
    while($row = $recordSet->fetch_assoc()){
        echo "<br>";
        echo $row['student_id'];
        echo $row['vraag_id'];
        echo $row['antwoordtekst'];
    }
    echo showFooter();
?>