<?php
    include "_appsofunctions.php";
    echo showHeader();
    if(isset($_REQUEST['vraag'])){
        voerVraagIn($_REQUEST['vraag'], $_REQUEST['code'], $_REQUEST['toelichting'], $_REQUEST['id']);
    }
    if(isset($_REQUEST['editnr'])){
        $id = $_REQUEST['editnr'];
        $recordSet = getAlleRecordsVanTabelMetId("vraag", $id);
        $row = $recordSet->fetch_assoc();
        $vraagtekst = $row['vraagtekst'];
        $vraagcode = $row['vraagcode'];
        $vraagtoelichting = $row['vraagtoelichting'];
    }else{
        $id=0;
        $vraagtekst = "";
        $vraagcode = "";
        $vraagtoelichting = "";
    }
?>
<a href=docentbeheer.php class="mainvlak">terug</a>
<br><br>
<form action="docentinvoervraag.php" action="post">
Vraag
<br>
<textarea name="vraag"><?php echo $vraagtekst; ?></textarea>
<br>
Code
<br>
<textarea name="code"><?php echo $vraagcode; ?></textarea>
<br>
Toelichting
<br>
<textarea name="toelichting"><?php echo $vraagtoelichting; ?></textarea>
<input type="hidden" name="id" value="<?php echo $id; ?>" >
<input type="submit" value="voegtoe">
</form>
<?php
    echo showFooter();
?>