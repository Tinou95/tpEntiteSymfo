<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Topic;
use App\Entity\Reply;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Créer un utilisateur (User)
        $user = new User();
        $user->setEmail('user@example.com')
             ->setPassword('password123') // Assurez-vous que le mot de passe est correctement haché
             ->setUsername('user1')
             ->setRoles(['ROLE_USER']);
        $manager->persist($user);

        // Créer des catégories
        $category1 = new Category();
        $category1->setName('Tech')->setDescription('Topics about technology');
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setName('Health')->setDescription('Topics about health');
        $manager->persist($category2);

        // Créer des topics associés à des catégories et à un utilisateur
        $topic1 = new Topic();
        $topic1->setTitle('Latest Tech Trends')
               ->setContent('Content about the latest technology trends...')
               ->setCreatedAt(new \DateTimeImmutable())
               ->setCategory($category1) // Association à la catégorie Tech
               ->setUser($user); // Association à l'utilisateur
        $manager->persist($topic1);

        $topic2 = new Topic();
        $topic2->setTitle('Healthy Living Tips')
               ->setContent('Content about healthy living...')
               ->setCreatedAt(new \DateTimeImmutable())
               ->setCategory($category2) // Association à la catégorie Health
               ->setUser($user); // Association à l'utilisateur
        $manager->persist($topic2);

        // Créer des réponses (Replies)
        $reply1 = new Reply();
        $reply1->setContent('I agree with your points!')
               ->setCreatedAt(new \DateTimeImmutable())
               ->setTopic($topic1); // Réponse au topic1
        $manager->persist($reply1);

        // Sauvegarder dans la base de données
        $manager->flush();
    }
}
