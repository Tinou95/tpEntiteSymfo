<?php
// src/Controller/SecurityController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SecurityController extends AbstractController
{
    #[Route('/logout', name: 'app_logout')]
    public function logout(): RedirectResponse
    {
        // Cette méthode est automatiquement gérée par Symfony
        // mais peut être laissée vide.
    }
}
