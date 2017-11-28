<?php
    include "_appsofunctions.php";
    echo showHeader();
    $vraagnr = $_REQUEST['vraagnr'];
    $antwoordid = checkIfAlreadyInserted("antwoord", $vraagnr, getStudentIdFromName($_SESSION['studentappso']));
    if($antwoordid == null){
        header('Location: vraagstudent.php?vraagnr='.$vraagnr);     
 
    }
?>
<a href=startsostudent.php class="mainvlak">overzicht</a>
<a href=vraagstudent.php?vraagnr=<?php echo ($vraagnr-1); ?> class="mainvlak">vorige</a>
<a href=vraagstudent.php?vraagnr=<?php echo ($vraagnr+1); ?> class="mainvlak">volgende</a>
<br><br>
<input type="hidden" id="vraagid" value="<?php echo $vraagnr; ?>">
<input type="hidden" id="studentid" value="<?php echo getStudentIdFromName($_SESSION['studentappso']); ?>">
<?php
echo getFieldWithTableNameColumnNameAndId("vraag", "vraagtekst", $vraagnr);
echo "<br>";
echo getFieldWithTableNameColumnNameAndId("vraag", "vraagcode", $vraagnr);
echo "<br>";
?>
<textarea onkeyup="voegAntwoordToe()" id="antwoordStudentOpVraag">
<?php 
    echo getFieldWithTableNameColumnNameAndId("antwoord", "antwoordtekst", $antwoordid);
?>
</textarea>
<br>
<div id="invoerstudent">
<?php 
    echo getFieldWithTableNameColumnNameAndId("antwoord", "antwoordtekst", $antwoordid);
?>
</div>

<?php
    echo showFooter();
?>