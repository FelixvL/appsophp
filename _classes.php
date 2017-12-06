<?php

class Exam{
    private $conn;
    private $highestQuestionNumber;
    private $lowestQuestionNumber;
    function __construct($conn){
        $this->conn = $conn;
        $this->loadQuestionNumbers();
    }
    function loadQuestionNumbers(){
        $resultSet = $this->conn->query("SELECT * FROM fe_vraag;");
        $this->lowestQuestionNumber = $resultSet->fetch_assoc()['id'];
        while($row = $resultSet->fetch_assoc()){
            $cn = $row['id'];
        }
        $this->highestQuestionNumber = $cn;
    }
    function getHighestQN(){
        return $this->highestQuestionNumber;
    }
    function getLowestQN(){
        return $this->lowestQuestionNumber;
    }
    
}

class Configuratie{
    private $examenTonen;
    private $toonUitleg;
    private $conn;
    function __construct($conn){
        $this->conn = $conn;
        $this->examenTonen = $this->conn->query("SELECT * FROM fe_examen")->fetch_assoc()["publiceerexamen"];
        $this->toonUitleg = $this->conn->query("SELECT * FROM fe_vraag")->fetch_assoc()["publiceer_toelichting"];        
    }
    function getExamenTonen(){
        return $this->examenTonen;
    }
    function getToonUitleg(){
        return $this->toonUitleg;
    }
    function flipConfigurionExamenTonen(){
        $this->examenTonen = $this->examenTonen == 0 ? 1 : 0;
        $this->saveConfiguration();
    }
    function flipConfigurionToonUitleg(){
        $this->toonUitleg = $this->toonUitleg == 0 ? 1 : 0;
        $this->saveConfiguration();
    }
    function saveConfiguration(){
        $this->conn->query("UPDATE fe_examen SET publiceerexamen = $this->examenTonen WHERE true");
        $this->conn->query("UPDATE fe_vraag SET publiceer_toelichting = $this->toonUitleg WHERE true");
    }

}


class VraagToner{
    private $conn;
    public $vraag_id;
    public $vraagtekst;
    public $vraagcode;
    public $vraaguitleg;
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
        $recordSet = $this->conn->query("SELECT * FROM `fe_vraag` WHERE `id` = '$vraagid';");
        $row = $recordSet->fetch_assoc();
        $this->vraagtekst = $row['vraagtekst'];
        $this->vraagcode = $row['vraagcode'];
        $this->vraaguitleg = $row['vraagtoelichting'];
    }
}










