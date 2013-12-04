<?php

class StaffPage extends Page {
  private static $description = 'A staff member page';
  static $default_parent = 'StaffHolder';
  static $can_be_root = false;
  static $db = array(
    'JobTitle' => 'Varchar'
  );

  function getCMSFields() {
    $fields = parent::getCMSFields();

    $fields->dataFieldByName('Title')->Title = 'Staff name';
    $fields->addFeildToTab('Root.Main',
      new TextField('JobTitle', 'Job title'), 'URLSegment'
    );

    return $fields;
  }
}
class StaffPage_Controller extends Page_Controller {
}
