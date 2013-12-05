<?php

class EventPageControllerExtension extends DataExtension {

  private static $allowed_actions = array('RegistrationForm');

  public function RegistrationForm(){

    $fields = FieldList::create(
      TextField::create('Name'),
      TextField::create('Organisation'),
      EmailField::create('Email')
    );

    $actions = FieldList::create(
      FormAction::create('doRegister','Send Registration')
    );

    $validator = RequiredFields::create(array('Name','Email'));

    $form = Form::create($this->owner, 'RegistrationForm', $fields, $actions, $validator);

    return $form;
  }

  public function doRegister($data, Form $form){

    if ($this->SpacesAvaliable()) {
      $registration = Registration::create();
      $form->saveInto($registration);
      $registration->EventID = $this->owner->ID;
      $registration->write();
      $form->sessionMessage('Thanks for registering','good');
    } else {
      $form->sessionMessage('All full up sorry.', 'warning');
    }

    return $this->owner->redirectBack();
  }

  public function SpacesAvaliable() {
    $registrations = Registration::get()
                      ->filter('EventID', $this->owner->ID)
                      ->Count();

    $spacesleft = (int) ($this->owner->MaxParticipants - $registrations);

    if ($spacesleft <= 0) {
      return 0;
    }

    return $spacesleft;
  }

  public function Attending() {
    return Registration::get()
            ->filter('EventID', $this->owner->ID)
            ->exclude('Status', 'Applied')
            ->limit($this->owner->MaxParticipants);
  }
}
