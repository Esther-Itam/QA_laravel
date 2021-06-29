<?php

namespace App\Quiz\Answer\Type;
use App\Quiz\Answer\Answer;

interface AnswerInterface extends Answer{
//affiche seulement la vue
    public function render();
}