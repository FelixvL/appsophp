<?php
include "_appsofunctions.php";

if(isset($_GET['currentconfiguration'])){


$conn = connectToDB();
$conn->query("DELETE FROM fe_antwoord WHERE true;");
$conn->close();
header('Location: docentbeheer.php'); 
}else{
    echo "not authorised";
}