<?php
class StaffHolder extends Page {
    private static $description = "Container page for Staff Pages";

    private static $allowed_children = array(
        "StaffPage"
    );

    private static $default_child = "StaffPage";
}

class StaffHolder_Controller extends Page_Controller {

}