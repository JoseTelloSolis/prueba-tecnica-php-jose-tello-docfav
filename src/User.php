<?php

class User {

  private $id, $firstName, $lastName, $email, $password, $gender, $birthdate;

  public function __construct($id, $firstName, $lastName, $email, $password, $gender, $birthdate) {
    $this->id = $id;
    $this->firstName = strtolower($firstName);
    $this->lastName = strtolower($lastName);
    $this->email = strtolower($email);
    $this->password = md5($password);
    $this->gender = $gender;
    $this->birthdate = $birthdate;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setFirstName($firstName) {
    $this->firstName = strtolower($firstName);
  }

  public function setLastName($lastName) {
    $this->lastName = strtolower($lastName);
  }

  public function setEmail($email) {
    $this->email = strtolower($email);
  }

  public function setPassword($password) {
    $this->password = md5($password);
  }

  public function setGender($gender) {
    $this->gender = $gender;
  }

  public function setBirthdate($birthdate) {
    $this->birthdate = $birthdate;
  }

  public function getId() {
    return $this->id;
  }

  public function getFirstName() {
    return ucwords($this->firstName);
  }

  public function getLastName() {
    return ucwords($this->lastName);
  }

  public function getEmail() {
    return $this->email;
  }

  public function getPassword() {
    return $this->password;
  }

  public function getGender() {
    return $this->gender;
  }

  public function getBirthdate() {
    return $this->birthdate;
  }

}