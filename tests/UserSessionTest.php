<?php

namespace App;

use PHPUnit\Framework\TestCase;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\UserSession;

class UserSessionTest extends TestCase
{
    protected $mySession;

    protected function setUp(): void
    {
        $request = Request::createFromGlobals();
        $request->setSession(new Session());

        $userSession = new UserSession();
        $userSession->manage($request);
        $this->mySession = $userSession->get();
    }

    public function testSessionIsSet()
    {
        $this->assertTrue(true, $this->mySession->get('sessionIsSet'));
    }

    public function testcsrfIsSet()
    {
        $this->assertTrue(true, $this->mySession->get('csrfIsSet'));
    }

    public function testLastActiveIsSetCorrectly()
    {
        $this->assertSame(
            date('Ymd'), 
            substr($this->mySession->get('lastActive'), 0, 8)
        );
    }


}