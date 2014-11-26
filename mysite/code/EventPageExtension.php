<?php

/**
 * Class EventPageExtension
 * makes an extension that does nothing so we can apply it to some thing we build...
 *
 * as is tradition, just the standard for making things ala jQ returning the object on each function
 */
class EventPageExtension extends DataExtension {
    private static $db = array("EnableRegistrations" => "Boolean");

    private static $has_many = array("Registrations" => "Registration");

    // sets the $fieldList to a type
    public function updateSettingsFields(FieldList $fields) {
        $fields->addFieldToTab("Root.Settings", CheckboxField::create('EnableRegistrations', 'Enable Registrations'));
    }

    public function updateCMSFields(FieldList $fields) {
        if ($this->owner->EnableRegistrations) {
            $fields->addFieldToTab('Root.Registrations', GridField::create('Registrations', 'Registrations', $this->owner->Registrations(), GridFieldConfig_RecordEditor::create()));
        }
    }
}
