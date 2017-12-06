<?php
    include "_appsofunctions.php";
    echo showHeader();
?>
<a href=docentoverzichtstudent.php class="mainvlak">bekijk studenten</a>
<a href=docentoverzichtantwoord.php class="mainvlak">bekijk antwoorden</a>
<a href=docentinvoervraag.php class="mainvlak">nieuwe vraag</a>
<br>
<?php
    toonConfiguratie();
    
    function toonConfiguratie(){
       $conn = connectToDB(); 
       $configuratie = new Configuratie($conn);
       echo "Examen Open: ".$configuratie->getExamenTonen();
       echo " <a href=endisableexam.php?currentconfiguration=".$configuratie->getExamenTonen()." >start/stop examen</a>";
       echo "<br>";
       echo "UitlegTonen: ".$configuratie->getToonUitleg();
       echo " <a href=endisableuitleg.php?currentconfiguration=".$configuratie->getToonUitleg()." >start/stop uitleg</a>";
       echo " <a href=deletealleantwoorden.php?currentconfiguration=3 style=color:red>VERWIJDERALLEANTWOORDEN</a>";
       $conn->close();
               
    }


?>
<br>
<?php
    toonAlleVragenBeheer();
    echo showFooter();
?>