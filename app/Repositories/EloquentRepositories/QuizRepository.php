<?php namespace App\Repositories\EloquentRepositories;
use Illuminate\Support\Facades\DB;
use App\Repositories\EloquentRepositories\Presenter\QuizPresenter;
use App\Quiz\Interfaces\QuizRepositoryInterface;

class QuizRepository implements QuizRepositoryInterface
{
    protected $presenter;

    public function __construct()
    {
        $this->presenter = new QuizPresenter();
    }

    //récupère les données de la base de données des tables answers et questions et les envoie au présentateur pour les formater 
    public function fetch():array{
        $questions = DB::table('questions')
            ->join('answers', 'questions.id', '=', 'question_id')
            ->select('questions.label AS questionLabel', 
                     'questions.type AS questionType', 
                     'answers.label AS answerLabel',
                     'answers.is_valid',
                     'answers.id AS id')
            ->get();

        
	    $preparedQuestions = $this->presenter->present($questions);
      	return $preparedQuestions;    
    }

}