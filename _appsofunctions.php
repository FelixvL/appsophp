<?php
session_start();
function inloggenStudentOfDocent($inlogString){
    if($inlogString == "geheim"){
        $_SESSION['docentappso'] = 'yes';
        header('Location: docentbeheer.php');  
    }else{
        $_SESSION['studentappso'] = $inlogString;
        loginStudent($inlogString);
    }
}
function loginStudent($studentNaam){
    $conn = connectToDB();
    $sql = "INSERT INTO student(`naam`) VALUES ('".$studentNaam."');";
    echo $sql;
    $conn->query($sql);
    header('Location: index.php'); 
}
function connectToDB(){
    $conn = new mysqli("localhost","root","","appsophp");
    return $conn;
}
function showHeader(){
$returnString = <<<HEADSTRING
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="_appsostyle.css">
        <script src="_appsojs.js"></script>
    </head>
    <body>
        <a href=logout.php >log out</a>

HEADSTRING;
    return $returnString;
}
function showFooter(){
    $returnString = "\t</body>\n";
    $returnString .= "</html>";
    return $returnString;
}