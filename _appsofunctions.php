<?php

function showHeader(){
$returnString = <<<HEADSTRING
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="_appsostyle.css">
        <script src="_appsojs.js"></script>
    </head>
    <body>

HEADSTRING;
    return $returnString;
}

function showFooter(){
    $returnString = "\t</body>\n";
    $returnString .= "</html>";
    return $returnString;
}