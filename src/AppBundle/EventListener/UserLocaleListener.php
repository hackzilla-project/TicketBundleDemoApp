<?php

namespace AppBundle\EventListener;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class UserLocaleListener
{
    private $session;

    public function setSession(Session $session)
    {
        $this->session = $session;
    }

    /**
     * kernel.request event. If a guest user doesn't have an opened session, locale is equal to
     * "undefined" as configured by default in parameters.ini. If so, set as a locale the user's
     * preferred language.
     *
     * @param \Symfony\Component\HttpKernel\Event\GetResponseEvent $event
     */
    public function setLocaleForUnauthenticatedUser(GetResponseEvent $event)
    {
        if (HttpKernelInterface::MASTER_REQUEST !== $event->getRequestType()) {
            return;
        }
        $request = $event->getRequest();
        if ('undefined' == $request->getLocale()) {
            if ($locale = $request->getSession()->get('_locale')) {
                $request->setLocale($locale);
            } else {
                $request->setLocale($request->getPreferredLanguage());
            }
        }
    }

    /**
     * security.interactive_login event. If a user chose a language in preferences, it would be set,
     * if not, a locale that was set by setLocaleForUnauthenticatedUser remains.
     *
     * @param \Symfony\Component\Security\Http\Event\InteractiveLoginEvent $event
     */
    public function setLocaleForAuthenticatedUser(InteractiveLoginEvent $event)
    {
        $user = $event->getAuthenticationToken()->getUser();

        if (preg_match('/.+-(.{2})/', $user->getUsername(), $match)) {
            $lang = $match[1];
            $event->getRequest()->setLocale($lang);
            $this->session->set('_locale', $lang);
        }
    }
}
