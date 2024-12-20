<?php

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
        // Ajout des catégories
        $category1 = new Category();
        $category1->setName('PHP');
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setName('Symfony');
        $manager->persist($category2);

        $category3 = new Category();
        $category3->setName('JavaScript');
        $manager->persist($category3);

        $category4 = new Category();
        $category4->setName('React');
        $manager->persist($category4);

        // Ajout des sujets pour chaque catégorie
        // Catégorie PHP
        $topic1 = new Topic();
        $topic1->setTitle('Quel est le meilleur framework PHP ?')
               ->setContent('Je cherche à savoir quel est le meilleur framework PHP ?')
               ->setCategory($category1);
        $manager->persist($topic1);

        $topic2 = new Topic();
        $topic2->setTitle('Les bonnes pratiques en PHP')
               ->setContent('Quels sont les meilleures pratiques à adopter en PHP ?')
               ->setCategory($category1);
        $manager->persist($topic2);

        // Catégorie Symfony
        $topic3 = new Topic();
        $topic3->setTitle('Les nouveautés de Symfony 6')
               ->setContent('Quelles sont les principales nouveautés de Symfony 6 ?')
               ->setCategory($category2);
        $manager->persist($topic3);

        $topic4 = new Topic();
        $topic4->setTitle('Comment sécuriser une application Symfony ?')
               ->setContent('Quelles sont les bonnes pratiques de sécurité avec Symfony ?')
               ->setCategory($category2);
        $manager->persist($topic4);

        // Catégorie JavaScript
        $topic5 = new Topic();
        $topic5->setTitle('Comment utiliser les Promises en JavaScript ?')
               ->setContent('Je veux apprendre à utiliser les Promises en JavaScript.')
               ->setCategory($category3);
        $manager->persist($topic5);

        $topic6 = new Topic();
        $topic6->setTitle('Les bases de Node.js')
               ->setContent('Comment commencer avec Node.js pour les débutants ?')
               ->setCategory($category3);
        $manager->persist($topic6);

        // Catégorie React
        $topic7 = new Topic();
        $topic7->setTitle('Introduction à React Hooks')
               ->setContent('Comment fonctionne React Hooks et pourquoi est-il important ?')
               ->setCategory($category4);
        $manager->persist($topic7);

        $topic8 = new Topic();
        $topic8->setTitle('Gérer l\'état global avec Redux')
               ->setContent('Comment utiliser Redux pour gérer l\'état global dans React ?')
               ->setCategory($category4);
        $manager->persist($topic8);

        // Ajout des réponses pour chaque sujet
        // Réponses pour le sujet "Quel est le meilleur framework PHP ?"
        $reply1 = new Reply();
        $reply1->setContent('Je pense que Symfony est le meilleur framework PHP.')
               ->setTopic($topic1);
        $manager->persist($reply1);

        $reply2 = new Reply();
        $reply2->setContent('Laravel a aussi beaucoup de bonnes fonctionnalités.')
               ->setTopic($topic1);
        $manager->persist($reply2);

        // Réponses pour le sujet "Les bonnes pratiques en PHP"
        $reply3 = new Reply();
        $reply3->setContent('Utiliser les namespaces est essentiel.')
               ->setTopic($topic2);
        $manager->persist($reply3);

        $reply4 = new Reply();
        $reply4->setContent('Il est important d\'avoir une bonne couverture de tests unitaires.')
               ->setTopic($topic2);
        $manager->persist($reply4);

        // Réponses pour le sujet "Les nouveautés de Symfony 6"
        $reply5 = new Reply();
        $reply5->setContent('Symfony 6 améliore la performance et facilite le développement avec la nouvelle version de Flex.')
               ->setTopic($topic3);
        $manager->persist($reply5);

        $reply6 = new Reply();
        $reply6->setContent('Il y a également de nouvelles fonctionnalités pour la gestion des formulaires.')
               ->setTopic($topic3);
        $manager->persist($reply6);

        // Réponses pour le sujet "Comment sécuriser une application Symfony ?"
        $reply7 = new Reply();
        $reply7->setContent('Utilisez les rôles et les permissions correctement.')
               ->setTopic($topic4);
        $manager->persist($reply7);

        $reply8 = new Reply();
        $reply8->setContent('Ne jamais stocker de mots de passe en clair et toujours utiliser HTTPS.')
               ->setTopic($topic4);
        $manager->persist($reply8);

        // Réponses pour le sujet "Comment utiliser les Promises en JavaScript ?"
        $reply9 = new Reply();
        $reply9->setContent('Les Promises sont très utiles pour gérer les appels asynchrones.')
               ->setTopic($topic5);
        $manager->persist($reply9);

        $reply10 = new Reply();
        $reply10->setContent('N\'oubliez pas de toujours gérer les erreurs avec `.catch()`.')
               ->setTopic($topic5);
        $manager->persist($reply10);

        // Réponses pour le sujet "Les bases de Node.js"
        $reply11 = new Reply();
        $reply11->setContent('Node.js est excellent pour créer des applications serveur à haute performance.')
                ->setTopic($topic6);
        $manager->persist($reply11);

        $reply12 = new Reply();
        $reply12->setContent('Les modules Node.js sont très pratiques pour gérer des tâches courantes.')
                ->setTopic($topic6);
        $manager->persist($reply12);

        // Réponses pour le sujet "Introduction à React Hooks"
        $reply13 = new Reply();
        $reply13->setContent('React Hooks simplifie la gestion des états dans les composants fonctionnels.')
                ->setTopic($topic7);
        $manager->persist($reply13);

        $reply14 = new Reply();
        $reply14->setContent('Utiliser `useState` et `useEffect` dans React est essentiel pour la gestion des états et des effets secondaires.')
                ->setTopic($topic7);
        $manager->persist($reply14);

        // Réponses pour le sujet "Gérer l'état global avec Redux"
        $reply15 = new Reply();
        $reply15->setContent('Redux est idéal pour gérer l\'état global d\'une application React.')
                ->setTopic($topic8);
        $manager->persist($reply15);

        $reply16 = new Reply();
        $reply16->setContent('Il est important de bien structurer l\'état de l\'application avec Redux.')
                ->setTopic($topic8);
        $manager->persist($reply16);

        // Ajout des utilisateurs
        $user1 = new User();
        $user1->setEmail('user1@example.com')
              ->setPassword(password_hash('password1', PASSWORD_BCRYPT))
              ->setFirstName('Alice')
              ->setLastName('Smith')
              ->setRoles(['ROLE_USER']);
        $manager->persist($user1);

        $user2 = new User();
        $user2->setEmail('user2@example.com')
              ->setPassword(password_hash('password2', PASSWORD_BCRYPT))
              ->setFirstName('Bob')
              ->setLastName('Johnson')
              ->setRoles(['ROLE_USER']);
        $manager->persist($user2);

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
