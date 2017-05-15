<?php

include_once './lib/common/Common.php';
include_once './lib/common/CheckXML.php';

if (isset($_GET['fname'])) {
    $fname = $_GET['fname'];
}

$common = new Common();
$xml = new CheckXML();

$fileresult = $common->getXMLFile($fname); // Get file path of XML file from DB
$xmlresult = $xml->checkFile($fileresult[3]); // Get data from requested xml file

$meeting_data = json_encode($xmlresult);
$meeting_data = json_decode($meeting_data);

if (is_array($meeting_data) || is_object($meeting_data)) {
    foreach ($meeting_data as $key => $value) {
        echo $key . ": " . $value . "<br/>";
    }
}

?>
