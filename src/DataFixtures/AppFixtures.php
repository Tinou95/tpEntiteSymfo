<?php

// src/DataFixtures/AppFixtures.php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Topic;
use App\Entity\Category;
use App\Entity\Reply;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Categories
        $category1 = new Category();
        $category1->setName('PHP');
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setName('Symfony');
        $manager->persist($category2);

        // Topics
        $topic1 = new Topic();
        $topic1->setTitle('Quel est le meilleur framework PHP ?')
               ->setContent('Je cherche à savoir quel est le meilleur framework PHP ?')
               ->setCategory($category1);
        $manager->persist($topic1);

        // Reply
        $reply1 = new Reply();
        $reply1->setContent('Je pense que Symfony est le meilleur framework PHP.')
               ->setTopic($topic1);
        $manager->persist($reply1);

        // User
        $user = new User();
        $user->setEmail('user@example.com')
             ->setPassword(password_hash('password', PASSWORD_BCRYPT))
             ->setFirstName('John')
             ->setLastName('Doe')
             ->setRoles(['ROLE_USER']);
        $manager->persist($user);

        $admin = new User();
        $admin->setEmail('admin@example.com')
              ->setPassword(password_hash('admin', PASSWORD_BCRYPT))
              ->setFirstName('Admin')
              ->setLastName('User')
              ->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        $manager->flush();
    }
}
