<?php

define("ROOT_DIR"  , '../' );
define('_ATHREERUN', 1 );
define('CONFIG'    , ROOT_DIR . 'data/cfg/config.php');
define('DB_CONFIG' , ROOT_DIR . 'data/cfg/rnd_string.php');

$mainFields = ['email','link','title','date'];

$cfg = array_merge(
  require_once CONFIG,    // get main configuration
  require_once DB_CONFIG  // get the database configuration
);
require_once 'querymap_class.php';
//'wannaAdd' | 'wannaSend'

if(isset($_POST) && !empty($_POST['wannaAdd'])) {
  // establish the db connection
  require_once 'data_class.php';
  $d = new Data($cfg);
  // create dataRow object
  require_once ROOT_DIR . 'objects/dataRows_class.php';

  $args = getFields('wannaAdd');

  $data = new dataRows( $args, $d );
  $ins  = $data->insertDataRow();
  exit;
} elseif(isset($_POST) && !empty($_POST['wannaSend'])) {

  $emailTPL = ROOT_DIR . $cfg['site']['email'];
  $input=json_decode($_POST['wannaSend']);
  foreach ($mainFields as $field) {
    $$field = $input->{$field};
  }

  $tmp = explode('@', $email);
  $contactPerson = ucfirst(array_shift($tmp));
  ob_start(); include($emailTPL); $ob = ob_get_clean();
  echo $ob;
  exit;
} else { echo 'wrong entry point'; exit(1); }


function getFields($methodName) {
  $out = []; global $mainFields;
  $input=json_decode($_POST[$methodName]);
    foreach ($mainFields as $field) {
      $out["$field"] = $input->{$field};
    }
  $out["contentID"] = $out['link']; unset($out['link']);
  return $out;
}

?>
