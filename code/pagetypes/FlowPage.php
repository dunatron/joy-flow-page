<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15/11/16
 * Time: 4:44 PM
 */
class FlowPage extends Page
{

    private static $singular_name = "Flow Page";
    private static $plural_name = "Flow Pages";
    private static $description = 'Flow Page with ability to link to other pages in the footer';
    private static $db = array(
        'Statement' => 'Text',
        'HashColor' => 'Varchar(20)'
    );

    private static $has_one = array(
        'FlowPageImage' => 'Image',
        'NextSitePage' => 'SiteTree'
    );

    static $defaults = array(
        'ShowInMenus' => false,
        'ShowInSearch' => false
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

        $fields->addFieldToTab('Root.Main', new TextField('Statement', 'Main Statement of the Flow Page'), 'Content');
        $fields->addFieldToTab('Root.Main', TextField::create('HashColor', 'e.g. #000'), 'Content');
        $fields->addFieldToTab('Root.Main', $flowPageImage = new UploadField('FlowPageImage'), 'Content');
        $nextPage = TreeDropdownField::create('NextSitePageID', 'Choose next page to link to:', 'SiteTree')
            ->setDescription('for de-selecting <strong>Choose page again</strong>');

        $fields->addFieldToTab('Root.Main', $nextPage, 'FlowPageImage');

        $flowPageImage->getValidator()->setAllowedExtensions(array('png', 'gif', 'jpg', 'jpeg'));
        $flowPageImage->setFolderName('flow-banner-images');

        return $fields;
    }


}

class FlowPage_Controller extends Page_Controller
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

    public function getNextFlowPage()
    {
        $page = $this->NextSitePage();
        return $page;
    }
}


