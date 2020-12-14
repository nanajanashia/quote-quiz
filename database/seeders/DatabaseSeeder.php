<?php

namespace Database\Seeders;

use App\Models\Authors;
use App\Models\Quotes;
use App\Models\Statistics;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed quotes and authors.
     * Set default values for statistics.
     *
     * @return void
     */
    public function run()
    {
        $authors = [
            [
                'id' => 1, 'full_name' => 'Steve Jobs'
            ],
            [
                'id' => 2, 'full_name' => 'Oscar Wilde'
            ],
            [
                'id' => 3, 'full_name' => 'Winston Churchill'
            ],
            [
                'id' => 4, 'full_name' => 'Joseph Stalin'
            ],
            [
                'id' => 5, 'full_name' => 'John F. Kennedy'
            ],
            [
                'id' => 6, 'full_name' => 'Andy Warhol'
            ],
            [
                'id' => 7, 'full_name' => 'Martin Luther King'
            ],
            [
                'id' => 8, 'full_name' => 'Marilyn Monroe'
            ],
            [
                'id' => 9, 'full_name' => 'Albert Einstein'
            ],
            [
                'id' => 10, 'full_name' => 'Thomas Edison'
            ],
            [
                'id' => 11, 'full_name' => 'Mahatma Gandhi'
            ],
            [
                'id' => 12, 'full_name' => 'Nelson Mandela'
            ],
            [
                'id' => 13, 'full_name' => 'Margaret Thatcher'
            ],
            [
                'id' => 14, 'full_name' => 'Pablo Picasso'
            ],
            [
                'id' => 15, 'full_name' => 'Abraham Lincoln'
            ],
            [
                'id' => 16, 'full_name' => 'Eleanor Roosevelt'
            ],
            [
                'id' => 17, 'full_name' => 'Oprah Winfrey'
            ],
            [
                'id' => 18, 'full_name' => 'Benjamin Franklin'
            ],
            [
                'id' => 19, 'full_name' => 'Aristotle'
            ],
            [
                'id' => 20, 'full_name' => 'Helen Keller'
            ]
        ];

        $quotes = [
            [
                'id' => 1, 'author_id' => 15, 'quote' => "In the end, it's not the years in your life that count. It's the life in your years."
            ],
            [
                'id' => 2, 'author_id' => 15, 'quote' => 'Whatever you are, be a good one.'
            ],
            [
                'id' => 3, 'author_id' => 15, 'quote' => "I'm a success today because I had a friend who believed in me and I didn't have the heart to let him down."
            ],
            [
                'id' => 4, 'author_id' => 16, 'quote' => "Do one thing every day that scares you."
            ],
            [
                'id' => 5, 'author_id' => 16, 'quote' => "Do what you feel in your heart to be right – for you'll be criticized anyway"
            ],
            [
                'id' => 6, 'author_id' => 16, 'quote' => "No one can make you feel inferior without your consent."
            ],
            [
                'id' => 7, 'author_id' => 17, 'quote' => "Doing the best at this moment puts you in the best place for the next moment"
            ],
            [
                'id' => 8, 'author_id' => 18, 'quote' => "Love your Enemies, for they tell you your Faults."
            ],
            [
                'id' => 9, 'author_id' => 18, 'quote' => "He that falls in love with himself will have no rivals."
            ],
            [
                'id' => 10, 'author_id' => 18, 'quote' => "There never was a good war or a bad peace."
            ],
            [
                'id' => 11, 'author_id' => 18, 'quote' => "Better slip with foot than tongue."
            ],
            [
                'id' => 12, 'author_id' => 18, 'quote' => "Better slip with foot than tongue."
            ],
            [
                'id' => 13, 'author_id' => 19, 'quote' => "We are what we repeatedly do. Excellence, then, is not an act, but a habit."
            ],
            [
                'id' => 14, 'author_id' => 19, 'quote' => "The whole is more than the sum of its parts."
            ],
            [
                'id' => 15, 'author_id' => 19, 'quote' => "Man is by nature a political animal."
            ],
            [
                'id' => 16, 'author_id' => 20, 'quote' => "The best and most beautiful things in the world cannot be seen or even touched - they must be felt with the heart."
            ],
            [
                'id' => 17, 'author_id' => 20, 'quote' => "Life is either a daring adventure, or nothing"
            ],
            [
                'id' => 18, 'author_id' => 20, 'quote' => "Alone we can do so little; together we can do so much."
            ],
            [
                'id' => 19, 'author_id' => 14, 'quote' => "Everything you can imagine is real."
            ],
            [
                'id' => 20, 'author_id' => 14, 'quote' => "Good artists copy, great artists steal."
            ],
            [
                'id' => 21, 'author_id' => 14, 'quote' => "Art washes away from the soul the dust of everyday life."
            ],
            [
                'id' => 21, 'author_id' => 13, 'quote' => "Disciplining yourself to do what you know is right and important, although difficult, is the highroad to pride, self-esteem, and personal satisfaction."
            ],
            [
                'id' => 23, 'author_id' => 13, 'quote' => "If you lead a country like Britain, a strong country, a country which has taken a lead in world affairs in good times and in bad, a country that is always reliable, then you have to have a touch of iron about you."
            ],
            [
                'id' => 24, 'author_id' => 12, 'quote' => "Real leaders must be ready to sacrifice all for the freedom of their people."
            ],
            [
                'id' => 25, 'author_id' => 12, 'quote' => "A fundamental concern for others in our individual and community lives would go a long way in making the world the better place we so passionately dreamt of."
            ],
            [
                'id' => 26, 'author_id' => 12, 'quote' => "Resentment is like drinking poison and then hoping it will kill your enemies."
            ],
            [
                'id' => 27, 'author_id' => 11, 'quote' => "Happiness is when what you think, what you say, and what you do are in harmony."
            ],
            [
                'id' => 28, 'author_id' => 11, 'quote' => "An eye for eye only ends up making the whole world blind."
            ],
            [
                'id' => 29, 'author_id' => 11, 'quote' => "Where there is love there is life."
            ],
            [
                'id' => 30, 'author_id' => 10, 'quote' => "Genius is one percent inspiration and ninety-nine percent perspiration."
            ],
            [
                'id' => 31, 'author_id' => 10, 'quote' => "I have not failed. I've just found 10,000 ways that won't work."
            ],
            [
                'id' => 32, 'author_id' => 10, 'quote' => "Our greatest weakness lies in giving up. The most certain way to succeed is always to try just one more time."
            ],
            [
                'id' => 33, 'author_id' => 9, 'quote' => "Imagination is more important than knowledge."
            ],
            [
                'id' => 34, 'author_id' => 9, 'quote' => "If you can't explain it simply, you don't understand it well enough."
            ],
            [
                'id' => 35, 'author_id' => 9, 'quote' => "Life is like riding a bicycle. To keep your balance you must keep moving."
            ],
            [
                'id' => 36, 'author_id' => 8, 'quote' => "Imperfection is beauty, madness is genius and it's better to be absolutely ridiculous than absolutely boring."
            ],
            [
                'id' => 37, 'author_id' => 8, 'quote' => "Give a girl the right pair of shoes and she'll conquer the world."
            ],
            [
                'id' => 38, 'author_id' => 8, 'quote' => "If you can make a woman laugh, you can make her do anything."
            ],
            [
                'id' => 39, 'author_id' => 7, 'quote' => "Injustice anywhere is a threat to justice everywhere."
            ],
            [
                'id' => 40, 'author_id' => 7, 'quote' => "A riot is the language of the unheard."
            ],
            [
                'id' => 41, 'author_id' => 7, 'quote' => "Darkness cannot drive out darkness; only light can do that. Hate cannot drive out hate; only love can do that."
            ],
            [
                'id' => 42, 'author_id' => 5, 'quote' => "Every accomplishment starts with the decision to try."
            ],
            [
                'id' => 43, 'author_id' => 5, 'quote' => "As we express our gratitude, we must never forget that the highest form of appreciation is not to utter words, but to live by them."
            ],
            [
                'id' => 44, 'author_id' => 5, 'quote' => "Those who dare to fail miserably can achieve greatly."
            ],
            [
                'id' => 45, 'author_id' => 5, 'quote' => "The ignorance of one voter in a democracy impairs the security of all."
            ],
            [
                'id' => 46, 'author_id' => 4, 'quote' => "A single death is a tragedy; a million deaths is a statistic."
            ],
            [
                'id' => 47, 'author_id' => 4, 'quote' => "Those who vote decide nothing. Those who count the vote decide everything."
            ],
            [
                'id' => 48, 'author_id' => 4, 'quote' => "Education is a weapon, whose effect depends on who holds it in his hands and at whom it is aimed."
            ],
            [
                'id' => 49, 'author_id' => 3, 'quote' => "This creature softened my heart of stone. She died and with her died my last warm feelings for humanity."
            ],
            [
                'id' => 50, 'author_id' => 2, 'quote' => "I can resist everything except temptation."
            ],
            [
                'id' => 51, 'author_id' => 2, 'quote' => "We are all in the gutter, but some of us are looking at the stars."
            ],
            [
                'id' => 52, 'author_id' => 2, 'quote' => "The only difference between the saint and the sinner is that every saint has a past, and every sinner has a future."
            ],
            [
                'id' => 53, 'author_id' => 2, 'quote' => "There is no such thing as a moral or an immoral book. Books are well written, or badly written. That is all."
            ],
            [
                'id' => 54, 'author_id' => 1, 'quote' => "Design is not just what it looks like and feels like. Design is how it works."
            ],
            [
                'id' => 55, 'author_id' => 2, 'quote' => "It's better to be a pirate than to join the Navy."
            ]
        ];

        foreach ($authors as $author) {
            Authors::firstOrCreate(['id' => $author['id']], $author);
        }

        foreach ($quotes as $quote) {
            Quotes::firstOrCreate(['id' => $quote['id']], $quote);
        }

        Statistics::firstOrCreate(['id' => 1]);
    }
}
