<?php

namespace App\DataFixtures;

use App\Entity\Cards;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CardFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Categories mapped to card questions
        $cards = [
            'icebreakers' => [
                "What's your favorite season and why?",
                "If you could have dinner with any famous person, who would it be?",
                "What’s the last movie you watched?",
                "Do you prefer the beach or the mountains?",
                "What’s your go-to karaoke song?",
                "Coffee or tea — and how do you take it?",
                "What's your most-used emoji?",
                "If you won a free plane ticket, where would you go?",
                "Morning person or night owl?",
                "What’s something people often misunderstand about you?",
                "If you had to eat one food for a week, what would it be?",
                "What’s your biggest irrational fear?",
                "What's your favorite app on your phone?",
                "Do you prefer cats, dogs, or something else?",
                "What’s the first thing you do when you wake up?",
                "What’s one thing you’d bring to a desert island?",
                "What’s a skill you wish you had?",
                "Would you rather explore space or the deep sea?",
                "What was your first job?",
                "What’s something that always makes you smile?",
            ],
            'would_you_rather' => [
                "Be able to fly or be invisible?",
                "Give up your phone or your pet for a week?",
                "Always be 10 minutes early or 20 minutes late?",
                "Never use social media again or never watch TV again?",
                "Live in the city or the countryside?",
                "Lose the ability to speak or the ability to read?",
                "Be rich and unknown or famous and broke?",
                "Have unlimited time or unlimited money?",
                "Always have to sing instead of speak or dance everywhere you go?",
                "Only be able to whisper or shout?",
                "Be stuck in a rom-com or a horror movie?",
                "Travel to the past or the future?",
                "Eat only sweet food or only salty food?",
                "Work 4 days a week for 10 hours or 6 days a week for 6 hours?",
                "Live without music or without movies?",
                "Always have to tell the truth or always lie?",
                "Only be able to text or only be able to call?",
                "Have a pause button or a rewind button in life?",
                "Be a famous chef or a world-class musician?",
                "Be able to speak all languages or play every instrument?",
            ],
            'deep_thoughts' => [
                "What does success mean to you?",
                "What’s something you’ve changed your mind about recently?",
                "If you could send a message to your younger self, what would it say?",
                "Do you believe everything happens for a reason?",
                "What’s the most important lesson life has taught you?",
                "When do you feel most at peace?",
                "How do you handle failure?",
                "What legacy do you want to leave behind?",
                "What does happiness look like to you?",
                "How do you define love?",
                "What role does fear play in your life?",
                "What’s a memory you hope to never forget?",
                "Do you believe people can truly change?",
                "What’s more important: truth or kindness?",
                "When was the last time you felt truly understood?",
                "What does freedom mean to you?",
                "How do you recharge after a long day?",
                "If you could master any virtue, which one would it be?",
                "Is it more important to be liked or respected?",
                "How do you know when you’re doing the right thing?",
            ],
            'pop_culture' => [
                "Who’s your favorite music artist right now?",
                "What TV show are you binge-watching?",
                "Marvel or DC — and why?",
                "What’s your favorite movie of all time?",
                "Who’s the most iconic celebrity in your opinion?",
                "What’s the last concert or live event you attended?",
                "What book deserves a movie adaptation?",
                "TikTok or Instagram — which do you prefer?",
                "If you could star in any movie genre, what would it be?",
                "What’s your guilty pleasure song?",
                "Who’s a fictional character you relate to?",
                "What’s one trend you don’t understand?",
                "Which celebrity would you swap lives with for a day?",
                "What’s a classic movie you’ve never seen?",
                "Which game show would you crush?",
                "If your life were a TV series, what would it be called?",
                "Who's your favorite late-night host?",
                "What’s a viral moment you still think about?",
                "What’s your favorite childhood cartoon?",
                "What’s a song that always gets you dancing?",
            ],
            'just_for_fun' => [
                "If animals could talk, which would be the rudest?",
                "What would your superhero name be?",
                "If you had a time machine, where’s the first place you’d go?",
                "What’s your weirdest talent?",
                "You find a genie — what’s your first wish?",
                "What’s something you could teach a class about?",
                "What’s your zombie apocalypse plan?",
                "Would you survive a day as your pet?",
                "If your life had a theme song, what would it be?",
                "What's the silliest fear you've ever had?",
                "Which cartoon world would you live in?",
                "What’s your dream job if money didn’t matter?",
                "What’s the worst fashion trend you ever followed?",
                "What would be your entrance song in a wrestling match?",
                "If you had to swap lives with a cartoon character, who?",
                "What would you name your spaceship?",
                "If you were invisible for a day, what would you do?",
                "What’s something totally useless you know a lot about?",
                "What’s the most ridiculous goal you've ever set?",
                "If you were a dessert, what would you be?",
            ],
            'developer' => [
                "What’s your favorite programming language and why?",
                "How do you handle debugging a tricky issue?",
                "What’s the most challenging project you’ve worked on?",
                "Do you prefer front-end or back-end development?",
                "What’s your go-to resource for learning new tech?",
                "How do you stay updated with industry trends?",
                "What’s a coding practice you swear by?",
                "Have you ever contributed to open source? If so, what?",
                "What’s your favorite development tool or IDE?",
                "How do you approach code reviews?",
                "What’s the most satisfying bug fix you’ve ever made?",
                "Do you prefer working solo or in a team?",
                "What’s a common misconception about developers?",
                "How do you manage work-life balance as a developer?",
                "What’s your favorite tech conference or event?",
                "If you could automate one part of your job, what would it be?",
                "What’s the best piece of advice you've received as a developer?",
                "How do you handle tight deadlines in development projects?",
                "What’s your favorite side project you've worked on?",
                "If you could learn any new technology instantly, what would it be?",
            ],
            "fx_designer" =>[
                "What’s your go-to software for FX design and why?",
                "Practical effects or CGI — which do you prefer and when?",
                "Describe a moment when a simulation surprised you.",
                "What’s one FX shot you're especially proud of?",
                "How do you stay creative under tight deadlines?",
                "What's the most technically challenging effect you've worked on?",
                "What do you think makes an FX shot believable?",
                "What are your favorite FX-heavy films or games?",
                "Have you ever had an FX shot fail spectacularly? What happened?",
                "Which part of the FX pipeline excites you the most?",
                "What’s a tool or plugin you can’t live without?",
                "How do you keep up with industry trends and techniques?",
                "What’s the weirdest reference you've used for an effect?",
                "Do you prefer working in film, TV, games, or ads?",
                "What’s your approach to balancing realism and style?",
                "Share a tip for optimizing heavy FX scenes.",
                "What’s an overlooked skill every FX artist should develop?",
                "What’s your dream FX project or studio to work with?",
                "What makes a strong FX showreel stand out?",
                "How do you handle creative feedback or changes?",
            ]
        ];

        foreach ($cards as $categoryKey => $questions) {
            /** @var Category $category */
            $category = $this->getReference('category_' . $categoryKey, Category::class);

            foreach ($questions as $question) {
                $card = new Cards();
                $card->setTitle($question);
                $card->setDescription(''); // or a brief explanation if needed
                $card->setCategoryId($category);

                $manager->persist($card);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class,
        ];
    }
}


