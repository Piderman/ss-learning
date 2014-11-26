<?php
class RegistrationAdmin extends ModelAdmin {
    private static $managed_models = array("Registration");

    private static $url_segment = "registrations";

    private static $menu_title = "Registrations";

    public $showImportForm = true;
}