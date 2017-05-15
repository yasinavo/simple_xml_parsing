<?php

/**
 * Return a boolean whether the xml is error free or not.
 * Validate a given XML against well structured format.
 *
 *
 */
class ValidationXML {

    public function isXmlStructureValid($file) {

        $prev = libxml_use_internal_errors(true);
        $ret = true;
        try {
            new SimpleXMLElement($file, 0, true);
        } catch (Exception $e) {
            $ret = false;
        }
        if (count(libxml_get_errors()) > 0) {
            // There has been XML errors
            $ret = false;
        }
        // Tidy up.
        libxml_clear_errors();
        libxml_use_internal_errors($prev);

        return $ret;
    }

}

?>
