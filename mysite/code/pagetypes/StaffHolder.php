<?php

class StaffHolder extends Page {
  private static $description = 'Container page for Event Pages, provides event filtering and pagination';

  private static $allowed_children = array('StaffPage');
  private static $default_child = array('StaffPage');
}
class StaffHolder_Controller extends Page_Controller {
}
