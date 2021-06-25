<?php

namespace App\Quiz\Answer\Type;
use App\Quiz\Answer\Answer;

interface AnswerInterface extends Answer{

    public function render();
}