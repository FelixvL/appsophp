<?php
include "_appsofunctions.php";

if(isset($_GET['currentconfiguration'])){

echo $currentConfig;

$conn = connectToDB();
$configuratie = new Configuratie($conn);
$configuratie->flipConfigurionExamenTonen();
$conn->close();
header('Location: docentbeheer.php'); 
}else{
    echo "not authorised";
}




