<?php
class StaffEndorsement extends DataObject {
    private static $db = array(
        "EndorsedBy" => "Varchar(255)",
        "Comments" => "Text"
    );

    private static $has_one = array(
        "Parent" => "StaffPage"
    );

    private static $summary_fields = array(
        "EndorsedBy",
        "Comments",
        "Parent.Title"
    );
}
// data object doesnt need a controller
