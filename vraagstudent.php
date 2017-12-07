<?php
    include "_appsofunctions.php";
    echo showHeader();    
    
    
    $vraagnr = $_REQUEST['vraagnr'];
    $studentnr = getStudentIdFromName($_SESSION['studentappso']);
    $conn = connectToDB();
    $configuratie = new Configuratie($conn);
if($configuratie->getExamenTonen()){
    $vraagToner = new VraagToner($studentnr, $vraagnr, $conn);
    $antwoordid = checkIfAlreadyInserted("fe_antwoord", $vraagToner->vraag_id, getStudentIdFromName($_SESSION['studentappso']));
    if($antwoordid == null){
        $conn->close();
        header('Location: vraagstudent.php?vraagnr='.$vraagnr);     
 
    }
?>
<script>
function beantwoordvraag(){
        antwoord = $("#antwoordStudentOpVraag").val();
        vraagid = $("#vraagid").val();
        studentid = $("#studentid").val();
	$.post( 'updatevraag.php' ,{ 
            antwoord: antwoord,
            vraagid: vraagid,
            studentid: studentid
	}, function( data ) {
	//  $( "#result" ).html( data );
	});
}
function myfocus(){
    //alert();
    document.getElementById('antwoordStudentOpVraag').focus();
}
</script>
<a href=startsostudent.php class="mainvlak">overzicht</a>
<?php
    $exam = new Exam($conn);
    $highestQN = $exam->getHighestQN();
    $lowestQN = $exam->getLowestQN();
    if(!(($vraagnr-1)<$lowestQN)){
?>
<a href=vraagstudent.php?vraagnr=<?php echo ($vraagnr-1); ?> class="mainvlak">vorige</a>
<?php
    }else{ echo "<a class=mainvlak>FIRST</a>";}
    if(!(($vraagnr+1)>$highestQN)){
?>
<a href=vraagstudent.php?vraagnr=<?php echo ($vraagnr+1); ?> class="mainvlak">volgende</a>
<?php
    }else{ echo "<a class=mainvlak>LAST</a>";}
    echo "Welkom: ".$_SESSION['studentappso'];
?>

<br><br>

<input type="hidden" id="vraagid" value="<?php echo $vraagnr; ?>">
<input type="hidden" id="studentid" value="<?php echo $studentnr; ?>">
<?php
echo "<div class=vraagstudent>";
echo printphpcode($vraagToner->vraagtekst);
echo "</div>";
echo "<br>";
echo "<div class=codestudent>";
echo printphpcode($vraagToner->vraagcode);
echo "</div>";
echo "<br>";
?>
<textarea onkeyup="beantwoordvraag()" onblur="myfocus()" id="antwoordStudentOpVraag" onKeyDown=catchTab(event,'antwoordStudentOpVraag')>
<?php 
    echo getFieldWithTableNameColumnNameAndId("fe_antwoord", "antwoordtekst", $antwoordid);
?>
</textarea>
<input type="text" value="connected" id="irrelevantjustfortab">
<br>
<div id="result"></div>
<?php
    echo "<div class=uitlegstudent>";

    if($configuratie->getToonUitleg()){
        echo printphpcode($vraagToner->vraaguitleg);
    }else{
        echo "nog geen uitleg";
    }
    echo "</div>";
    echo showFooter();
}else{
    echo "wacht op examen";
}
    $conn->close();
 ?>