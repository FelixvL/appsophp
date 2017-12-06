<?php
function connectToDB(){
    $conn = new mysqli("localhost","root","","appsophp");
//    $conn = new mysqli("localhost","phpzwollegen1","itphtoren","phpzwollegen2");
    return $conn;
}