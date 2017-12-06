    function catchTab(e, elemname){
        actiefveld = elemname;
	var keyCode;
	keyCode = e.which;
	if(keyCode == 9){
		//document.getElementById("errorLog").innerHTML = "hallo"+keyCode;
		var cursor = $("#"+elemname).prop("selectionStart");
		var alldata = document.getElementById(elemname).value;
		document.getElementById(elemname).value = alldata.substring(0 , cursor) + '\t' + alldata.substring(cursor , alldata.length);
		setCaretPosition(document.getElementById(elemname), cursor + 1);
                //alert(actiefveld);
                document.getElementById(actiefveld).focus();
	}
    }
    function setCaretPosition(ctrl, pos){
	if(ctrl.setSelectionRange){
		ctrl.focus();
		ctrl.setSelectionRange(pos, pos);	
	}	else if (ctrl.createTextRange()){
			range.collapse(true);
			range.moveEnd('character', pos);
			range.moveStart('character', pos);
			range.select();
	}
    }
    function provideFocus(){
        document.getElementById('antwoordStudentOpVraag').focus();
    }
function deletestudent(id){
    doAjax('deleterecord.php', '?table=fe_student&columnname=id&idvalue='+id);
    doAjax('deleterecord.php', '?table=fe_antwoord&columnname=student_id&idvalue='+id);
    document.location = 'docentoverzichtstudent.php';
}
function doAjax(phpPage, urlExtend){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xhttp.responseText);
        }
    };
    xhttp.open("GET", phpPage+""+urlExtend, true);
    xhttp.send();    
}