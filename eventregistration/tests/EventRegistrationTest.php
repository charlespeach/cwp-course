<?php

class EventRegistrationTest extends FunctionalTest {

  public static $fixture_file = 'eventregistration/tests/EventRegistrationTest.yml';

  public function setUp(){
    parent::setUp();
    $this->useDraftSite();
  }

  public function testRegistrationVisibility(){

    $response = $this->get('no-spaces');
    $this->assertContains('<p>No spaces left', $response->getBody(),'Displays no spaces text');
    $this->assertNotContains('<form id="Form_RegistrationForm"', $response->getBody(),'Does not display RegistrationForm');

    $response = $this->get('spaces-available');
    $this->assertContains('<form id="Form_RegistrationForm"', $response->getBody(),'Displays RegistrationForm');
    $this->assertNotContains('<p>No spaces left', $response->getBody(),'Does not display no spaces left text');

  }

  public function testSubmitRegistration(){

    $registrationData = array(
      'Name' => 'Joe Blogs',
      'Email' => 'joes@blogs.com'
    );

    $response = $this->get('spaces-available');

    $this->submitForm('Form_RegistrationForm', null, $registrationData);

    $this->assertPartialMatchBySelector('#Form_RegistrationForm p.good','Thanks for registering','Registration submits and displays a form');

  }

}
