<?php

class Registration extends DataObject {

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
  }
}

