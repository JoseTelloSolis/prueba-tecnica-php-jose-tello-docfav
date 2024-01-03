<?php
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

class UserTest extends TestCase {

  private $user;
  private $userRepository;

  public function setUp(): void {
    $this->userRepository = new UserRepository();
    $id = $this->userRepository->getLastId() + 1;

    $this->user = new User($id, 'Jose', 'Tello', 'tellosolisjose@gmail.com', '12345678', 'Male', '15-09-1983');
  }

  public function testFirstName() {
    $this->user->setFirstName('Almendra');
    $this->assertEquals($this->user->getFirstName(), 'Almendra');
  }

  public function testLastName() {
    $this->user->setLastName('Solis');
    $this->assertEquals($this->user->getLastName(), 'Solis');
  }

  public function testEmail() {
    $this->user->setEmail('almendra@gmail.com');
    $this->assertEquals($this->user->getEmail(), 'almendra@gmail.com');
  }

  public function testPassword() {
    $this->user->setPassword('abcdefgh');
    $this->assertEquals($this->user->getPassword(), md5('abcdefgh'));
  }

  public function testGender() {
    $this->user->setGender('Female');
    $this->assertEquals($this->user->getGender(), 'Female');
  }

  public function testBirthdate() {
    $this->user->setBirthdate('15-09-1985');
    $this->assertEquals($this->user->getBirthdate(), '15-09-1985');
  }
}