<?php

namespace App\Console\Commands;
use App\Quiz\Quiz\QuizFactory;
use Illuminate\Console\Command;
use App\Quiz\Answer\AnswerFactoryDirector;
use App\Repositories\EloquentRepositories\QuestionRepository;
use App\Repositories\FileRepositories\FileQuizRepository;

class parseJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'parser le json';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //instancier un nouveau quiz grâce à quizFactory
        //Afin de créer et gérer le quiz, celle-ci aura besoin de FileQuizRepository, QuestionRepository et AnswerFactoryDirector
        $quiz=new QuizFactory(new FileQuizRepository(), new QuestionRepository(), new AnswerFactoryDirector());

        //Créer le Quiz
        $quiz=
        
        //on appelle la méthode save() de quiz pour tout mettre en db
        $quiz->save();
    }
}