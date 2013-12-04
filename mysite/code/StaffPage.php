<?php

class StaffPage extends Page {
  private static $description = 'A staff member page';

  static $default_parent = 'StaffHolder';
  static $can_be_root = false;

  static $db = array(
    'JobTitle' => 'Varchar'
  );

  static $has_one = array(
    'ProfilePic' => 'Image',
  );

  private static $has_many = array('Endorsements' => 'StaffEndorsement');

  function getCMSFields() {
    $fields = parent::getCMSFields();

    $fields->dataFieldByName('Title')->Title = 'Staff name';

    $fields->addFieldToTab('Root.Main',
                           new TextField('JobTitle', 'Job title'),
                           'URLSegment'
    );

    $fields->addFieldToTab('Root.Main',
                           new UploadField('ProfilePic', 'Profile pic'),
                           'Content'
    );

    return $fields;
  }
}

class StaffPage_Controller extends Page_Controller {
  private static $allowed_actions = array(
    'EndorsementForm'
  );

  public function EndorsementForm() {

    $fields = new FieldList(
      //fields
      TextField::create('EndorsedBy', 'Your name'),
      TextareaField::create('Comments', 'Comments')
    );

    $actions = new FeidlsList(
      //Actions
      FormAction::create('addEndorsement', 'Endorse')
    );

    $form = new Form($this, 'EndorsementForm', $fields, $actions);

    return $form;
  }

  public function addEndorsement($data, Form $form) {
    Debug::message('data');
    Debug::dump('$data');
    Debug::message('form');
    Debug::dump('$form');
  }
}
