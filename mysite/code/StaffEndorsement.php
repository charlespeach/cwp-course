<?php

class StaffEndorsement extends DataObject {

  private static $db = array(
    'EndorsedBy' => 'Varchar(255)',
    'Comments' => 'Text'
  );

  private static $has_one = array('Parent' => 'StaffPage');
}
