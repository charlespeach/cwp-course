<?php

class Registration extends DataObject implements PermissionProvider {

  private static $db = array(
    'Name' => 'Varchar(255)',
    'Organisation' => 'Varchar(255)',
    'Email' => 'Varchar(255)',
    'Status' => 'Enum("Applied, Confirmed","Applied")'
  );

  private static $has_one = array(
    'Event' => 'EventPage'
  );

  private static $summary_fields = array(
    'Name','Organisation','Email','Status'
  );

  public function canEdit($member=null){
    return Permission::check('EDIT_REGISTRATION');
  }

  public function canView($member=null){
    return Permission::check('VIEW_REGISTRATION');
  }

  public function canCreate($member=null){
    return Permission::check('EDIT_REGISTRATION');
  }

  public function canDelete($member=null){
    if(!$member){
      $member = Member::currentUser();
    }
    return $member->inGroup('administrators');
  }

  public function providePermissions(){
    return array(
        'VIEW_REGISTRATION' => array(
          'name' => 'View the Event Registrations',
          'category' => 'Event Registrations',
        ),
        'EDIT_REGISTRATION' => array(
          'name' => 'Edit or Create the Event Registrations',
          'category' => 'Event Registrations'
        )
    );
  }

  public function onBeforeWrite() {
    if($this->Status == "Confirmed" && !Member::get()->filter('Email', $this->Email)->Count()) {
      $member = Member::create();
      $member->FirstName = $this->FirstName;
      $member->Surname = $this->Surname;
      $member->Email = $this->Email;
      $member->write();
    }

    parent::onBeforeWrite();
  }

  public function getFirstName() {
    return $this->splitName(0);
  }

  public function getSurname() {
    return $this->splitName(1);
  }

  private function splitName($id) {
    $result = explode(' ', $this->Name);
    return $result[$id];
  }
}
