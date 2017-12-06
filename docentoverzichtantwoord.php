<?php
    include "_appsofunctions.php";
    echo showHeader();
?>
<a href=docentbeheer.php class="mainvlak">terug</a>
<br><br>
<?php
    $recordSet = getAlleRecordsVanTabelOrderBy("fe_antwoord", "student_id, vraag_id");
    echo "<table>";
    echo "<th>Student</th><th>Vraag</th><th>Antwoord</th>";
    while($row = $recordSet->fetch_assoc()){
        if($row['antwoordtekst'] == ""){            
        }else{
            echo "<tr title=\"". getFieldWithTableNameColumnNameAndId("fe_vraag", "vraagtekst", $row['vraag_id'])."\n---------\n".getFieldWithTableNameColumnNameAndId("fe_vraag", "vraagcode", $row['vraag_id'])."\">"; 
            echo "<td>".getFieldWithTableNameColumnNameAndId("fe_student", "naam", $row['student_id'])."</td>";
            echo "<td>".$row['vraag_id']."</td>";
            echo "<td>".printphpcode($row['antwoordtekst'])."</td>";
            echo "</tr>";
        }
    }
    echo "</table>";
    echo showFooter();
?>