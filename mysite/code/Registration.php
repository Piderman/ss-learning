<?php
class Registration extends DataObject {
    private static $db = array(
        "Name" => "Varchar",
        "Organisation" => "Varchar",
        "Email" => "Varchar",
        "Status" => "Enum('Applied, Confirmed', 'Applied')"
    );

    private static $has_one = array(
        "Event" => "EventPage"
    );

    // how can we name these?
    private static $summary_fields = array(
        "Name" => "Name",
        "Organisation" => "Organisation",
        "Email" => "Email",
        "Status" => "Status",

        // value.toUse => "heading label"
        "Event.Title" => "Event"
    );
}
