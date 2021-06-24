<?php namespace App\Repositories\FileRepositories;

use App\Repositories\EloquentRepositories\Presenters\QuizAdapter;
use App\Quiz\Interface\QuizRepositoryInterface;

class QuizRepository implements QuizRepositoryInterface
{
    protected $presenter;

    public function __construct()
    {
        $this->presenter = new QuizPresenter();
    }

    public function fetch():array{
    }

}