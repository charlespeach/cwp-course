<?php
class EndorsementAdmin extends ModelAdmin {

  private static $managed_models = array('StaffEndorsement');
  private static $url_segment = 'endorsements';
  private static $menu_priority = 0;
  private static $menu_title = 'Endorsements';
  public $showImportForm = true;
}
