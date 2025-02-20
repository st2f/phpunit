<?php

namespace App;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;

class UserSession
{
    protected const EXPIRATION = 'PT1H';
    protected const DATE_FORMAT = 'YmdHis';

    protected $mySession;

    public function manage(Request $request)
    {
        $session = $request?->getSession();
        $session->set('init', false);

        if (null !== $session->get('sessionIsSet') ||static::expires($session)) {

            $session->set('sessionIsSet', true);
            $session->set('csrfIsSet', true);
            $session->set('init', true);
        } 
        
        $session->set('lastActive', date(static::DATE_FORMAT));

        $this->set($session);
    }

    public static function expires($session)
    {
        $allowedRange = (new \DateTime('now'))
            ->sub(new \DateInterval(static::EXPIRATION))
            ->format(static::DATE_FORMAT);

        if ($session->get('lastActive') < $allowedRange) {
            return true;
        }
    }

    /** @var Session */
    public function get()
    {
        return $this->mySession;
    }
    
    public function set($session)
    {
        $this->mySession = $session;
        return $this;
    }

}