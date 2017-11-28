<?php
    include "_appsofunctions.php";
    echo showHeader();
?>
<a href=docentbeheer.php class="mainvlak">terug</a>
<br><br>
<?php
    $recordSet = getAlleRecordsVanTabel("antwoord");
    echo "<table>";
    echo "<th>Student</th><th>Vraag</th><th>Antwoord</th>";
    while($row = $recordSet->fetch_assoc()){
        echo "<tr title=\"". getFieldWithTableNameColumnNameAndId("vraag", "vraagtekst", $row['vraag_id'])."\n---------\n".getFieldWithTableNameColumnNameAndId("vraag", "vraagcode", $row['vraag_id'])."\">"; 
        echo "<td>".getFieldWithTableNameColumnNameAndId("student", "naam", $row['student_id'])."</td>";
        echo "<td>".$row['vraag_id']."</td>";
        echo "<td>".$row['antwoordtekst']."</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo showFooter();
?>