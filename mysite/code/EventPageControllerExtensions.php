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

    $registration = Registration::create();
    $form->saveInto($registration);
    $registration->EventID = $this->owner->ID;
    $registration->write();
    $form->sessionMessage('Thanks for registering','good');

    return $this->owner->redirectBack();
  }
}
