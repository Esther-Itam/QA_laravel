<?php
namespace App\Quiz\Answer\Factories;
use App\Quiz\Answer\AnswerFactory;

class AnswerTextFactory extends AnswerFactory implements AnswerInterfaceFactory{
    protected $answers;

    public function createAnswers(){

    }
    
    public function getAnswers(){
        return $this->answers;
    }
}