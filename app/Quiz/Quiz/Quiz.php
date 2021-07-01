<?php
namespace App\Quiz\Quiz;
use App\Quiz\Interfaces\QuestionRepositoryInterface;

class Quiz{

protected array $questions = [];

public function __construct(array $questions){
$this->questions = $questions;

}

public function save(){
foreach ($this->questions as $question) {

$question->save();
}
}

public function getRandomQuestion(){
   
    $random = array_rand($this->questions, 1);
    //dd($this->questions[$random]);
    return $this->questions[$random];

}
}