<?php

namespace AppBundle\Controller;

use Hackzilla\Bundle\TicketBundle\Model\TicketMessageInterface;
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

        $ticketManager = $this->get('hackzilla_ticket.ticket_manager');

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
