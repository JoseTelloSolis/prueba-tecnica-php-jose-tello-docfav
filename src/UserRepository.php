<?php

class UserRepository {

  private $data = [];

  public function __construct() {
    $this->data = $this->readData();
  }

  public function readData() {
    $file = fopen('data/users.csv', 'r');

    // Headers
    $headers = fgetcsv($file);

    // Rows
    $data = [];

    while (($row = fgetcsv($file)) !== false) {
      $item = [];
      
      foreach ($row as $key => $value) {
        $item[$headers[$key]] = $value ?: null;
      }
        
      $data[] = $item;
    }

    fclose($file);

    return $data;
  }

  public function getLastId() {
    $lastElement = $this->data[array_key_last($this->data)];
    return $lastElement['id'];
  }

  public function findById($id) {
    foreach ($this->data as $key => $value) {
      if($value['id'] == $id) {
        return $value;
      }
    }

    return null;
  }

  public function findKeyById($id) {
    foreach ($this->data as $key => $value) {
      if($value['id'] == $id) {
        return $key;
      }
    }

    return -1;
  }
  
  public function create(User $user) {

    array_push($this->data, array(
      'id' => $user->getId(),
      'firstName' => $user->getFirstName(),
      'lastName' => $user->getLastName(),
      'email' => $user->getEmail(),
      'password' => $user->getPassword(),
      'gender' => $user->getGender(),
      'birthdate' => $user->getBirthdate()
    ));
  }

  public function update(User $user, $id) {
    $key = $this->findKeyById($id);

    if($key != -1) {
      $this->data[$key]['firstName'] = $user->getFirstName();
      $this->data[$key]['lastName'] = $user->getLastName();
      $this->data[$key]['email'] = $user->getEmail();
      $this->data[$key]['password'] = $user->getPassword();
      $this->data[$key]['gender'] = $user->getGender();
      $this->data[$key]['birthdate'] = $user->getBirthdate();

      return true;
    }
    else {
      return false;
    }
  }

  public function delete($id) {
    $key = $this->findKeyById($id);

    if($key != -1) {
      unset($this->data[$key]);
      return true;
    }
    else {
      return false;
    }
  }

  public function select() {
    return $this->data;
  }
}

