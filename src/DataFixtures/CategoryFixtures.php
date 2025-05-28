<?php
// src/DataFixtures/CategoryFixtures.php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\VarDumper\VarDumper;

class CategoryFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Correct reference retrieval
        // $language = $manager->getRepository(Language::class)->findOneBy(['code' => 'en']);
        // if (!$language) {
        //     throw new \Exception('Language with code "en" not found.');
        // }
        // $categories = [
        //     [
        //         'title' => "Finance and Accounting",
        //         'description' => "Discuss financial strategies, accounting principles, and investment tips.",
        //     ]
        // ];
        // foreach ($categories as $categoryData) {
        //     $category = new Category();
        //     if (!isset($categoryData['title']) || !isset($categoryData['description'])) {
        //         var_dump($categoryData);
        //         throw new \Exception('Category data must contain title and description.');
        //     }
        //     $category->setTitle($categoryData['title']);
        //     $category->setDescription($categoryData['description']);
        //     $category->setLanguageCode($language); // Set the language code
        //     $category->setUuid(Uuid::v4()); // Generate a new UUID for the category

        //     $manager->persist($category);

        //     // Create a reference for this category

        // }
        // $manager->flush();
        
        /* $language = $this->getReference('lang_en', Language::class);


        $categories = [
            ['Icebreakers', 'Fun starters to warm up a conversation.'],
            ['Would You Rather', 'This or that? Tough choices ahead.'],
            ['Deep Thoughts', 'Reflective and philosophical prompts.'],
            ['Pop Culture', 'TV, music, movies, and trends.'],
            ['Just for Fun', 'Random and silly prompts.'],
            ['Music', 'Discuss your favorite tunes and artists.'],
            ['Movies', 'Talk about films, genres, and directors.'],
            ['Books', 'Share your favorite reads and authors.'],
            ['Travel', 'Explore destinations and travel stories.'],
            ['Food', 'Culinary delights and recipes to share.'],
            ['Hobbies', 'Discuss your passions and pastimes.'],
            ['Pets', 'Share stories about your furry friends.'],
            ['Life Advice', 'Tips and wisdom for everyday life.'],
            ['Tech Talk', 'Latest gadgets, software, and innovations.'],
            ['Gaming', 'Video games, board games, and more.'],
            ['Couples', 'Prompts for couples to connect and share.'],
            ['Family', 'Conversations about family life and dynamics.'],
            ['Work', 'Discuss careers, jobs, and workplace experiences.'],
            ['Education', 'Learning, schools, and academic life.'],
            ['Health & Wellness', 'Physical and mental well-being topics.'],
            ['Fashion', 'Style, trends, and personal fashion choices.'],
            ['Art & Design', 'Creative discussions about art and design.'],
            ['History', 'Explore historical events and figures.'],
            ['Science', 'Curious about the universe? Let’s talk science!'],
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

            $refKey = 'category_' . $this->slugifyCategory($title);
            $this->addReference($refKey, $category);
        }

        $manager->flush();*/
    }
    private function slugifyCategory(string $text): string
    {
        // Replace non-word characters with underscores
        $text = preg_replace('/[^\w]+/', '_', $text);
        // Trim leading/trailing underscores
        $text = trim($text, '_');
        // Convert to lowercase
        return strtolower($text);
    }
    public function getDependencies(): array
    {
        return [
            LanguageFixtures::class,
        ];
    }
}
