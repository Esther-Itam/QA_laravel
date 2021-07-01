<?php
namespace App\Quiz\Quiz;
use App\Quiz\Answer\AnswerFactoryDirector;
use App\Repositories\EloquentRepositories\QuestionRepository;
use App\Quiz\Interfaces\QuizRepositoryInterface;
use App\Quiz\Quiz\Quiz;
use App\Quiz\Question\Question;


//QuizFactory va créer un objet questions en les associant à un objet answers et retourne un objet Quiz
class QuizFactory{
    //besoin d'un QuizRepository, d'un QuestionRepository
    protected QuizRepositoryInterface $quizRepository;
    protected AnswerFactoryDirector $answerFactoryDirector;
    protected QuestionRepository $questionRepository;


    public function __construct(QuizRepositoryInterface $quizRepository, AnswerFactoryDirector $answerFactoryDirector, QuestionRepository $questionRepository){
        $this->quizRepository = $quizRepository;
        $this->answerFactoryDirector = $answerFactoryDirector;
        $this->questionRepository=$questionRepository;
    }

    protected function createQuiz(){
        //on récupère les données dans un tableau avec la méthode fetch() de FileQuizRepository formatées comme souhaité
        $preparedQuestions=$this->quizRepository->fetch();
        
        //on initialise un tableau vide puis on boucle dans ce tableau les preparedQuestions des repositories
        $quizQuestions=[];
        foreach ($preparedQuestions as $preparedQuestion){
            $answers=[];
           
            //on boucle ensuite dans un tableau les answers
            foreach ($preparedQuestion['answers'] as $answer){
                //on instancie le AnswerFactoryDirector  
                $factory=new AnswerFactoryDirector();
               
                //l'instanciation va permettre de récupérer la méthode getTypeAnswers qui permet d'appeler la bonne factory Answer selon le type demandé
                $AnswerFactory=$factory->getTypeAnswers($answer, $preparedQuestion['type']);
                //dd($answer);
               
                //on possède un tableau d'objet avec chaque type de answers, on push la bonne answer
                $answers[]=$AnswerFactory->getAnswer();
              
        }

            // nous attribuons notre tableau d'objets de answer comme nouvelle valeur de notre clé de answer aux questions préparées.
            $preparedQuestion['answers'] = $answers;
          
            //on push un nouvel objet question contenant un objet answer
            $quizQuestions [] = new Question($preparedQuestion, $this->questionRepository);
           //dd($preparedQuestion);
          
        }
       
             //retourne un nouveau Quiz contenant le nouvel objet Question
            return new Quiz($quizQuestions, $this->questionRepository);
        }
    
        public function getQuiz()
        {
          return $this->createQuiz();
        }
        
}    