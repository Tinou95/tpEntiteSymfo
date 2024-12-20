<?php

// src/Controller/HomeController.php

namespace App\Controller;

use App\Entity\Topic;
use App\Entity\Category;
use App\Repository\TopicRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(TopicRepository $topicRepository, CategoryRepository $categoryRepository): Response
    {
        // Retrieve all topics and categories from the database
        $topics = $topicRepository->findAll();
        $categories = $categoryRepository->findAll();

        return $this->render('home/index.html.twig', [
            'topics' => $topics,
            'categories' => $categories,
        ]);
    }
}
