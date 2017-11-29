<?php
session_start();

class VraagToner{
    private $conn;
    public $vraag_id;
    public $vraagtekst;
    public $vraagcode;
    public $student_id;
    public $studentnaam;
    public $volgendevraag;
    public $vorigevraag;
    public function __construct($studentid, $vraagid, $conn) {
        $this->vraag_id = $vraagid;
        $this->student_id = $studentid;
        $this->conn = $conn;
        $this->loadVraag($vraagid);
    }
    private function loadVraag($vraagid){
        $recordSet = $this->conn->query("SELECT * FROM `vraag` WHERE `id` = '$vraagid';");
        $row = $recordSet->fetch_assoc();
        $this->vraagtekst = $row['vraagtekst'];
        $this->vraagcode = $row['vraagcode'];
    }
}







function checkIfAlreadyInserted($table, $vraagid, $studentid){
    $conn= connectToDB();
    $sql = "SELECT * FROM $table WHERE student_id = $studentid AND vraag_id = $vraagid;";
    $result = $conn->query($sql);
    if($result->num_rows == 0){
        $sql = "INSERT INTO $table (`student_id`, `vraag_id`) VALUES ($studentid,$vraagid);";
        $result = $conn->query($sql);
        checkIfAlreadyInserted($table, $vraagid, $studentid);
    }else{
        return $result->fetch_assoc()['id'];
    }
}
function getStudentIdFromName($name){
    return connectToDB()->query("SELECT * FROM `student` WHERE `naam` = '$name';")->fetch_assoc()['id'];
}
function getFieldWithTableNameColumnNameAndId($table, $column, $id){
    return connectToDB()->query("SELECT * FROM $table WHERE id = $id ;")->fetch_assoc()[$column];
}
function toonAlleVragenBeheer(){
    $recordset = getAlleRecordsVanTabel("vraag");
    $counter = 1;
    while($row = $recordset->fetch_assoc()){
        echo "<div class=vraagbeheer>";
        echo "<span class=vraagtekstbeheer ><a href=docentinvoervraag.php?editnr=".$row['id']." >".$counter."<sub>(".$row['id'].")</sub>: ".$row['vraagtekst']."</a></span>";
        echo "<br>";
        echo "<span class=vraagcodebeheer >".$row['vraagcode']."</span>";
        echo "<br>";
        echo "<span class=vraagtoelichtingbeheer >".$row['vraagtoelichting']."</span>";
        echo "</div>";
        $counter++;
    }
}
function toonAlleVragen(){
    $recordset = getAlleRecordsVanTabel("vraag");
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
    return $conn->query($sql);
}
function getAlleRecordsVanTabelMetId($tabel, $id){
    $conn = connectToDB();
    $sql = "SELECT * FROM `$tabel` WHERE `id`=".$id." ;";
    return $conn->query($sql);
}
function voerVraagIn($vraag, $code, $uitleg, $updatenr){
    $conn = connectToDB();
    if($updatenr == 0){
        $sql = "INSERT INTO vraag(`vraagtekst`,`vraagcode`,`vraagtoelichting`) VALUES ('".$vraag."','".$code."','".$uitleg."');";
    }else{
        $sql = "UPDATE `vraag` SET `vraagtekst` = '$vraag', `vraagcode`='$code', `vraagtoelichting` = '$uitleg' WHERE `id`=$updatenr ;";    
    }
    $conn->query($sql);
    header('Location: docentbeheer.php');     
}
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
        <a href=logout.php class="mainvlakred">log out</a>

HEADSTRING;
    return $returnString;
}
function showFooter(){
    $returnString = "\t</body>\n";
    $returnString .= "</html>";
    return $returnString;
}