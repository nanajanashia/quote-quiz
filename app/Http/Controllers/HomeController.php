<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Statistics;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function getYesNoQuiz()
    {
        $quotes = \DB::table('quotes')
            ->join('authors', 'authors.id', '=', 'quotes.author_id')
            ->select('quotes.*', 'authors.full_name as author_name')
            ->inRandomOrder()
            ->take(10)
            ->get();

        $authors = Authors::inRandomOrder()->take(10)->get();

        $result = [];
        foreach ($quotes as $k=>$v){
            $quote = $quotes[$k];
            $quote->random_author_id = $authors[$k]['id'];
            $quote->random_author_name = $authors[$k]['full_name'];
            $result[] = $quote;
        }

        return collect($result)->toJson();
    }

    public function getMultipleChoiceQuiz()
    {
        $quotes = \DB::table('quotes')
            ->join('authors', 'authors.id', '=', 'quotes.author_id')
            ->select('quotes.*', 'authors.full_name as author_name')
            ->inRandomOrder()
            ->take(10)
            ->get();

        $result = [];
        foreach ($quotes as $k=>$v){

            $quote = $quotes[$k];
            $ids[] = $quotes[$k]->author_id;

            $choices[] = ['random_author_id' =>$quotes[$k]->author_id, 'random_author_name' =>$quotes[$k]->author_name];

            // fetch random authors from the db until we have three unique authors for the answers
            while (count($ids) < 3){
                $authors = Authors::inRandomOrder()->take(2)->get();
                foreach ($authors as $author){
                    if(!in_array($author->id, $ids) && count($ids) < 3){
                        $ids[] = $author->id;
                        $choices[] = ['random_author_id' =>$author->id, 'random_author_name' =>$author->full_name];
                    }
                }
            }

            shuffle($choices);
            $quote->choices = $choices;
            $result[] = $quote;
            $ids = [];
            $choices = [];
        }

        return collect($result)->toJson();
    }

    public function startQuiz()
    {
        $stat = Statistics::first();
        $stat->number_of_users++;
        $stat->save();
    }

    public function finishQuiz()
    {
        $stat = Statistics::first();
        $stat->number_of_users_completed++;
        $stat->save();
    }

    public function correctAnswers()
    {
        $stat = Statistics::first();
        $stat->number_of_correct_answers++;
        $stat->save();
    }

    public function incorrectAnswers()
    {
        $stat = Statistics::first();
        $stat->number_of_incorrect_answers++;
        $stat->save();
    }

    public function getStatistics()
    {
        $stat = Statistics::first();

        return collect($stat)->toJson();
    }
}
