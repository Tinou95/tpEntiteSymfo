<?php

// src/Controller/SecurityController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(): Response
    {
        // Si l'utilisateur est déjà connecté, redirige vers le tableau de bord
        if ($this->getUser()) {
            return $this->redirectToRoute('dashboard');
        }

        return $this->render('security/login.html.twig');
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout()
    {
        // Symfony gère automatiquement la déconnexion
    }
}
