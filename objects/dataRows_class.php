<?php
/**
 * Class dataRows
 */

class dataRows {
  private $email, $contentID, $title, $date, $dbh;
  private $fields = array();

  public function __construct($email, $contentID, $date, $dbh) {
    $this->fields = ['email','contentID','title','date'];
    $this->dbh = $dbh;
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

  public function getEmail() { return $this->email; }
  public function setEmail($email) { $this->email = $email; return $this; }

  public function getContentID() { return $this->contentID; }
  public function setContentID($contentID) { $this->contentID = $contentID; return $this; }

  public function getTitle() { return $this->title; }
  public function setTitle($title) { $this->title = $title; return $this; }

  public function getDate() { return $this->date; }
  public function setDate($date) { $this->date = $date; return $this; }
}
