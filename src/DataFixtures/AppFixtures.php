<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $languages = ['en', 'fr', 'ru', 'es', 'de'];

        foreach ($languages as $language) {
            $this->setupUser($manager, 'user-'.$language, 'user');
        }

        $this->setupAdminUser($manager, 'admin', 'admin');

        $manager->flush();
    }

    public function setupAdminUser(ObjectManager $manager, $username, $password)
    {
        // Create our user and set details
        $userAdmin = new User();
        $userAdmin->setEmail($username.'@example.org');
        $password = $this->hasher->hashPassword($userAdmin, $password);
        $userAdmin->setPassword($password);
        $userAdmin->setRoles(['ROLE_ADMIN']);

        $manager->persist($userAdmin);
        $manager->flush();

        $this->addReference($username, $userAdmin);
    }

    public function setupUser(ObjectManager $manager, $username, $password)
    {
        // Create our user and set details
        $user = new User();
        $user->setEmail($username.'@example.org');
        $password = $this->hasher->hashPassword($user, $password);
        $user->setPassword($password);
        $user->setRoles(['ROLE_USER']);

        $manager->persist($user);
        $manager->flush();

        $this->addReference($username, $user);
    }
}
