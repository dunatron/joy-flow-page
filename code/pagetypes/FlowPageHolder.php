<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16/11/16
 * Time: 1:30 PM
 */class FlowPageHolder extends Page
{

    private static $singular_name        = "Flow Page Holder";
    private static $plural_name          = "Flow Page Holders";
    private static $description = 'Flow Holder that holds Flow Pages';
    private static $db = array(
        'HashColor' => 'Varchar(20)',
    );
    
    static $defaults = array (
	    'ShowInMenus' => false,
	    'ShowInSearch' => false
    );
    
    private static $has_one = array(
        'FlowHolderImage' => 'Image',
    );

    private static $has_many = array();

    private static $many_many = array();

    private static $belongs_many_many = array();

    private static $many_many_extraFields = array();

    private static $casting = array();

    private static $default_sort = '';

    private static $field_labels = array();

    private static $summary_fields = array();

    private static $required_fields = array(); //enforced through the "validate" method

    private static $searchable_fields = array();

    private static $default_child = "";

    private static $can_be_root = true;

    private static $hide_ancestor = null;
    
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Main', TextField::create('HashColor', 'e.g. #000'), 'Content');
        $fields->addFieldToTab('Root.Main', $flowHolderImage = new UploadField('FlowHolderImage'));

        $flowHolderImage->getValidator()->setAllowedExtensions(array('png', 'gif', 'jpg', 'jpeg'));
        $flowHolderImage->setFolderName('flow-banner-images');

        return $fields;
    }
    
}
class FlowPageHolder_Controller extends Page_Controller
{

    /**
     * array (
     *     'action', // anyone can access this action
     *     'action' => true, // same as above
     *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
     *     'action' => '->checkAction' // you can only access this action if >checkAction() returns true
     * );
     * @var array
     */
    private static $allowed_actions = array();

    public function init()
    {
        parent::init();
        $moduleFolder = 'joy-flow-page/';
        Requirements::css($moduleFolder . 'assets/css/flow-page.css');
    }

    public function FlowChildren()
    {
        $pages = FlowPage::get()
            ->filter(array(
                'ParentID' => $this->ID
            ));
        return $pages;
    }

}


