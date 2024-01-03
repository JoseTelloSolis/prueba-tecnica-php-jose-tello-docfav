<?php
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

class UserRepositoryTest extends TestCase {

  private $user;
  private $userRepository;

  public function setUp(): void {
    $this->userRepository = new UserRepository();
    $id = $this->userRepository->getLastId() + 1;

    $this->user = new User($id, 'Jose', 'Tello', 'tellosolisjose@gmail.com', '12345678', 'Male', '15-09-1983');
  }

  public function testGetLastId() {
    $this->assertEquals($this->userRepository->getLastId(), 5);
  }

  public function testFindById() {
    $userTest = $this->userRepository->findById(1);
    $this->assertEquals($userTest['firstName'], 'Suzy');
  }

  public function testNotFoundById() {
    $userTest = $this->userRepository->findById(10);
    $this->assertEquals($userTest, null);
  }

  public function testFindKeyById() {
    $this->assertEquals($this->userRepository->findKeyById(4), 3);
  }

  public function testNotFoundKeyById() {
    $this->assertEquals($this->userRepository->findKeyById(10), -1);
  }

  public function testCreate() {
    $this->userRepository->create($this->user);
    $userTest = $this->userRepository->findById(6);

    $this->assertEquals($userTest['firstName'], 'Jose');
  }

  public function testUpdate() {
    $userTest = $this->userRepository->findById(1);
    $this->assertEquals($userTest['firstName'], 'Suzy');
    $this->assertEquals($userTest['lastName'], 'Hammersley');

    $hasUpdate = $this->userRepository->update($this->user, 1);
    $this->assertEquals($hasUpdate, true);

    $userTest = $this->userRepository->findById(1);
    $this->assertEquals($userTest['firstName'], 'Jose');
    $this->assertEquals($userTest['lastName'], 'Tello');
  }

  public function testFailUpdate() {
    $hasUpdate = $this->userRepository->update($this->user, 8);
    $this->assertEquals($hasUpdate, false);
  }

  public function testSelect() {
    $dataTest = $this->userRepository->select();

    $this->assertEquals($dataTest[1]['firstName'], 'Jasper');
  }

  public function testDelete() {
    $userTest = $this->userRepository->findById(3);
    $this->assertEquals($userTest['firstName'], 'Bunni');

    $hasDelete = $this->userRepository->delete(3);
    $this->assertEquals($hasDelete, true);

    $userTest = $this->userRepository->findById(3);
    $this->assertEquals($userTest, null);
  }

  public function testFailDelete() {
    $hasDelete = $this->userRepository->delete(8);
    $this->assertEquals($hasDelete, false);
  }
}