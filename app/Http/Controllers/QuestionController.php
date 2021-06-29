<?php

namespace App\Http\Controllers;
use App\Quiz\Quiz\QuizFactory;
use Illuminate\Http\Request;
use App\Quiz\Answer\AnswerFactoryDirector;
use App\Repositories\EloquentRepositories\QuizRepository;
use App\Repositories\EloquentRepositories\QuestionRepository;

class QuestionController extends Controller
{
    public function index(){
        $randomQuestion = $this->displayRandom();
        return view('question', ['question' => $randomQuestion]);
    }

    public function displayRandom(){
        //on instancie un nouveau Quiz qui comporte les objets question, answer
        $factory = new QuizFactory(new QuizRepository(), new AnswerFactoryDirector(), new QuestionRepository());
        //on utilise la méthode getQuiz() de QuizFactory
        $quiz = $factory->getQuiz();
        //on utilise la méthode getRandomQuestion() de Quiz
        $randomQuestion = $quiz->getRandomQuestion();
        $randomQuestionArray = $randomQuestion->toArray();
        return $randomQuestionArray ;
    }
    
}