<?php

class Product {
  private $db;
  public $id;
  public $title;
  public $description;
  public $price;
  public $created_at;
  public $updated_at;
  public $deleted_at;

  function __construct($id = null) {
    require_once './Helper.class.php';
    $this->db = require './db.inc.php';

    if($id) {
      $this->id = $id;
      $this->loadFromDB();
    }
  }

  public function loadFromDB() {
    $stmt_get = $this->db->prepare("
      SELECT *
      FROM `products`
      WHERE `id` = :id
    ");
    $stmt_get->execute([ ':id' => $this->id ]);
    $product = $stmt_get->fetch();

    if( !$product ) {
      return false;
    }

    foreach( get_object_vars($product) as $key => $value ) {
      $this->$key = $value;
    }
  }

  public function insert() {

    if( !$this->productTitleIsFilled() ) {
      return false;
    }
    if( !$this->priceIsFilled() ) {
      return false;
    }

    $stmt_insert = $this->db->prepare("
      INSERT INTO `products`
        (`title`, `description`, `price`)
      VALUES
        (:title, :description, :price)
    ");
    $success = $stmt_insert->execute([
      ':title' => $this->title,
      ':description' => $this->description,
      ':price' => $this->price
    ]);

    if( $success ) {
      $this->id = $this->db->lastInsertId();
      return $success;
    }
  }

  public function search($q) {
    $q = "%$q%";
    $stmt_search = $this->db->prepare("
      SELECT *
      FROM `products`
      WHERE `title` LIKE :q
      OR `description` LIKE :q
    ");
    $stmt_search->execute([ ':q' => $q ]);
    return $stmt_search->fetchAll();
  }

  public function all() {
    $stmt_get = $this->db->prepare("
      SELECT *
      FROM `products`
      WHERE `deleted_at` IS NULL
    ");
    $stmt_get->execute();
    return $stmt_get->fetchAll();
  }

  public function productTitleIsFilled() {

    if( $this->title == "" ) {
      Helper::addError('Title is empty.');
      return false;
    }

    return true;
  }

  public function priceIsFilled() {

    if( $this->price == "" ) {
      Helper::addError('Price must be filled.');
      return false;
    }

    return true;
  }

}