<?php

namespace App\Console\Commands;

use App\Http\Filters\Var2\Worker\AgeFrom;
use App\Http\Filters\Var2\Worker\AgeTo;
use App\Http\Filters\Var2\Worker\Name;
use App\Models\Worker;
use Illuminate\Console\Command;
use Illuminate\Pipeline\Pipeline;

class DevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'develop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for development purposes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        request()->merge(['from' => 32, 'first_name' => 'Johndsds']);
        $workers = app()->make(Pipeline::class)
            ->send(Worker::query())
            ->through([
                AgeFrom::class,
                AgeTo::class,
                Name::class,
            ])
            ->thenReturn();

        dd($workers->get()->toArray());
        return 0;
    }
}
