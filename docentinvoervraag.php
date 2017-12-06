<?php
    include "_appsofunctions.php";
    echo showHeader();
    if(isset($_REQUEST['vraag'])){
        voerVraagIn($_REQUEST['vraag'], $_REQUEST['code'], $_REQUEST['toelichting'], $_REQUEST['id']);
    }
    if(isset($_REQUEST['editnr'])){
        $id = $_REQUEST['editnr'];
        $recordSet = getAlleRecordsVanTabelMetId("fe_vraag", $id);
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
    function toonVeldInvoer($veldnaam){
        return "<textarea id=$veldnaam onKeyUp=voegtoe('$veldnaam') onKeyDown=catchTab(event,'$veldnaam')>";
    }
?>
<script>
    var actiefveld = '';
    function voegtoe(elemname){
        vraagid = $("#antwoordid").val();
        vraagtekst = $("#vraag").val();
        vraagcode = $("#code").val();
        vraagtoelichting = $("#toelichting").val();
	$.post( 'docentupdatevraag.php' ,{ 
          vraagid:vraagid, 
          vraagtekst:vraagtekst,
          vraagcode:vraagcode,
          vraagtoelichting: vraagtoelichting
	}, function( data ) {
            if(data == 'insert'){
                document.location = 'docentbeheer.php';
            }
//	  $( "#result" ).html( data );
          document.getElementById(actiefveld).focus();
	});	
    }

    
</script>
<a href=docentbeheer.php class="mainvlak">terug</a>
<br><br>
Vraag
<br>
<?php 
    echo toonVeldInvoer("vraag"); 
    echo $vraagtekst; 
?></textarea>
<br>
Code
<br>
<?php 
    echo toonVeldInvoer("code");  
    echo $vraagcode; 
?></textarea>
<br>
Toelichting
<br>
<?php 
    echo toonVeldInvoer("toelichting"); 
    echo $vraagtoelichting; 
?></textarea>
<input type="text" value="connected" id="irrelevantjustfortab" onKeyUp=document.getElementById('toelichting').focus()>
<input type="hidden" name="id" id=antwoordid value="<?php echo $id; ?>" >
<div id="result">result</div>
<?php
    echo showFooter();
?>