<?php

class StaffEndorsement extends DataObject {

  private static $db = array(
    "EndorsedBy" => "Varchar(255)",
    "Comments" => "Text",
  );

  private static $has_one = array(
    "Parent" => "StaffPage",
  );

  private static $summary_fields = array(
    'EndorsedBy',
    'Comments'
  );

  private static $api_access = array(
    'view' => array('EndorsedBy', 'Comments', 'Created', 'LastEdited', 'ParentID'),
    'edit' => array('EndorsedBy', 'Comments', 'Created', 'LastEdited', 'ParentID')
  );
}
