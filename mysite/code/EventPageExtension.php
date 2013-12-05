<?php

class EventPageExtension extends DataExtension {

  private static $db = array(
    'EnableRegistrations' => 'Boolean'
  );

  private static $has_many = array(
    'Registrations' => 'Registration'
  );

  public function updateSettingsFields(FieldList $fields) {
    $fields->addFieldToTab('Root.Settings', CheckboxField::create('EnableRegistrations'));
  }

  public function updateCMSFields(FieldList $fields){
    if($this->owner->EnableRegistrations){
      $fields->addFieldToTab(
        'Root.Registrations',
        GridField::create(
          'Registrations',
          'Registrations',
          $this->owner->Registrations(),
          GridFieldConfig_RecordEditor::create()
        )
      );
    }
  }
}
