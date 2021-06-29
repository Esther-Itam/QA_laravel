<?php
namespace App\Quiz\Quiz;
use App\Quiz\Answer\AnswerFactoryDirector;
use App\Repositories\EloquentRepositories\QuestionRepository;
use App\Quiz\Interfaces\QuizRepositoryInterface;


//QuizFactory va créer un objet questions en les associant à un objet answers et retourne un objet Quiz
class QuizFactory{
    //besoin d'un QuizRepository, d'un QuestionRepository
    protected QuizRepositoryInterface $quizRepository;
    protected AnswerFactoryDirector $answerFactoryDirector;
    protected QuestionRepository $questionRepository;


    public function __construct($quizRepositoryInterface, $answerFactoryDirector, $questionRepository){
        $this->$quizRepositoryInterface=$quizRepositoryInterface;
        $this->$answerFactoryDirector=$answerFactoryDirector;
        $this->questionRepository=$questionRepository;
    }

    protected function createQuiz(){
        //on récupère les données dans un tableau avec la méthode fetch() de FileQuizRepository formatées comme souhaité
        $preparedQuestions=$this->quizRepository->fetch();

        //on initialise un tableau vide puis on boucle dans ce tableau les preparedQuestions des repositories
        $preparedQuestions=[];
        foreach ($preparedQuestions as $preparedQuestion){
            $answers=[];
            //on boucle ensuite dans un tableau les answers
            foreach ($preparedQuestions['answers'] as $answer){
               //on instancie le AnswerFactoryDirector  
               $factory=new AnswerFactoryDirector();
                //l'instanciation va permettre de récupérer la méthode getTypeAnswers qui permet d'appeler la bonne factory Answer selon le type demandé
                $AnswerFactory=$factory->getTypeAnswers($answer, $preparedQuestions['type']);
                //on possède un tableau d'objet avec chaque type de answers, on push la bonne answer
                $answer[]=$AnswerFactory->getAnswer();
        
        };
        }
            
        
            

            

            
    }
}