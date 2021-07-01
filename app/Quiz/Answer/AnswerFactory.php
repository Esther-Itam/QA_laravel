<?php
namespace App\Quiz\Answer;
use App\Quiz\Answer\Factories\AnswerInterfaceFactory;

abstract class AnswerFactory implements AnswerInterfaceFactory{
    
    //renvoie la valeur 
    abstract public function getAnswer();
    abstract protected function createAnswer();

}