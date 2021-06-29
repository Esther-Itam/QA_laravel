<?php
namespace App\Quiz\Answer;
use App\Quiz\Answer\Factories\AnswerCheckboxFactory;
use App\Quiz\Answer\Factories\AnswerRadioFactory;
use App\Quiz\Answer\Factories\AnswerTextFactory;

//AnswerFactoryDirector permet d'instancier la bonne factory en fonction du type de réponse
class AnswerFactoryDirector{
    
public function getTypeAnswers($type, $answer){
    switch ($type) {
        case 'radio':
            return new AnswerRadioFactory($answer);
            break;
        case 'checkbox':
            return new AnswerCheckboxFactory($answer);
            break;
        case 'text':
            return new AnswerTextFactory($answer);
            break;
        default:
            return new AnswerTextFactory($answer);
            break;
    }
}
    
}