<?php
namespace App;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

class ExamplePdoTest extends TestCase
{
    #[Test]
    #[TestDox('Valid ORM user email')]
    public function hasValidEmail(): bool
    {
        $result = filter_var(
            $this->getUser()->email, 
            FILTER_VALIDATE_EMAIL
        );

        $this->assertTrue(true, $result);
            
        return $result;
    }

    #[Test]
    #[TestDox('Get ORM user')]
    public function getUser(): User
    {
        // create test doubles
        $pdoMock = $this->createMock(\PDO::class);

        // inject the mock
        $user = new User($pdoMock);

        $this->assertInstanceOf('App\User', $user);

        return $user;
    }
}

class User 
{
    public $id;   
    public $email;
    public $db;
    
    function __construct(\PDO|MockObject $db)
    {
        $this->id = 124;
        $this->email = 'test@example.com';
        $this->db = $db;

        return $this;
    }
}
