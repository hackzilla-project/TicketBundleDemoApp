<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $users = $admins = [];

        $languages = ['en', 'fr', 'ru', 'es', 'de'];

        foreach ($languages as $language) {
            $users[] = [
                'user' => 'user-'.$language,
                'password' => 'user'
            ];
        }

        $admins[] = [
            'user' => 'admin',
            'password' => 'admin'
        ];

        return $this->render('default/index.html.twig', [
            'users' => $users,
            'admins' => $admins,
        ]);
    }
}
