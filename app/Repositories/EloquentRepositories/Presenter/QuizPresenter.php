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
        $uniqueQuestions = [];
        $groupedQuestions = [];

        foreach ($answersAndQuestions as $answersAndQuestion) {
            if (!in_array($answersAndQuestion->questionLabel, $uniqueQuestions)) {
                $uniqueQuestions [] = $answersAndQuestion->questionLabel;
                array_push($groupedQuestions, ['label' => $answersAndQuestion->questionLabel,
                                                'type' => $answersAndQuestion->questionType,
                                                'answers' => []
                                                ]
                );
            }
        }

        return $this->assignAnswers($answersAndQuestions, $groupedQuestions);
    }

    //attribue des réponses à chaque question et les renvoie dans un tableau
    protected function assignAnswers($questions, $groupedQuestions):array
    {
        foreach ($questions as $question) {
            foreach ($groupedQuestions as &$groupedQuestion) {
                if ($question->questionLabel === $groupedQuestion['label']) {
                    $groupedQuestion['answers'] [] = [
                                                        'label' => $question->answerLabel,
                                                        'is_valid' => $question->is_valid,
                                                        'id' =>  $question->id
                                                    ];
                }
            }
        }
    
        return $groupedQuestions;
    }

}