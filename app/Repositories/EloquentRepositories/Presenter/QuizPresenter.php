<?php namespace App\Repositories\EloquentRepositories\Presenter;

class QuizPresenter
{
    //cette méthode renvoie un tableau de données de questions formatées selon les besoins 
    public function present($answersAndQuestions):array
    {
        return $this->extractQuestions($answersAndQuestions);
    }

    //parcourt le tableau de questions et answers extrait de la db pour renvoyer un tableau formaté selon les besoins pour être envoyé à la factory. 
    protected function extractQuestions($answersAndQuestions):array
    {
        $oneQuestion = [];
        $multiQuestions = [];

        foreach ($answersAndQuestions as $answersAndQuestion) {
            if (!in_array($answersAndQuestion->questionLabel, $oneQuestion)) {
                $oneQuestion [] = $answersAndQuestion->questionLabel;
                array_push($multiQuestions, ['label' => $answersAndQuestion->questionLabel,
                                             'type' => $answersAndQuestion->questionType,
                                             'answers' => []
                                                ]
                );
            }
        }

        return $this->assignAnswers($answersAndQuestions, $multiQuestions);
    }

    //attribue des réponses à chaque question et les renvoie dans un tableau
    protected function assignAnswers($questions, $multiQuestions):array
    {
        foreach ($questions as $question) {
            foreach ($multiQuestions as &$multiQuestion) {
                if ($question->questionLabel === $multiQuestion['label']) {
                    $multiQuestion['answers'] [] = [
                                                     'label' => $question->answerLabel,
                                                     'is_valid' => $question->is_valid,
                                                     'id' =>  $question->id
                                                    ];
                }
            }
        }
    
        return $multiQuestions;
    }

}