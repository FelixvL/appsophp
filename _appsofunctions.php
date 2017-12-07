<?php
session_start();
include "geheim/geheim.php";
include "_classes.php";






function checkIfAlreadyInserted($table, $vraagid, $studentid){
    $conn= connectToDB();
    $sql = "SELECT * FROM $table WHERE student_id = $studentid AND vraag_id = $vraagid;";
    $result = $conn->query($sql);
    if($result->num_rows == 0){
        $sql = "INSERT INTO $table (`student_id`, `vraag_id`) VALUES ($studentid,$vraagid);";
        $result = $conn->query($sql);
        $conn->close();
        checkIfAlreadyInserted($table, $vraagid, $studentid);
    }else{
        $conn->close();
        return $result->fetch_assoc()['id'];
    }
}
function getStudentIdFromName($name){
    $conn = connectToDB();
    $resultSet = $conn->query("SELECT * FROM `fe_student` WHERE `naam` = '$name';");
    $conn->close();
    return $resultSet->fetch_assoc()['id'];
}
function getFieldWithTableNameColumnNameAndId($table, $column, $id){
    $conn = connectToDB();
    $resultSet = $conn->query("SELECT * FROM $table WHERE id = $id ;");
    $conn->close();
    return $resultSet->fetch_assoc()[$column];
}
function toonAlleVragenBeheer(){
    $recordset = getAlleRecordsVanTabel("fe_vraag");
    $counter = 1;
    while($row = $recordset->fetch_assoc()){
        echo "<div class=vraagbeheer>";
        echo "<span class=vraagtekstbeheer ><a href=docentinvoervraag.php?editnr=".$row['id']." >".$counter."<sub>(".$row['id'].")</sub>: ".printphpcode($row['vraagtekst'])."</a></span>";
        echo "<br>";
        echo "<span class=vraagcodebeheer >".printphpcode($row['vraagcode'])."</span>";
        echo "<br>";
        echo "<span class=vraagtoelichtingbeheer >".printphpcode($row['vraagtoelichting'])."</span>";
        echo "</div>";
        $counter++;
    }
}
function toonAlleVragen(){
    $recordset = getAlleRecordsVanTabel("fe_vraag");
    echo "<table>";
    echo "<tr><th>id</th><th>vraag</th></tr>";
    while($row = $recordset->fetch_assoc()){
        echo "<tr><td>".$row['id']."</td><td><a href=vraagstudent.php?vraagnr=".$row['id']." >".$row['vraagtekst']."</a></td></tr>";
    }
    echo "</table>";
}
function getAlleRecordsVanTabel($tabel){
    $conn = connectToDB();
    $sql = "SELECT * FROM `$tabel`;";
    $resultSet = $conn->query($sql);
    $conn->close();
    return $resultSet;
}
function getAlleRecordsVanTabelOrderBy($tabel, $orderby){
    $conn = connectToDB();
    $sql = "SELECT * FROM `$tabel` ORDER BY $orderby;";
    $resultSet = $conn->query($sql);
    $conn->close();
    return $resultSet;
    
}
function getAlleRecordsVanTabelMetId($tabel, $id){
    $conn = connectToDB();
    $sql = "SELECT * FROM `$tabel` WHERE `id`=".$id." ;";
    $resultSet = $conn->query($sql);
    $conn->close();
    return $resultSet;
}
function encodeDBtekst($input, $conn){
    return $conn->real_escape_string($input);
}

function inloggenStudentOfDocent($inlogString){
    if($inlogString == "NextProgram"){
        $_SESSION['docentappso'] = 'yes';
        header('Location: docentbeheer.php');  
    }else{
        $_SESSION['studentappso'] = $inlogString;
        loginStudent($inlogString);
    }
}
function loginStudent($studentNaam){
    $conn = connectToDB();
    $sql = "INSERT INTO fe_student(`naam`) VALUES ('".$studentNaam."');";
    echo $sql;
    $conn->query($sql);
    $conn->close();
    header('Location: index.php'); 
}

function showHeader(){
$returnString = <<<HEADSTRING
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="_appsostyle.css">
        <script src="_appsojs.js"></script>
        <script src="jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <a href=logout.php class="mainvlakred">log out</a>

HEADSTRING;
    return $returnString;
}
function showFooter(){
    $returnString = "\t</body>\n";
    $returnString .= "</html>";
    return $returnString;
}

function printphpcode($data){
	$alldata = $data;	
	$alldata = str_replace("<" , "&lt;", $alldata); 
	$alldata = str_replace("\n" , "<br/>\n", $alldata); 
	$alldata = str_replace("\t" , "<span>&nbsp;&nbsp;&nbsp;&nbsp;</span>", $alldata); 
	$alldata = str_replace(" " , "<span>&nbsp;</span>", $alldata); 
	return $alldata;
}