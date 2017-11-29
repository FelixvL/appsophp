<?php
    include "_appsofunctions.php";
    
    $table = $_REQUEST['table'];
    $columnname = $_REQUEST['columnname'];
    $idvalue = $_REQUEST['idvalue'];
    
    $conn= connectToDB();
    $sql = "DELETE FROM `$table` WHERE `$columnname` = '$idvalue' ;";
    $conn->query($sql);
        



