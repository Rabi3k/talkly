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
        $cards =["icebreakers" =>[
            [
                'title' => "What's Your Origin Story?",
                'description' => "Every superhero has an origin story — and so do you. What key moments, people, or decisions shaped who you are today? Think back to your childhood, a turning point in your teenage years, or even a recent event that had an impact. Share the highlights, the unexpected twists, or even the embarrassing beginnings."
            ],
            [
                'title' => "Strangest Compliment You've Ever Received",
                'description' => "We’ve all gotten compliments that made us pause and think, ‘Thanks… I think?’ Share the weirdest or most memorable compliment you’ve ever received. It might be about your laugh, your vibe, or something completely unexpected — and whether it felt good, awkward, or oddly insightful.",
                'choices' => [
                    "You have an oddly calming presence",
                    "You remind me of a golden retriever",
                    "You blink like someone in a movie",
                    "You smell like books"
                ]
            ],
            [
                'title' => "What Would Be on Your Warning Label?",
                'description' => "If you came with a sticker warning others about one thing, what would it say? Whether it's ‘Spontaneous Dance Breaks’ or ‘Do Not Engage Before Coffee,’ let your quirks and disclaimers shine. This question breaks the ice by inviting humor, self-awareness, and playful honesty."
            ],
            [
                'title' => "What Do You Collect Without Realizing It?",
                'description' => "Some people collect mugs, others collect awkward stories, funny screenshots, or half-used notebooks. What’s something you’ve unintentionally gathered over the years — physically or metaphorically? This is a surprising window into what someone values, obsesses over, or simply attracts like a magnet."
            ],
            [
                'title' => "Your Life in a Sitcom Episode",
                'description' => "Imagine your daily life as an episode in a sitcom. What’s the title of today’s episode? Who are the recurring characters? Is it a chaotic workplace comedy, a slice-of-life drama, or a surrealist sketch show? Share the tone, the plot twist, and maybe the theme song."
            ],
            [
                'title' => "What Ice Cream Flavor Represents Your Personality?",
                'description' => "If your personality could be translated into an ice cream flavor, what would it be and why? Are you more of a classic vanilla, a spicy cinnamon swirl, or an unpredictable rocky road? This whimsical metaphor invites people to reflect on their traits in a creative way.",
                'choices' => [
                    "Classic Vanilla",
                    "Chocolate with Chili",
                    "Mint Cookie Madness",
                    "Lemon Sorbet Surprise"
                ]
            ],
            [
                'title' => "If You Had a Personal Motto, What Would It Be?",
                'description' => "Everyone has a personal philosophy — some just haven't put it into words yet. Share your life motto or one you’d adopt. Whether serious, hilarious, or poetic, this helps others see what drives or centers you in everyday life."
            ],
            [
                'title' => "What's Your Go-To Karaoke Song and Why?",
                'description' => "Even if you’ve never sung karaoke, imagine you had to. What song would you choose, and what does that choice say about you? Is it a power ballad, a guilty pleasure, or something so bad it’s good? Great stories usually follow."
            ],
            [
                'title' => "Describe Your Ideal Lazy Day",
                'description' => "When you truly have nothing to do, how do you spend your time? Paint a picture of your perfect day of doing as little as possible — whether it’s binge-watching, lounging outdoors, or taking naps between snacks."
            ],
            [
                'title' => "Have You Ever Had a 'Sliding Doors' Moment?",
                'description' => "Think of a small decision that unexpectedly changed the direction of your life. What if you had turned left instead of right? What if you answered a call you normally wouldn’t? Share your 'what if' story."
            ],
            [
                'title' => "What's a Misconception People Often Have About You?",
                'description' => "First impressions aren’t always accurate. What do people often get wrong about you when they first meet you, and what’s the real story? This question invites honesty and helps break through surface-level assumptions."
            ],
            [
                'title' => "What's One Odd Habit You Secretly Love?",
                'description' => "We all have strange little routines or preferences — maybe you only write with blue pens or eat cereal with a fork. Share yours and why you love it. Bonus points for habits that others find baffling or amusing."
            ],
            [
                'title' => "If Your Life Had a Soundtrack, What Would Be the Opening Song?",
                'description' => "From cinematic orchestras to upbeat indie jams, what’s the first track that would play when your life movie begins? This opens the door to nostalgia, personal taste, and epic mental imagery."
            ],
            [
                'title' => "What's a Silly Fear You’ve Never Outgrown?",
                'description' => "Whether it's clowns, pigeons, or escalators — some fears just stick. Share yours and whether it still affects your life or just gives you a good story. Laughter and unexpected bonding usually follow."
            ],
            [
                'title' => "If You Could Live in Any Fictional Universe, Which One?",
                'description' => "From Hogwarts to Middle Earth or a galaxy far, far away — where would you live if fiction were real? This taps into someone’s imagination, values, and love for storytelling."
            ],
            [
                'title' => "What’s a Debate You’ll Never Back Down From?",
                'description' => "Some arguments are lighthearted but serious business — like pineapple on pizza or the best cereal. What’s your hill to die on, and why? This sparks fun banter and reveals what people care about passionately or irrationally.",
                'choices' => [
                    "Pineapple belongs on pizza",
                    "Cereal is a soup",
                    "Cats are better than dogs",
                    "Toilet paper goes over, not under"
                ]
            ],
            [
                'title' => "What’s a Skill You Wish Everyone Learned in School?",
                'description' => "Imagine designing a class that’s not taught but totally should be — like emotional intelligence, cooking, or how to apologize. What would it be, and why do you think it matters so much in real life?"
            ],
            [
                'title' => "Tell Us About a Happy Accident in Your Life",
                'description' => "Sometimes the best things happen by mistake. Share a time when a missed train, a lost item, or a chance encounter led to something unexpectedly wonderful. These stories are often inspiring and full of charm."
            ],
            [
                'title' => "What’s Your Guilty Pleasure That You’re Not Ashamed Of?",
                'description' => "We all have them — a song you sing too loudly, a reality show you binge, or snacks you shouldn’t love. What’s yours, and what makes it so satisfying? Own it proudly."
            ],
            [
                'title' => "If You Had a Clone for One Day, What Would You Do?",
                'description' => "What would you do with twice the manpower and a shared brain? Would your clone clean while you nap? Go to work so you don’t have to? Or team up for pranks? This playful scenario unlocks creativity and often hilarious responses."
            ]
        ]
    ];

    
    foreach ($cards as $cats=>$cardDatas) {
        $category = $manager->getRepository(Category::class)->findOneBy(['title' => $cats]);
        foreach ($cardDatas as $cardData) {
                $card = new Cards();
                $card->setTitle($cardData['title']);
                $card->setDescription($cardData['description']);
                $card->setCategoryId($category);

                if (isset($cardData['choices'])) {
                    $card->setChoices($cardData['choices']);
                }
                
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

/*


*/