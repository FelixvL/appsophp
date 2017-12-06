<?php
    include "_appsofunctions.php";

$updatenr = $_REQUEST['vraagid'];
$vraag = $_REQUEST['vraagtekst'];
$code = $_REQUEST['vraagcode'];
$uitleg = $_REQUEST['vraagtoelichting'];          

voerVraagIn($vraag,$code, $uitleg, $updatenr);
              
function voerVraagIn($vraag, $code, $uitleg, $updatenr){
    $conn = connectToDB();
    $code = encodeDBtekst($code, $conn);
    
    if($updatenr == 0){
        $sql = "INSERT INTO fe_vraag(`vraagtekst`,`vraagcode`,`vraagtoelichting`) VALUES ('".$vraag."','".$code."','".$uitleg."');";
        $conn->query($sql);
        echo "insert";
    }else{
        $sql = "UPDATE `fe_vraag` SET `vraagtekst` = '$vraag', `vraagcode`='$code', `vraagtoelichting` = '$uitleg' WHERE `id`=$updatenr ;";            
        $conn->query($sql);
        echo "ok";
    }
       
}