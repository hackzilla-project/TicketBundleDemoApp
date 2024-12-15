<?php

use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle;
use Vich\UploaderBundle\VichUploaderBundle;
use Symfony\Bundle\SecurityBundle\SecurityBundle;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Bundle\WebProfilerBundle\WebProfilerBundle;
use Symfony\Bundle\MakerBundle\MakerBundle;
use Knp\Bundle\PaginatorBundle\KnpPaginatorBundle;
use Hackzilla\Bundle\TicketBundle\HackzillaTicketBundle;
use Symfony\Bundle\MonologBundle\MonologBundle;
use Symfony\Bundle\DebugBundle\DebugBundle;

return [
    FrameworkBundle::class => ['all' => true],
    DoctrineBundle::class => ['all' => true],
    DoctrineFixturesBundle::class => ['dev' => true, 'test' => true],
    VichUploaderBundle::class => ['all' => true],
    SecurityBundle::class => ['all' => true],
    TwigBundle::class => ['all' => true],
    WebProfilerBundle::class => ['dev' => true, 'test' => true],
    MakerBundle::class => ['dev' => true],
    KnpPaginatorBundle::class => ['all' => true],
    HackzillaTicketBundle::class => ['all' => true],
    MonologBundle::class => ['all' => true],
    DebugBundle::class => ['dev' => true],
];
