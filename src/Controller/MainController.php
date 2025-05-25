<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
    public function __construct(private CategoryRepository $categoryRepository)
    {
        // This constructor can be used for dependency injection or other initializations.
    }
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        // This is the main entry point of the application.

        $categories = $this->categoryRepository->findAll();

        // It renders the main index template.
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'categories' => $categories,
        ]);
    }
}
