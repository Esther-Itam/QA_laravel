<?php
namespace App\Quiz\Answer\Factories;
use App\Quiz\Answer\AnswerFactory;

class AnswerRadioFactory extends AnswerFactory implements AnswerInterfaceFactory{
    protected $answers;

    public function getAnswers(){
        return $this->answers;
    }
}