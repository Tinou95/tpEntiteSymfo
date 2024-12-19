<?php

// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Topic;
use App\Entity\Language;
use App\Entity\Category;
use App\Entity\Response;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('admin@example.com')
            ->setPassword(password_hash('password', PASSWORD_BCRYPT))
            ->setFirstName('Admin')
            ->setLastName('User')
            ->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);

        $topic = new Topic();
        $topic->setTitle('Symfony Basics')
            ->setContent('Learn the basics of Symfony.')
            ->setAuthor($user);
        $manager->persist($topic);

        // Créez d'autres entités et reliez-les de manière similaire
        $manager->flush();
    }
}
