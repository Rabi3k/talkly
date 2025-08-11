<?php

namespace App\Controller;

use App\Repository\CardsRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Translation\Translator;

final class CardsController extends AbstractController
{
    public function __construct(
        private CardsRepository $cardsRepository,
        private CategoryRepository $categoryRepository,
    ) {
        // This constructor can be used for dependency injection or other initializations.
    }
    #[Route('/cards/{id}', name: 'app_cards')]
    public function index($id): Response
    {
        if ($id === 'random') {
            $cards = $this->cardsRepository->findOneRandomCard();
        } else {
            $cards = $this->cardsRepository->findOneRandomCardByCategory($id);
        }

        if (!$cards) {
            $message = 'No cards found for the given ID.';
            throw $this->createNotFoundException('No cards found for the given ID.');
        }
        $category = $this->categoryRepository->find($cards->getCategoryId());
        return $this->render('cards/index.html.twig', [
            'controller_name' => 'CardsController',
            'cards' => $cards,
            'category' => $category,
        ]);
    }
    #[Route('/card/{id}', name: 'app_card_show')]
    public function show($id): Response
    {
        $cards = $this->cardsRepository->find($id);
        if (!$cards) {
            $message = 'No cards found for the given ID.';
            throw $this->createNotFoundException('No cards found for the given ID.');
        }
        $category = $this->categoryRepository->find($cards->getCategoryId());
        // Show all cards or a specific card
         return $this->render('cards/index.html.twig', [
            'controller_name' => 'CardsController',
            'cards' => $cards,
            'category' => $category,
        ]);
    }
}
