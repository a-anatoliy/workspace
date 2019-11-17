<?php
/**
 * Class dataRows
 */

require_once './querymap_class.php';

class dataRows {
  private $email, $contentID, $title, $date, $dbh;
  private $fields = array();

  public function __construct($parameters = array(), $dbh) {
    $this->fields = ['email','contentID','title','date'];
    $this->dbh = $dbh;
    $this->setFields($parameters);
  }

  private function setFields($rowData = array()) {
    foreach ($this->fields as $field) {
      $act = sprintf("set%s", ucfirst($field));
      $this->$act($rowData[$field]);
    }
    return $this;
  }

  private function getFields() {
    $out = array();
    foreach ($this->fields as $field) {
      $act = sprintf("get%s",ucfirst($field));
      $out[$field] = $this->$act();
    }
    return $out;
  }

  public function insertDataRow() {
    $res = $this->dbh->runQuery(QueryMap::INSERT_ROW, $this->getFields());
    return $res;
  }

  public function selectDataRow() {
    return 1;
  }

  public function getEmail() { return $this->email; }
  public function setEmail($email) { $this->email = $email; return $this; }

  public function getContentID() { return $this->contentID; }
  public function setContentID($contentID) {
    $url = explode('/',$contentID);
    $this->contentID = end($url);
    return $this;
  }

  public function getTitle() { return $this->title; }
  public function setTitle($title) { $this->title = $title; return $this; }

  public function getDate() { return $this->date; }
  public function setDate($date) { $this->date = $date; return $this; }
}
