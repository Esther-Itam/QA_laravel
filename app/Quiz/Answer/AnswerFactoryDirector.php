<?php
namespace App\Quiz\Answer;
use App\Quiz\Answer\Factories\AnswerCheckboxFactory;
use App\Quiz\Answer\Factories\AnswerRadioFactory;
use App\Quiz\Answer\Factories\AnswerTextFactory;

class AnswerFactoryDirector{
    
public function getTypeAnswers($type, $answers){
    switch ($type) {
        case 'radio':
            return new AnswerRadioFactory($answers);
            break;
        case 'checkbox':
            return new AnswerCheckboxFactory($answers);
            break;
        case 'text':
            return new AnswerTextFactory($answers);
            break;
        default:
            return new AnswerTextFactory($answers);
            break;
    }
}
    
}