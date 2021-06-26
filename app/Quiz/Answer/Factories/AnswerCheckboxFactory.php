<?php
namespace App\Quiz\Answer\Factories;
use App\Quiz\Answer\AnswerFactory;

class AnswerCheckboxFactory extends AnswerFactory implements AnswerInterfaceFactory{
    protected $answers;

    public function getAnswers(){
        return $this->answers;
    }
}