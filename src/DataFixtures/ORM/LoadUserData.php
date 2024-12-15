<?php

declare(strict_types=1);

namespace App\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    private ?ContainerInterface $container = null;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null): void
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager): void
    {
        $languages = ['en', 'fr', 'ru', 'es', 'de'];

        foreach ($languages as $language) {
            $this->setupUser($manager, 'user-'.$language, 'user');
        }

        $this->setupAdminUser($manager, 'admin', 'admin');
    }

    public function setupAdminUser(ObjectManager $manager, string $username, $password): void
    {
        $userManager = $this->container->get('fos_user.user_manager');

        // Create our user and set details
        $userAdmin = $userManager->createUser();
        $userAdmin->setUsername($username);
        $userAdmin->setEmail($username.'@domain.test');
        $userAdmin->setPlainPassword($password);
        // $userAdmin->setPassword('3NCRYPT3D-V3R51ON');
        $userAdmin->setEnabled(true);
        $userAdmin->setRoles(['ROLE_ADMIN']);

        // Update the user
        $userManager->updateUser($userAdmin, true);

        $manager->persist($userAdmin);
        $manager->flush();

        $this->addReference($username, $userAdmin);
    }

    public function setupUser(ObjectManager $manager, string $username, $password): void
    {
        $userManager = $this->container->get('fos_user.user_manager');

        // Create our user and set details
        $user = $userManager->createUser();
        $user->setUsername($username);
        $user->setEmail($username.'@domain.test');
        $user->setPlainPassword($password);
        // $user->setPassword('3NCRYPT3D-V3R51ON');
        $user->setEnabled(true);
        $user->setRoles(['ROLE_USER']);

        // Update the user
        $userManager->updateUser($user, true);

        $manager->persist($user);
        $manager->flush();

        $this->addReference($username, $user);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder(): int
    {
        return 1; // the order in which fixtures will be loaded
    }
}
