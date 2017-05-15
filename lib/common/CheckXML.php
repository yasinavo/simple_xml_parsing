<?php
require_once './lib/helper/ValidationXML.php';

class CheckXML
{

    function checkFile($url)
    {

        $valid = new ValidationXML();

        // Get the XML. You can declare it here or even load a file.
        $file = realpath('./' . $url);
        //$meeting = [];
        //echo $file;
        // Checks if a XML file's structure is valid by calling isXmlStructureValid() function
        //if ($valid->isXmlStructureValid($file)) {
          if (!$xml_builder = simplexml_load_file($file,'SimpleXMLElement', LIBXML_NOWARNING)) {
            echo "File cannot locate on the server.";
            exit();
          }
              else{
                if ($valid->isXmlStructureValid($file)) {
                foreach ($xml_builder->table as $obj1) {
                    $valueID = $obj1->attributes()->name;

                    if ($valueID == 'meeting') {
                        foreach ($obj1->fields->field as $obj) {
                            if (property_exists($obj->attributes(), 'name')) {
                                $meeting['name'] = (string)$obj->attributes()->name;
                            }
                            if (property_exists($obj->attributes(), 'sysid')) {
                                $meeting['sysid'] = (string)$obj->attributes()->sysid;
                            }
                            if (property_exists($obj->attributes(), 'date')) {
                                $meeting['date'] = (string)$obj->attributes()->date;
                            }
                        }
                    }

                }
                          return $meeting;
            }
            else {
              echo 'Error in XML values..XML file structure is invalid';
            }

          }



    }
}


?>
