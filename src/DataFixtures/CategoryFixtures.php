<?php
// src/DataFixtures/CategoryFixtures.php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Uid\Uuid;

class CategoryFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Correct reference retrieval
        $language = $this->getReference('lang_en', Language::class);


        $categories = [
            ['Icebreakers', 'Fun starters to warm up a conversation.'],
            ['Would You Rather', 'This or that? Tough choices ahead.'],
            ['Deep Thoughts', 'Reflective and philosophical prompts.'],
            ['Pop Culture', 'TV, music, movies, and trends.'],
            ['Just for Fun', 'Random and silly prompts.'],
            ['Developer', 'Questions for developers about tech, code, and life.'],
            ['FX Designer', 'Conversation starters for visual effects artists and motion designers.']  
        ];

        foreach ($categories as [$title, $description]) {
            $category = new Category();
            $category->setTitle($title);
            $category->setDescription($description);
            $category->setLanguageCode($language); 
            $category->setUuid(Uuid::v4()); // Generate a new UUID for the category
            $manager->persist($category);

            $refKey = 'category_' . strtolower(str_replace(' ', '_', $title));
            $this->addReference($refKey, $category);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            LanguageFixtures::class,
        ];
    }
}
