<?php
class Page extends SiteTree {

	private static $db = array(
        "RightContent" => "HTMLText",
        "isShowInFooter" => "Boolean"
	);

	private static $has_one = array(
	);

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab("Root.Right",
            HTMLEditorField::create("RightContent", "Right-hand content")
        );



        return $fields;
    }

    public function getSettingsFields() {
        $fields = parent::getSettingsFields();

        // 3rd param is insert before, want to add ours to the settings tab (1st arg) BEFORE the "show in search"
        $fields->addFieldToTab("Root.Settings", CheckboxField::create('isShowInFooter', 'Show in footer'),"ShowInSearch");

        return $fields;
    }

}
class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array (
	);

	public function init() {
		parent::init();
		// You can include any CSS or JS required by your project here.
		// See: http://doc.silverstripe.org/framework/en/reference/requirements
	}

}
