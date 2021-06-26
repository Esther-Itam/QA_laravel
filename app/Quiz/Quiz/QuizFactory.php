<?php
namespace App\Quiz\Quiz;
use App\Quiz\Answer\AnswerFactoryDirector;
use App\Repositories\EloquentRepositories\QuestionRepository;
use App\Quiz\Interfaces\QuizRepositoryInterface;



class QuizFactory{
    
    protected QuizRepositoryInterface $quizRepositoryInterface;
    protected AnswerFactoryDirector $answerFactoryDirector;
    protected QuestionRepository $questionRepository;


    public function __construct($quizRepositoryInterface, $answerFactoryDirector, $questionRepository){
        $this->$quizRepositoryInterface=$quizRepositoryInterface;
        $this->$answerFactoryDirector=$answerFactoryDirector;
        $this->questionRepository=$questionRepository;
    }

    protected function createQuiz(){
        
    }
}