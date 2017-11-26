function voegAntwoordToe(){
    var antwoord = document.getElementById("antwoordStudentOpVraag").value;
    var vraagid = document.getElementById("vraagid").value;
    var studentid = document.getElementById("studentid").value;
    var data = new FormData();
    data.append('antwoord', antwoord);
    data.append('vraagid', vraagid);
    data.append('studentid', studentid); 
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
            document.getElementById("invoerstudent").innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("POST", "updatevraag.php", true);
    xhttp.send(data);
}