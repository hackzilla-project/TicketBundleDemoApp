<?php

namespace App\Controller;

use Hackzilla\Bundle\TicketBundle\Manager\TicketManager;
use Hackzilla\Bundle\TicketBundle\Model\TicketMessageInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(TicketManager $ticketManager)
    {
        $users = $admins = [];

        $languages = ['en', 'fr', 'ru', 'es', 'de'];

        foreach ($languages as $language) {
            $users[] = [
                'user' => 'user-'.$language.'@example.org',
                'password' => 'user',
            ];
        }

        $admins[] = [
            'user' => 'admin@example.org',
            'password' => 'admin',
        ];

        $totalTicketCount = count($ticketManager->findTickets());
        $totalOpenTicketCount = count($ticketManager->findTicketsBy([
            'status' => TicketMessageInterface::STATUS_OPEN,
        ]));

        return $this->render('default/index.html.twig', [
            'users' => $users,
            'admins' => $admins,
            'totalTicketCount' => $totalTicketCount,
            'totalOpenTicketCount' => $totalOpenTicketCount,
        ]);
    }
}
