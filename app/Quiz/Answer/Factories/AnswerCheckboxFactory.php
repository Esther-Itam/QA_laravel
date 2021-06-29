<?php
namespace App\Quiz\Answer\Factories;
use App\Quiz\Answer\AnswerFactory;
use App\Quiz\Answer\Type\AnswerCheckbox;

class AnswerCheckboxFactory extends AnswerFactory implements AnswerInterfaceFactory{
    protected $answer;
  //récupère le tableau de answer de AnswerFactoryDirector
    public function __construct($answer){
        $this->answer =$answer;
    }
    //la factory permet d'instancier un type de réponse particulière
    public function createAnswers(){
        return new AnswerCheckbox($this->answer);
    }

    //renvoie la valeur 
    public function getAnswers(){
        return $this->createAnswers();
    }
}