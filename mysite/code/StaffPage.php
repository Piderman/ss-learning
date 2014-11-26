<?php

class StaffPage extends Page {
    private static $description = "a staff member page";

    private static $default_parent = "StaffHolder";

    private static $can_be_root = false;

    private static $db = array("JobTitle" => "Varchar");

    // sets relo b/w data objects
    // add another DataObject layer here if has many profile images
    private static $has_one = array("ProfilePic" => "Image");

    private static $has_many = array("Endorsements" => "StaffEndorsement");

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $fields->dataFieldByName("Title")->Title = "Staff Name";

        $fields->addFieldToTab("Root.Main", // name, friendly name, where should the tab live?
            TextField::create("JobTitle", "Job Title"), "URLSegment");

        $fields->addFieldToTab("Root.Main", // this is new way
            UploadField::create("ProfilePic", "Profile pic"), "Content");

        // checks the page exists...because?
        if ($this->ID) {
            $fields->addFieldToTab("Root.Endoresments",
                GridField::create(
                    // whats with the args?
                    'Endorsements', 'Endorsements',
                    $this->Endorsements(), GridFieldConfig_RecordEditor::create()));
        }

        // old way
        //new UploadField("ProfilePic", "Profile Pic", "Content");

        return $fields;
    }
}

class StaffPage_Controller extends Page_Controller {
    public function init() {
        // must init parent, always and forever
        parent::init();

        Requirements::javascript($this->ThemeDir() . '/javascript/fail.js');
    }

    private static $allowed_actions = array("EndorsementForm");

    public function EndorsementForm() {
        $fields = new FieldList(TextField::create("EndorsedBy", "Your Name"), TextareaField::create("Comments", "Comments"));

        $actions = new FieldList(FormAction::create("addEndorsement", "Endorse"));

        $validator = RequiredFields::create(array("EndorsedBy", "Comments"));

        $form = new Form($this, "EndorsementForm", $fields, $actions, $validator);

        return $form;
    }


    public function addEndorsement($data, Form $form) {
        // also gives us the action (could be many per form)
        //Debug::message("Data:");
        //Debug::dump($data);

        // the whole form object, bam
        //Debug::message("Form:");
        //Debug::dump($form);

        $endorsement = new StaffEndorsement();
        $form->saveInto($endorsement);

        // map with the has_one from staffpage?
        $endorsement->ParentID = $this->ID;

        $endorsement->write();

        // 2nd arg is the class that gets added
        $form->sessionMessage("Thanks for endorsing " . $this->Title, "positive");

        $this->redirectBack();
    }

    public function PagedEndorsements() {
        $list = new PaginatedList($this->Endorsements()->Sort("Created DESC"), $this->request->getVars());

        $list->setPageLength(2);

        // changes the query string, got this rando function as $list is a PaginatedList
        $list->setPaginationGetVar("page");

        return $list;
    }
}
