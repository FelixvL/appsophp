<?php
    include "_appsofunctions.php";
    echo showHeader();
?>
<br>
<a href=docentbeheer.php>terug</a>
<br>
docent overzicht student
<?php
    $recordset = getAlleRecordsVanTabel("student");
    while($row = $recordset->fetch_assoc()){
        echo $row['naam']."(".$row['id'].")";
        echo "<br>";
    }
    echo showFooter();
?>