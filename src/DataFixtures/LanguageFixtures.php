<?php
// src/DataFixtures/LanguageFixtures.php

namespace App\DataFixtures;

use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LanguageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $languages = [
            ['en', 'English'],
            ['da', 'Danish']
        ];
        foreach ($languages as [$code, $title]) {
            $language = new Language();
            $language->setCode($code);
            $language->setTitle($title);
            $manager->persist($language);
            // Optional: save as reference for other fixtures
            $this->addReference("lang_$code", $language);
        }
        $manager->flush();
    }
}
