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
        $lifeAdvice = [
            [
                'title' => "What’s the Best Advice You’ve Ever Ignored (and Regretted)?",
                'description' => "Sometimes we hear wise words and dismiss them — only to realize much later how right they were. What’s a piece of advice you brushed off at the time, but now wish you’d followed? Who gave it to you, and how would things have been different?"
            ],
            [
                'title' => "If You Could Send a Message to Your 16-Year-Old Self",
                'description' => "Imagine you could write one short paragraph to your teenage self. What would you say? Would it be a warning, encouragement, or something you wish someone had told you back then?"
            ],
            [
                'title' => "What’s a Life Lesson That Took You Way Too Long to Learn?",
                'description' => "Growth is often slow — and painful. What's something you now understand about relationships, work, or self-worth that you wish you'd figured out years earlier?"
            ],
            [
                'title' => "Would You Take Advice from a Stranger or a Friend?",
                'description' => "When facing a dilemma, do you trust people close to you — or do strangers sometimes offer the clarity you need? Share a time advice came from an unexpected source.",
                'choices' => ["Stranger's objectivity", "Friend's insight", "Depends on the topic", "Neither – trust myself"]
            ],
            [
                'title' => "What’s the Most Overrated Piece of Advice You Hear Often?",
                'description' => "Some phrases get repeated so much they lose meaning — or even backfire. What's one cliché piece of advice that you think causes more harm than good?"
            ],
            [
                'title' => "What Do You Think Is the Most Underrated Life Skill?",
                'description' => "Forget the flashy stuff — what's a basic life skill people underestimate, but that has made a huge difference in your own life?"
            ],
            [
                'title' => "What’s the First Life Lesson You’d Teach a Child?",
                'description' => "Imagine a kid asks you how to live a good life. You only get one lesson to pass on. What principle would you share, and why?"
            ],
            [
                'title' => "How Do You Decide Whose Advice to Actually Follow?",
                'description' => "Everyone has an opinion, but whose voice do you trust when making big decisions? Is it credentials, experience, gut instinct — or something else?"
            ],
            [
                'title' => "Have You Ever Given Great Advice You Couldn't Take?",
                'description' => "It’s often easier to advise others than ourselves. Have you ever given someone heartfelt, insightful advice — but couldn’t follow it in your own life? Why?"
            ],
            [
                'title' => "What’s a Harsh Truth You’ve Come to Appreciate?",
                'description' => "Some advice hurts in the moment but reveals deep wisdom over time. What’s a truth you didn’t want to hear — but now you’re glad you did?"
            ],
            [
                'title' => "Would You Rather Be Honest or Kind When Giving Advice?",
                'description' => "Honesty can sting, but kindness may soften the message. When someone seeks your advice, do you tell it like it is — or cushion it for their comfort?",
                'choices' => ["Always honest", "Gentle honesty", "Kindness first", "Depends on the situation"]
            ],
            [
                'title' => "What’s a Piece of Advice That Changed Your Mental Health?",
                'description' => "Sometimes a simple sentence can change how we see our minds. What’s one tip or reminder that has helped you manage stress, anxiety, or self-doubt?"
            ],
            [
                'title' => "What Advice Do You Wish You Heard More Often?",
                'description' => "Not all wisdom is shared equally. What's a perspective or piece of encouragement you rarely hear — but believe more people need to?"
            ],
            [
                'title' => "Is It Ever Okay to Ignore Advice from People Who Care?",
                'description' => "Friends and family mean well, but their ideas don’t always fit your path. Have you ever made the right choice by not listening to someone close — and how did it turn out?"
            ],
            [
                'title' => "What's One Life Philosophy You Actually Live By?",
                'description' => "Forget vague quotes. What’s a principle, rule, or mantra you actually use day-to-day that helps guide your decisions and keep you grounded?"
            ],
            [
                'title' => "If You Could Make Everyone Follow One Rule…",
                'description' => "Imagine you had the power to enforce one universal rule everyone had to live by — no exceptions. What would it be, and how do you think it would improve life?"
            ],
            [
                'title' => "What's the Worst Advice You've Ever Received?",
                'description' => "Not all advice is good — some of it is shockingly bad. What’s something someone told you to do (or not do) that led to chaos, confusion, or just a good story?"
            ],
            [
                'title' => "What’s Something You Wish Older Generations Understood?",
                'description' => "Advice from elders can be valuable — but sometimes out of touch. What’s one thing you wish they better understood about modern life, relationships, or mental health?"
            ],
            [
                'title' => "Would You Rather Learn from Mistakes or From Mentors?",
                'description' => "Some people need to fail to grow; others learn by listening. Which one are you, and what has taught you more in life so far?",
                'choices' => ["Trial and error", "Mentorship", "Both equally", "Depends on the stakes"]
            ],
            [
                'title' => "What Advice Would You Etch on a Park Bench Forever?",
                'description' => "You get one chance to inscribe a sentence onto a park bench — something future strangers will read and reflect on. What truth or advice would you leave behind?"
            ]
        ];



        // Categories mapped to card questions
        $cards = [
            "Life Advice" => $lifeAdvice
        ];


        foreach ($cards as $cats => $cardDatas) {
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