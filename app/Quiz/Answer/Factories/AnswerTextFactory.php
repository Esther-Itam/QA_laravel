<?php
namespace App\Quiz\Answer\Factories;
use App\Quiz\Answer\AnswerFactory;
use App\Quiz\Answer\Type\AnswerText;

class AnswerTextFactory extends AnswerFactory implements AnswerInterfaceFactory{
    protected array $answer;

    //récupère le tableau de answer de AnswerFactoryDirector
    public function __construct($answer){
       
        $this->answer =$answer;
         
    }
    //la factory permet d'instancier un type de réponse particulière
    protected function createAnswer(){
        //dd($this->answer);
        return new AnswerText($this->answer);
       
    }

    //renvoie la valeur 
    public function getAnswer(){
       
        return $this->createAnswer();
    }
}