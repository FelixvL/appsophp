<?php
    include "_appsofunctions.php";
    echo showHeader();
?>
<a href=docentbeheer.php class="mainvlak">terug</a>
<br><br>
<?php
    $recordset = getAlleRecordsVanTabel("student");
    while($row = $recordset->fetch_assoc()){
        echo "<span>".$row['naam']."(".$row['id'].")</span><span onclick=deletestudent('".$row['id']."') >delete</span>";
        echo "<br>";
    }
    echo showFooter();
?>