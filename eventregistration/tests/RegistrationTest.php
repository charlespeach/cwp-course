<?php

class RegistrationTest extends SapphireTest {
  public static $fixture_file = 'eventregistration/tests/RegistrationTest.yml';

  public function testNameSplit() {
    $registration = $this->objFromFixture('Registration', 'JoeBlogs');
    $this->assertEquals($registration->FirstName, 'Joe');
    $this->assertEquals($registration->Surname, 'Blogs');
  }
}
