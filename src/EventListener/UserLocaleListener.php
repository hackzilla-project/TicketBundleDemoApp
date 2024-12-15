<?php

declare(strict_types=1);

namespace App\EventListener;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class UserLocaleListener
{
    private RequestStack $requestStack;

    public function setRequestStack(RequestStack $requestStack): void
    {
        $this->requestStack = $requestStack;
    }

    /**
     * kernel.request event. If a guest user doesn't have an opened session, locale is equal to
     * "undefined" as configured by default in parameters.ini. If so, set as a locale the user's
     * preferred language.
     */
    public function setLocaleForUnauthenticatedUser(RequestEvent $event): void
    {
        if (HttpKernelInterface::MAIN_REQUEST !== $event->getRequestType()) {
            return;
        }
        $request = $event->getRequest();
        if ('undefined' === $request->getLocale()) {
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
     */
    public function setLocaleForAuthenticatedUser(InteractiveLoginEvent $event): void
    {
        $user = $event->getAuthenticationToken()->getUser();

        if (preg_match('/.+-(.{2})/', $user->getUserIdentifier(), $match)) {
            $lang = $match[1];
            $event->getRequest()->setLocale($lang);
            $this->requestStack->getSession()->set('_locale', $lang);
        }
    }
}
